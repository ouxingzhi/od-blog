<?php


use Admin\Controller\AdminController;
use OdBlog\Table\ArticleKindDefineTable;
use OdBlog\Model\ArticleKindDefineModel;


class Kind extends AdminController{
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
    
    public function listAction(){
        $kindTable = new ArticleKindDefineTable();
        $list = $kindTable->find();
        
        $this->assign('list',$list);
        
        return true;
    }
    private function getPostData(){
        $req = $this->getRequest();
        $data = array();
        $data['id'] = trim($req->post('id'));
        $data['name'] = trim($req->post('name'));
        return $data;
    }
    public function addAction(){
        
        $type = $this->getRequest()->post('type');
        $this->assign('type','add');
        if($type){
            $data = $this->getPostData();
            if($errorinfo = $this->verifyData($data)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return true;  
            }else{
                $this->addKind($data);
                $this->getView()->alert('添加成功！',$this->get('app_root','/') . 'kind/list');
                return false;
            }
        }
        
        return true;
    }
    private function verifyData($data,$type){
        if(!$data['name']){
            return array(
                'code'=>1,
                'message'=>'请填写类型名称!'
            );   
        }
        if(strlen($data['name']) > 20){
            return array(
                'code'=>1,
                'message'=>'类型名称过长，请保持在1-20个字符长度!'
            );
        }
        $table = new ArticleKindDefineTable();
        $len = 0;
        if($type == 'add'){
            $len = $table->countFind(array(
                ArticleKindDefineTable::NAME=>$data['name']
            ));
        }else if($type == 'edit'){
            $len = $table->countFind(array(
                ArticleKindDefineTable::NAME=>$data['name'],
                'AND',
                ArticleKindDefineTable::ID . '<>' . $data['id']
            ));
        }
        if($len){
            return array(
                'code'=>1,
                'message'=>'类型名称已存在！'
            );
        }
        return false;
    }
    private function addKind($data){
        $model = new ArticleKindDefineModel();
        
        $model->set(ArticleKindDefineTable::NAME,$data['name']);
        $model->save();
    }
    private function updateKind($data){
        $model = new ArticleKindDefineModel();
        
        $model->set(ArticleKindDefineTable::ID,$data['id']);
        $model->set(ArticleKindDefineTable::NAME,$data['name']);
        $model->update();
    }
    public function editAction($id=0){
        $this->assign('type','edit');
        $type = $this->getRequest()->post('type');
        
        if($type){
            $data = $this->getPostData();
            if($errorinfo = $this->verifyData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return 'kind/add.php';
                
            }
            $this->updateKind($data);
            $this->getView()->alert('修改成功！',$this->get('app_root','/').'kind/list');
            return false;
        }else{
            $id = intval($id);
            if(!$id){
                $this->getView()->alert('参数错误！',$this->get('app_root','/').'kind/list');
                return false;
            }
            $table = new ArticleKindDefineTable();
            $data = $table->findOne('*',array(
                ArticleKindDefineTable::ID=>$id
            ));
            if(!$data){
                $this->getView()->alert('参数错误！',$this->get('app_root','/').'kind/list');
                return false;
            }
            $this->assign('type','edit');
            $this->assign('data',$data);
            return 'kind/add.php';
        }
    }
    public function delAction(){
        $req = $this->getRequest();
        $res = $this->getResponse();
        $res->header('content-type: application/json;utf-8');
        
        $ids = $req->post('ids',array());
        
        $table = new ArticleKindDefineTable();
        $table->delete(array(
            ArticleKindDefineTable::ID,
            'IN',
            '('.implode(',',$ids).')'
        ));
        
        $res->echoJson(array(
            'errcode'=>0,
            'message'=>'删除成功!'
        ));
    }
}