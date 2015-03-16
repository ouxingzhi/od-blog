<?php


use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use OdBlog\Table\ArticleTable;
use OdBlog\Model\ArticleModel;
use OdBlog\Table\ArticleKindDefineTable;
use Blog\Controller\BlogController;

class L extends BlogController{
    protected function __isSimpleMode(){
        return true;   
    }
    public function handleRequest($param=''){
        $param = new LineUrlParam($param);
        
        $kind = intval($param->get('kind'));
        
        $articleTable = new ArticleTable();
        
        $where = array();
        if($kind){
            $where = array(ArticleTable::KIND=>$kind);
        }
        
        $total = $articleTable->countFind($where,ArticleTable::ID.' DESC');
        
        $page = $param->get('page',1);
        
        $count = 8;
        
        $pageinfo = Page::info($page,$total,$count,7);
        
        $list = $articleTable->find('*',$where,ArticleTable::ID.' DESC',array($pageinfo['offset'],$pageinfo['count']));
        
        
        $this->assign('kind',$kind);
        $this->assign('list',$list);
        $this->assign('pageinfo',$pageinfo);
        $this->assign('urlparam',$param);
        
        //取右侧的分类数据
        $kindTable = new ArticleKindDefineTable();
        $kindlist = $kindTable->find('*',null,sprintf('%s desc,%s desc',ArticleKindDefineTable::SORT, ArticleKindDefineTable::ID));
        $this->assign('kindlist',$kindlist);
        //取右侧的评论数据
        
        
        
        return true;
    }
}