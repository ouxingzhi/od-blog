<?php

use Admin\Controller\AdminController;
use OdBlog\Dao\UserDao;


class Settings extends AdminController{
    protected function __isSimpleMode(){
        return true;   
    }

	public function handleRequest(){
        
	}
}