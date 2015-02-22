<?php

use Fw\Core\Controller;
use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use Admin\Controller\AdminController;
use OdBlog\Table\ArticleTable;

class Blog extends AdminController{
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
        
        $articleTable = new ArticleTable();
        
        $total = $articleTable->countFind();
        
        $page = $param->get('page',1);
        
        $count = 8;
        
        $pageinfo = Page::info($page,$total,$count,7);
        
        $list = $articleTable->find('*',array(),null,array($pageinfo['offset'],$pageinfo['count']));
        
        $this->assign('list',$list);
        $this->assign('pageinfo',$pageinfo);
        $this->assign('urlparam',$param);
        
        return true;
    }
    public function addAction(){
        return true;
    }
    public function addpostAction(){
        
    }
    public function editAction(){
        
    }
    public function editpostAction(){
        
    }
    public function delAction(){
        $req = $this->getRequest();
        $res = $this->getResponse();
        $res->header('content-type: application/json;utf-8');
        
        $ids = $req->post('ids',array());
        
        $articleTable = new ArticleTable();
        $articleTable->delete(array(
            ArticleTable::ID,
            'IN',
            '('.implode(',',$ids).')'
        ));
        
        $res->echoJson(array(
            'errcode'=>0,
            'message'=>'删除成功!'
        ));
    }
}