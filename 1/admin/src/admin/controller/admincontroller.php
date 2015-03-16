<?php

namespace Admin\Controller;

use Fw\Config\Config;
use Fw\Core\Controller;
use Admin\View\AdminView;
use OdBlog\Dao\ConfigDao;


class AdminController extends Controller{
    public function __construct(){
        
    }
    public function __getView($viewPath,$layoutPath){
        return new AdminView($viewPath,$layoutPath);
    }
    protected function __before($controller,$action){
        parent::__before($controller,$action);
        $this->assign('web_root','/');
        $this->assign('app_root',Config::get('app_root','/'));
        $userinfo = $this->getSession()->get('userinfo');
        $this->assign('userinfo',$userinfo);
        $configs = ConfigDao::getConfigAll();
        $this->assign('cfg',$configs);
        
    }
    protected function __afterCall($controller,$action){
        if(Config::get('debug')){
            $this->getView()->writeLog();   
        }  
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