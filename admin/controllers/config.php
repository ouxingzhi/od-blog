<?php

use Admin\Controller\AdminController;
use Fw\Utils\LineUrlParam;
use OdBlog\Table\ConfigTable;
use OdBlog\Model\ConfigModel;
use OdBlog\Table\ConfigKindTable;
use OdBlog\Model\ConfigKindModel;
use Fw\Utils\LogCache;


class Config extends AdminController{
    
    public function getDefaultActionName(){
        return 'list';   
    }
    protected function __before($controller,$action){
        if(parent::__before($controller,$action)){
            return true;   
        }
        //如果未登录则跳登录页
        if(!$this->isLogin()){
            $this->getResponse()->location($this->get('app_root') . 'login');
            return true;
        }
    }
    public function listAction($params=''){
        $ids = $this->getRequest()->post('value');
        if(!empty($ids)){
            $ctable = new ConfigTable();
            foreach($ids as $id=>$val){
                $ctable->update(array(ConfigTable::VALUE=>$val),array(ConfigTable::ID=>$id));
            }
        }
        
        $table = new ConfigKindTable();
        $kindlist = $table->find('*',null,sprintf("`%s` DESC,`%s` DESC",ConfigKindTable::SORT,ConfigKindTable::ID));
        $this->assign('kindlist',$kindlist);
        
        $param = new LineUrlParam($params);
        $this->assign('param',$param);
        
        $kind = $param->get('kind');
        if(!$kind and !empty($kindlist)){
            $kind = $kindlist[0]['id'];
        }
        $this->assign('kind',$kind);
        $ctable = new ConfigTable();
        $list = $ctable->find('*',array(
            ConfigTable::KIND=>$kind
        ));
        $this->assign('list',$list);
        return true;
    }
    
