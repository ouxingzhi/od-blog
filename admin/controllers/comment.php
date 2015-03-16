<?php


use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use Fw\Utils\PinYin;
use Admin\Controller\AdminController;
use OdBlog\Table\ArticleTable;
use OdBlog\Model\ArticleModel;
use OdBlog\Table\CommentTable;
use OdBlog\Model\CommentModel;


class Comment extends AdminController{
    public function getDefaultActionName(){
        return 'list';   
    }
    protected function __before($controller,$action){
        if(parent::__before($controller,$action)){
            return true;   
        }
        //如果未登录则跳登录页
        if(!$this->isLogin()){
            $this->getResponse()->location($this->get('app_root') . 'login');
            return true;
        }
    }
    public function listAction($param=''){
        $param = new LineUrlParam($param);
        
        $arttable = new ArticleTable();
        $table = new CommentTable();
        $db = $table->getDbSession();
        
        $total = $table->countFind(array(),CommentTable::ID.' DESC');
        
        $page = $param->get('page',1);
        
        $count = 8;
        
        $pageinfo = Page::info($page,$total,$count,7);

        $list = $db->query(sprintf("select a.*,b.title as btitle from `%s` as a left join `%s` as b on a.blog_id=b.id  order by a.id desc limit %s,%s",$table->getTable(),$arttable->getTable(),$pageinfo['offset'],$pageinfo['count']));
        
        $this->assign('list',$list);
        $this->assign('pageinfo',$pageinfo);
        $this->assign('urlparam',$param);

        
        return true;
    }
    public function delAction(){
        $req = $this->getRequest();
        $res = $this->getResponse();
        
        $ids = $req->post('ids',array());
        
        $table = new CommentTable();
        $table->delete(array(
            CommentTable::ID,
            'IN',
            '('.implode(',',$ids).')'
        ));
        
        $res->echoJson(array(
            'errcode'=>0,
            'message'=>'删除成功!'
        ));
    }
}