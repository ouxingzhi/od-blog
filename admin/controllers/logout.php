<?php

use Admin\Controller\AdminController;
use OdBlog\Dao\UserDao;


class Logout extends AdminController{

	public function indexAction(){
        $this->logout();
        $this->getResponse()->location($this->get('web_root','/') . 'admin/login');
        return true;
	}
}