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
        
        $kind = $param->get('kind');
        
        if($kind and preg_match('/[^a-z0-9\-_]/i',$kind)){
            $this->getView()->echo404();
            return false;
        }
        
        $articleTable = new ArticleTable();
        
        $where = array();
        if($kind){
            if(preg_match('/^[0-9]+$/i',$kind)){
                $where = array(ArticleTable::KIND=>$kind);
            }else{
                $kdTable = new ArticleKindDefineTable();
                $kindOne = $kdTable->findOne('*',array(ArticleKindDefineTable::ENNAME=>$kind));
                if($kindOne){
                    $where = array(ArticleTable::KIND=>$kindOne['id']);
                    $kind = $kindOne['id'];
                }else{
                    $this->getView()->echo404();
                    return false;   
                }
            }
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