<?php

use Admin\Controller\AdminController;
use OdBlog\Table\ConfigTable;
use OdBlog\Model\ConfigModel;


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
    public function listAction(){
        
        return true;
    }
}