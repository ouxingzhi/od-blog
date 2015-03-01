<?php

use Admin\Controller\AdminController;
use Fw\Utils\LineUrlParam;
use OdBlog\Table\ConfigTable;
use OdBlog\Model\ConfigModel;
use OdBlog\Table\ConfigKindTable;
use OdBlog\Model\ConfigKindModel;


class Config extends AdminController{
    public function getDefaultAction(){
        return 'list';   
    }
    protected function __before($controller,$action){
        if(parent::__before($controller,$action)){
            return true;   
        }
        //如果未登录则跳登录页
        if(!$this->isLogin()){
            $this->getResponse()->location('/admin/login');
            return true;
        }
    }
    public function listAction($params=''){
        $ids = $this->getRequest()->post('id');
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
            $this->getView()->alert('添加配置成功!',$this->get('web_root','/').'admin/config/list');
            return false;
        }
        
        return true;
    }
    public function typelistAction(){
        $table = new ConfigKindTable();
        $type = $this->getRequest()->post('type');
        if($type === 'editorder'){
            
            $ids = $this->getRequest()->post('id',array());
            foreach($ids as $id=>$sort){
                $table->update(array(ConfigKindTable::SORT=>$sort),array(ConfigKindTable::ID=>$id));
            }
            $this->getView()->alert('更新排序成功!',$this->get('web_root','/').'admin/config/typelist');
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
            $this->getView()->alert('添加配置类型成功!',$this->get('web_root','/').'admin/config/typelist');
            return false;
        }
        
        return true;
    }
    public function edittypeAction(){
        
        $this->assign('type','edittype');
        
        $type = $this->getRequest()->post('type');
        if($type === 'edittype'){
            $data = $this->getPostData();
            
            if($errorinfo = $this->verifyPostData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return true;
            }
            
            $this->saveType($data);
            $this->getView()->alert('修改配置类型成功!',$this->get('web_root','/').'admin/config/typelist');
            return false;
        }
        
        return true;
    }
    public function deltypeAction($id=0){
        $id = intval($id);
        if(!$id){
            $this->getView()->alert('类型不存在!',$this->get('web_root','/').'admin/config/typelist');
            return false;
        }
        $table = new ConfigKindTable();
        
        $table->delete(array(
            ConfigKindTable::ID=>$id
        ));
        $this->getResponse()->location($this->get('web_root','/').'admin/config/typelist');
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
        
        $model->save();
    }
    private function update($data){
        $model = new ConfigModel();
        
        $model->set(ConfigTable::ID,$data['id']);
        $model->set(ConfigTable::KEY,$data['KEY']);
        $model->set(ConfigTable::TITLE,$data['title']);
        $model->set(ConfigTable::VALUE,$data['value']);
        $model->set(ConfigTable::DESC,$data['desc']);
        $model->set(ConfigTable::KIND,$data['kind']);
        $model->set(ConfigTable::SORT,$data['sort']);
        
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
        
        return $data;
        
    }
}