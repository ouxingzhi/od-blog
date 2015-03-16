<?php


use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use OdBlog\Table\ArticleTable;
use OdBlog\Model\ArticleModel;
use OdBlog\Table\ArticleKindDefineTable;
use OdBlog\Table\CommentTable;
use Blog\Controller\BlogController;

class A extends BlogController{
    protected function __isSimpleMode(){
        return true;   
    }
    public function handleRequest($id=''){
        
        
        
        if(!$id){
            $this->getView()->alert('文章不存在','javascript:history.back()');
            return false;
        }
        $table = new ArticleTable();
        if(preg_match('/^[0-9]+$/i',$id)){
            $id = intval($id);
            $article = $table->findOne('*',array(ArticleTable::ID=>$id));
        }else if(preg_match('/^[a-z0-9\-_]+$/i',$id)){
            $entitle = $id;
            $article = $table->findOne('*',array(ArticleTable::ENTITLE=>$entitle));
        }else{
            $this->getView()->echo404();
            return false;   
        }
        
        if(!$article){
            $this->getView()->echo404();
            return false;
        }
        
        $this->assign('article',$article);
        
        //评论数据
        $commentTable = new CommentTable();
        $comments = $commentTable->find('*',array(CommentTable::BLOG_ID=>$id),sprintf('%s desc,%s desc',CommentTable::CDATE,CommentTable::ID));
        $this->assign('comments',$comments);
        
        
        
        //取右侧的分类数据
        $kindTable = new ArticleKindDefineTable();
        $kindlist = $kindTable->find('*',null,sprintf('%s desc,%s desc',ArticleKindDefineTable::SORT, ArticleKindDefineTable::ID));
        $this->assign('kindlist',$kindlist);
        
        $param = new LineUrlParam('');
        $this->assign('urlparam',$param);
        
        return true;
    }
}