    public function addAction(){
        $table = new ConfigKindTable();
        $kindlist = $table->find('*',null,sprintf("`%s` DESC,`%s` DESC",ConfigKindTable::SORT,ConfigKindTable::ID));
        if(empty($kindlist)){
            $this->getView()->alert('没有配置分类，将跳转到添加配置分类页!',$this->get('app_root','/').'config/addtype');
            return false;
        }
        $this->assign('typelist',ConfigTable::getTypeDefine());
        $this->assign('kindlist',$kindlist);
        
        $this->assign('type','add');
        
        $type = $this->getRequest()->post('type');
        if($type === 'add'){
            $data = $this->getPostData();
            
            if($errorinfo = $this->verifyPostData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return true;
            }
            
            $this->save($data);
            $this->getView()->alert('添加配置成功!',$this->get('app_root').'config/list');
            return false;
        }
        
        return true;
    }
    public function editAction($id=''){
        
        $table = new ConfigKindTable();
        $kindlist = $table->find('*',null,sprintf("`%s` DESC,`%s` DESC",ConfigKindTable::SORT,ConfigKindTable::ID));
        $this->assign('kindlist',$kindlist);
        $this->assign('typelist',ConfigTable::getTypeDefine());
        $this->assign('type','edit');
        
        $type = $this->getRequest()->post('type');
        if($type === 'edit'){
            $data = $this->getPostData();
            
            if($errorinfo = $this->verifyPostData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return 'config/add.php';
            }
            LogCache::log('edit data',json_encode($data));
            $this->update($data);
            $this->getView()->alert('修改配置成功!',$this->get('app_root','/').'config/list');
            return false;
        }
        $id = intval($id);
        if(!$id){
            $this->getView()->alert('配置不存在!',$this->get('app_root','/').'config/list');
            return false;
        }
        $table = new ConfigTable();
        $data = $table->findOne('*',array(ConfigTable::ID=>$id));
        if(empty($data)){
            $this->getView()->alert('配置不存在!',$this->get('app_root','/').'config/list');
            return false;
        }
        $this->assign('data',$data);
        return 'config/add.php';
    }
    public function delAction($id=''){
        $id = intval($id);
        
        $table = new ConfigTable();
        $table->delete(array(ConfigTable::ID=>$id));
        
        $this->getView()->alert('删除成功!',$this->get('app_root','/').'config/list');
        return false;
    }
    public function typelistAction(){
        $table = new ConfigKindTable();
        $type = $this->getRequest()->post('type');
        if($type === 'editorder'){
            
            $ids = $this->getRequest()->post('id',array());
            foreach($ids as $id=>$sort){
                $table->update(array(ConfigKindTable::SORT=>$sort),array(ConfigKindTable::ID=>$id));
            }
            $this->getView()->alert('更新排序成功!',$this->get('app_root','/').'config/typelist');
            return false;   
        }
        
        $list = $table->find('*',null,sprintf("`%s` DESC,`%s` DESC",ConfigKindTable::SORT,ConfigKindTable::ID));
        
        $this->assign('list',$list);
        
        return true;
    }
    public function addtypeAction(){
        
        $this->assign('type','addtype');
        
        $type = $this->getRequest()->post('type');
        if($type === 'addtype'){
            $data = $this->getPostData();
            
            if($errorinfo = $this->verifyPostData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return true;
            }
            
            $this->saveType($data);
            $this->getView()->alert('添加配置类型成功!',$this->get('app_root','/').'config/typelist');
            return false;
        }
        
        return true;
    }
    public function edittypeAction($id=''){
        

        
        $this->assign('type','edittype');
        
        $type = $this->getRequest()->post('type');
        if($type === 'edittype'){
            $data = $this->getPostData();
            
            if($errorinfo = $this->verifyPostData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return 'config/addtype.php';
            }
            
            $this->updateType($data);
            $this->getView()->alert('修改配置类型成功!',$this->get('app_root','/').'config/typelist');
            return false;
        }
        $id = intval($id);
        if(!$id){
            $this->getView()->alert('参数错误!',$this->get('app_root','/').'config/typelist');
            return false;
        }
        $table = new ConfigKindTable();
        $data = $table->findOne('*',array(
            ConfigKindTable::ID=>$id
        ));
        if(empty($data)){
            $this->getView()->alert('参数错误!',$this->get('app_root','/').'config/typelist');
            return false;
        }
        $this->assign('data',$data);
        
        return 'config/addtype.php';
    }
    public function deltypeAction($id=0){
        $id = intval($id);
        if(!$id){
            $this->getView()->alert('类型不存在!',$this->get('app_root','/').'config/typelist');
            return false;
        }
        $ctable = new ConfigTable();
        $len = $ctable->countFind(array(
            ConfigTable::KIND=>$id
        ));
        if($len){
            $this->getView()->alert('该类型存在配置，请先删除这些配置，然后在删除配置类型!',$this->get('app_root','/').'config/typelist');
            return false;
        }
        $table = new ConfigKindTable();
        
        $table->delete(array(
            ConfigKindTable::ID=>$id
        ));
        
        
        $ctable->delete(array(
            ConfigTable::KIND=>$id
        ));
        $this->getResponse()->location($this->get('app_root','/').'config/typelist');
        return false;
    }
    private function saveType($data){
        $model = new ConfigKindModel();
        
        $model->set(ConfigKindTable::TITLE,$data['title']);
        $model->set(ConfigKindTable::DESC,$data['desc']);
        $model->set(ConfigKindTable::SORT,$data['sort']);
        
        $model->save();
    }
    private function updateType($data){
        $model = new ConfigKindModel();
        
        $model->set(ConfigKindTable::ID,$data['id']);
        $model->set(ConfigKindTable::TITLE,$data['title']);
        $model->set(ConfigKindTable::DESC,$data['desc']);
        $model->set(ConfigKindTable::SORT,$data['sort']);
        
        $model->update();
    }
    private function save($data){
        $model = new ConfigModel();
        
        $model->set(ConfigTable::KEY,$data['key']);
        $model->set(ConfigTable::TITLE,$data['title']);
        $model->set(ConfigTable::VALUE,$data['value']);
        $model->set(ConfigTable::DESC,$data['desc']);
        $model->set(ConfigTable::KIND,$data['kind']);
        $model->set(ConfigTable::SORT,$data['sort']);
        $model->set(ConfigTable::TYPE,$data['type']);
        $model->set(ConfigTable::DEFINE,$data['define']);
        
        $model->save();
    }
    private function update($data){
        $model = new ConfigModel();
        
        $model->set(ConfigTable::ID,$data['id']);
        $model->set(ConfigTable::KEY,$data['key']);
        $model->set(ConfigTable::TITLE,$data['title']);
        $model->set(ConfigTable::VALUE,$data['value']);
        $model->set(ConfigTable::DESC,$data['desc']);
        $model->set(ConfigTable::KIND,$data['kind']);
        $model->set(ConfigTable::SORT,$data['sort']);
        $model->set(ConfigTable::TYPE,$data['type']);
        $model->set(ConfigTable::DEFINE,$data['define']);
        
        $model->update();
    }
    private function verifyPostData($data,$type){
        if(!$data['title']){
            return array(
                'code'=>1,
                'message'=>'类型名称不能为空！'
            );   
        }
        
        if($type === 'addtype'){
            $table = new ConfigKindTable();
            $len = $table->countFind(array(
                ConfigKindTable::TITLE=>$data['title']
            ));
            if($len){
                return array(
                    'code'=>1,
                    'message'=>'类型名称已存在！'
                );  
            }
        }elseif($type === 'edittype'){
            $table = new ConfigKindTable();
            $len = $table->countFind(array(
                ConfigKindTable::TITLE=>$data['title'],
                'AND',
                ConfigKindTable::ID . '<>' . $data['id']
            ));
            if($len){
                return array(
                    'code'=>1,
                    'message'=>'类型名称已存在！'
                );  
            }
        }elseif($type === 'add'){
            if(!$data['key']){
                return array(
                    'code'=>1,
                    'message'=>'配置名称不能为空！'
                );   
            }
            if(!$data['title']){
                return array(
                    'code'=>1,
                    'message'=>'配置标题不能为空！'
                );
            }
            $table = new ConfigTable();
            $len = $table->countFind(array(
                ConfigTable::KEY=>$data['key']
            ));
            if($len){
                return array(
                    'code'=>1,
                    'message'=>'配置名称已存在！'
                );
            }
            if($data['type'] == ConfigTable::TYPE_SELECT and !preg_match("/\\w+\|\\w+/",$data['define'])){
               return array(
                    'code'=>1,
                    'message'=>'当类型为多选时，请定义类型选项！'
                ); 
            }
        }elseif($type === 'edit'){
            if(!$data['key']){
                return array(
                    'code'=>1,
                    'message'=>'配置名称不能为空！'
                );   
            }
            if(!$data['title']){
                return array(
                    'code'=>1,
                    'message'=>'配置标题不能为空！'
                );
            }
            $table = new ConfigTable();
            $len = $table->countFind(array(
                ConfigTable::KEY=>$data['key'],
                'AND', sprintf("`%s`<>%s",ConfigTable::ID,$data['id'])
            ));
            if($len){
                return array(
                    'code'=>1,
                    'message'=>'配置名称已存在！'
                );
            }
            if($data['type'] == ConfigTable::TYPE_SELECT and !preg_match("/\\w+\|\\w+/",$data['define'])){
               return array(
                    'code'=>1,
                    'message'=>'当类型为多选时，请定义类型选项！'
                ); 
            }
        }
    }
    private function getPostData(){
        $data = array();
        
        $req = $this->getRequest();
        $data['id'] = trim($req->post('id'));
        $data['title'] = trim($req->post('title'));
        $data['key'] = trim($req->post('key'));
        $data['value'] = trim($req->post('value'));
        $data['desc'] = trim($req->post('desc'));
        $data['kind'] = trim($req->post('kind'));
        $data['sort'] = trim($req->post('sort'));
        $data['type'] = trim($req->post('ftype'));
        $data['define'] = trim($req->post('define'));
        
        return $data;
        
    }
}