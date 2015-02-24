<?php

namespace Admin\Controller;

use Fw\Core\Controller;
use Admin\View\AdminView;

class AdminController extends Controller{
    public function __construct(){
        
    }
    public function __getView($viewPath,$layoutPath){
        return new AdminView($viewPath,$layoutPath);
    }
    protected function __before($controller,$action){
        parent::__before($controller,$action);
        $this->assign('web_root','/');
        $userinfo = $this->getSession()->get('userinfo');
        $this->assign('userinfo',$userinfo);
    }
    protected function __after($controller,$action){
        parent::__after($controller,$action);
    }
    protected function isLogin(){
        $userinfo = $this->getSession()->get('userinfo');
        return !empty($userinfo);
    }
    protected function logout(){
        return $this->getSession()->remove('userinfo');    
    }
}