<?php

use Fw\Core\Controller;
use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use Fw\Utils\PinYin;
use Admin\Controller\AdminController;
use OdBlog\Table\UserTable;
use OdBlog\Model\UserModel;


class User extends AdminController{
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
    public function listAction($param=''){
        $param = new LineUrlParam($param);
        
        $table = new UserTable();
        
        $total = $table->countFind(array(),UserTable::ID.' DESC');
        
        $page = $param->get('page',1);
        
        $count = 8;
        
        $pageinfo = Page::info($page,$total,$count,7);
        
        $list = $table->find('*',array(),UserTable::ID.' DESC',array($pageinfo['offset'],$pageinfo['count']));
        
        $this->assign('list',$list);
        $this->assign('pageinfo',$pageinfo);
        $this->assign('urlparam',$param);

        return true;
    }
    public function addAction(){
        
        $type = $this->getRequest()->post('type');
        $this->assign('type','add');
        
        if($type == 'add'){
            $data = $this->getPostData();
            if($errorinfo = $this->verifyData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return true;
            }
            $this->addUser($data);
            $this->getView()->alert('添加用户成功',$this->get('web_root','/') . 'admin/user/list');
            return false;
        }
        
        return true;
    }
    public function editAction($id=''){
        $type = $this->getRequest()->post('type');
        $this->assign('type','edit');
        if($type == 'edit'){
            $data = $this->getPostData();
            if($errorinfo = $this->verifyData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $this->assign('data',$data);
                return 'user/add.php';
            }
            $this->updateUser($data);
            $this->getView()->alert('修改用户成功',$this->get('web_root','/') . 'admin/user/list');
            return false;
        }
        
        $id = intval($id);
        if(!$id){
            $this->getView()->alert('用户不存在！',$this->get('web_root','/') . 'admin/user/list');
            return false;
        }
        $table = new UserTable(); 
        $data = $table->findOne('*',array(UserTable::ID=>$id));
        if(!$data){
            $this->getView()->alert('用户不存在！',$this->get('web_root','/') . 'admin/user/list');
            return false;
        }
        $this->assign('data',$data);
        return 'user/add.php';
    }
    public function editpwdAction($id=''){
        $type = $this->getRequest()->post('type');
        if($type == 'editpwd'){
            $data = $this->getPostData();
            if($errorinfo = $this->verifyData($data,$type)){
                $this->assign('error-message',$errorinfo['message']);
                $table = new UserTable();
                $sdata = $table->findOne('*',array(UserTable::ID=>$data['id']));
                $sdata['spassword'] = $data['spassword'];
                $this->assign('data',$sdata);
                return true;
            }
            $this->updatePwd($data);
            $this->getView()->alert('修改用户成功',$this->get('web_root','/') . 'admin/user/list');
            return false;
        }
        
        $id = intval($id);
        if(!$id){
            $this->getView()->alert('用户不存在！',$this->get('web_root','/') . 'admin/user/list');
            return false;
        }
        $table = new UserTable(); 
        $data = $table->findOne('*',array(UserTable::ID=>$id));
        if(!$data){
            $this->getView()->alert('用户不存在！',$this->get('web_root','/') . 'admin/user/list');
            return false;
        }
        $this->assign('data',$data);
        return true;
    }
    private function verifyData($data,$type){
        if($type === 'add'){
            if(!$data['name']){
                return array(
                    'code'=>1,
                    'message'=>'请输入用户名!'
                );   
            }
            if(strlen($data['name']) < 4 or strlen($data['name']) > 12){
                return array(
                    'code'=>1,
                    'message'=>'用户名请保持在4-12位之间'
                );   
            }
            $table = new UserTable();
            $len = $table->countFind(array(
                UserTable::NAME=>$data['name']
            ));
            if($len){
                return array(
                    'code'=>1,
                    'message'=>'用户名已存在!'
                );   
            }
            if(!$data['password']){
                return array(
                    'code'=>1,
                    'message'=>'请输入密码!'
                );   
            }
            if($data['password'] !== $data['password2']){
                return array(
                    'code'=>1,
                    'message'=>'两次密码不一致!'
                );   
            }
        }else if($type === 'editpwd'){
            if(!$data['id']){
                return array(
                    'code'=>1,
                    'message'=>'用户不存在!'
                );  
            }
            $table = new UserTable();
            $user = $table->findOne('*',array(UserTable::ID=>$data['id']));
            if(!$user){
                return array(
                    'code'=>1,
                    'message'=>'用户不存在!'
                );
            }
            if($user['password'] !== $data['spassword']){
                return array(
                    'code'=>1,
                    'message'=>'原密码不正确!'
                );   
            }
            if(!$data['password']){
                return array(
                    'code'=>1,
                    'message'=>'请输入新密码!'
                );   
            }
            if($data['password'] !== $data['password2']){
                return array(
                    'code'=>1,
                    'message'=>'两次密码不一致!'
                );   
            }
            
        }
        return false;
    }
    private function addUser($data){
        $model = new UserModel();
        
        $model->set(UserTable::NAME,$data['name']);
        $model->set(UserTable::NICKNAME,$data['nickname']);
        $model->set(UserTable::PASSWORD,$data['password']);
        
        $model->save();
    }
    private function updateUser($data){
        $model = new UserModel();
        $model->set(UserTable::ID,$data['id']);
        $model->set(UserTable::NICKNAME,$data['nickname']);
        
        $model->update();
    }
    private function getPostData(){
        $data = array();
        
        $req = $this->getRequest();
        
        $data['id'] = trim($req->post('id'));
        $data['name'] = trim($req->post('name'));
        $data['nickname'] = trim($req->post('nickname'));
        $data['spassword'] = trim($req->post('spassword'));
        $data['password'] = trim($req->post('password'));
        $data['password2'] = trim($req->post('password2'));
        
        return $data;
    }
    public function delAction(){
        $req = $this->getRequest();
        $res = $this->getResponse();
        $res->header('content-type: application/json;utf-8');
        
        $ids = $req->post('ids',array());
        
        $table = new UserTable();
        $table->delete(array(
            UserTable::ID,
            'IN',
            '('.implode(',',$ids).')'
        ));
        
        $res->echoJson(array(
            'errcode'=>0,
            'message'=>'删除成功!'
        ));
    }
}