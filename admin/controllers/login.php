<?php

use Admin\Controller\AdminController;
use OdBlog\Dao\UserDao;


class Login extends AdminController{
    protected function __isSimpleMode(){
        return true;   
    }

	public function handleRequest(){

        $req = $this->getRequest();
        $res = $this->getResponse();
        $session = $this->getSession();
        if($this->isLogin()){
            $res->location('/admin/index');
            return false;
        }
        
        $action = $req->post('action');
        $username = $req->post('username');
        $password = $req->post('password');
        
        if($action === 'post'){
            if(empty($username)){
                $this->assign('error_message','请输入用户名！');
                $this->assign('error_message','请输入用户名！');
                return true;
            }
            if(!preg_match("/\w{4,}/i",$username)){
                $this->assign('error_message','请正确输入用户名！');
                return true;
            }
            if(empty($password)){
                $this->assign('error_message','请输入密码！');
                return true;
            }
            if(!$userinfo = UserDao::checkPassword($username,$password)){
                $this->assign('error_message','请正确输入用户名和密码！');
                return true;  
            }
            $session->set('userinfo',$userinfo);
            $res->location('/admin/login');
            return false;
        }
        return true;
	}
}