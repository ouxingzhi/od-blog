<?php


use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use OdBlog\Table\ArticleTable;
use OdBlog\Model\ArticleModel;
use OdBlog\Table\ArticleKindDefineTable;
use Blog\Controller\BlogController;

class Home extends BlogController{
    protected function __isSimpleMode(){
        return true;   
    }
    public function handleRequest($param=''){
        $param = new LineUrlParam($param);
        
        $articleTable = new ArticleTable();
        
        $total = $articleTable->countFind(array(),ArticleTable::ID.' DESC');
        
        $page = $param->get('page',1);
        
        $count = 8;
        
        $pageinfo = Page::info($page,$total,$count,7);
        
        $list = $articleTable->find('*',array(),ArticleTable::ID.' DESC',array($pageinfo['offset'],$pageinfo['count']));
        
        $this->assign('list',$list);
        $this->assign('pageinfo',$pageinfo);
        $this->assign('urlparam',$param);
        
        
        return true;
    }
}