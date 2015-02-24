<?php

use Fw\Core\Controller;
use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Admin\Controller\AdminController;
use OdBlog\Dao\UserDao;
use OdBlog\Model\UserModel;

class Index extends AdminController{

	public function indexAction($p1=0,$p2=0){
        $res = $this->getResponse();
        if(!$this->isLogin()){
            $res->location('/admin/login');
            return false;
        }
        $session = $this->getSession();
        
        $userinfo = $session->get('userinfo');
        if(!$userinfo){
            $res->location('/admin/login');
            return false;
        }
        return true;
	}
}