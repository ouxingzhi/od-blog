<?php


use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use OdBlog\Table\ArticleTable;
use OdBlog\Model\ArticleModel;
use OdBlog\Table\ArticleKindDefineTable;
use OdBlog\Table\CommentTable;
use OdBlog\Model\CommentModel;
use Blog\Controller\BlogController;

class comment extends BlogController{
    public function postAction(){
        
        $data = $this->getPostData();
        
        $res = $this->getResponse();
        if($error = $this->verfiyData($data)){
            $res->echoJson(array(
                'code'=>1,
                'message'=>$error
            ));
            return false;
        }
        $this->saveComment($data);
        
        $res->echoJson(array(
            'code'=>0,
            'message'=>'提交成功！'
        ));
    }
    
    private function verfiyData($data){
        if(!$data['id']){
            return '博文不存在！';   
        }
        if(!$data['name']){
            return '未输入名称！';   
        }
        if(!$data['body']){
            return '未输入留言内容';
        }
        return false;
    }
    
    private function getPostData(){
        $req = $this->getRequest();
        $data = array();
        
        $data['name'] = htmlspecialchars($req->post('name'));
        $data['email'] = htmlspecialchars($req->post('email'));
        $data['body'] = htmlspecialchars($req->post('body'));
        $data['id'] = htmlspecialchars($req->post('id'));
        
        return $data;
    }
    private function saveComment($data){
        $commentModel = new CommentModel();
        
        $commentModel->set(CommentTable::BLOG_ID,$data['id']);
        $commentModel->set(CommentTable::NAME,$data['name']);
        $commentModel->set(CommentTable::EMAIL,$data['email']);
        $commentModel->set(CommentTable::BODY,$data['body']);
        $commentModel->save();
    }
}