<?php

namespace Blog\Controller;

use Fw\Core\Controller;
use Blog\View\BlogView;
use OdBlog\Dao\ConfigDao;

class BlogController extends Controller{
    public function __construct(){
        
    }
    public function __getView($viewPath,$layoutPath){
        return new BlogView($viewPath,$layoutPath);
    }
    protected function __before($controller,$action){
        parent::__before($controller,$action);
        $this->assign('web_root','/');
        $userinfo = $this->getSession()->get('userinfo');
        $this->assign('userinfo',$userinfo);
        $configs = ConfigDao::getConfigAll();
        $this->assign('cfg',$configs);
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