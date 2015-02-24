<?php

use Fw\Core\Controller;
use Fw\Utils\ArrayUtils;
use Fw\Utils\Session;
use Fw\Utils\Page;
use Fw\Utils\LineUrlParam;
use Fw\Utils\PinYin;
use Admin\Controller\AdminController;
use OdBlog\Table\ArticleTable;
use OdBlog\Model\ArticleModel;
use OdBlog\Table\ArticleKindDefineTable;


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
        
        $total = $articleTable->countFind(array(),ArticleTable::ID.' DESC');
        
        $page = $param->get('page',1);
        
        $count = 8;
        
        $pageinfo = Page::info($page,$total,$count,7);
        
        $list = $articleTable->find('*',array(),ArticleTable::ID.' DESC',array($pageinfo['offset'],$pageinfo['count']));
        
        $this->assign('list',$list);
        $this->assign('pageinfo',$pageinfo);
        $this->assign('urlparam',$param);
        
        $akTable = new ArticleKindDefineTable();
        $kinds = $akTable->find();
        $kindsMap = array();
        foreach($kinds as $i=>$kind){
            $kindsMap[$kind['id']] = $kind;
        }
        $this->assign('kinds',$kindsMap);
        
        return true;
    }
    public function addAction(){
        
        $akTable = new ArticleKindDefineTable();
        $kinds = $akTable->find();
        $this->assign('kinds',$kinds);
        $this->assign('type','add');
        
        $action = $this->getRequest()->post('action');
        if($action){
            $data = $this->getAddPostData();
            if($errinfo = $this->verifyPostData($data,'add')){
                $this->assign('error-message',$errinfo['message']);
                $this->assign('data',$data);
                return true;
            }
            $this->addArticle($data);
            $this->getView()->alert("添加完成",$this->get('web_root','/').'admin/blog/list');
            return false;
        }
        
        return true;
    }
    private function addArticle($data){
        $model = new ArticleModel();
        
        $model->set(ArticleTable::TITLE,$data['title']);
        if(!$data['entitle']){
            $data['entitle'] = preg_replace('/\s+/','-',PinYin::getFull($data['title']));
        }
        $model->set(ArticleTable::ENTITLE,$data['entitle']);
        $model->set(ArticleTable::KIND,$data['kind']);
        $model->set(ArticleTable::SUMMARY,$data['summary']);
        $model->set(ArticleTable::CDATE,date('Y-m-d H:i:s'));
        $model->set(ArticleTable::EDATE,date('Y-m-d H:i:s'));
        $model->set(ArticleTable::BODY,$data['body']);
        $model->save();
    }
    private function updateArticle($data){
        $model = new ArticleModel();
        $model->set(ArticleTable::ID,$data['id']);
        $model->set(ArticleTable::TITLE,$data['title']);
        if(!$data['entitle']){
            $data['entitle'] = preg_replace('/\s+/','-',PinYin::getFull($data['title']));
        }
        $model->set(ArticleTable::ENTITLE,$data['entitle']);
        $model->set(ArticleTable::IMAGE,$data['image']);
        $model->set(ArticleTable::KIND,$data['kind']);
        $model->set(ArticleTable::SUMMARY,$data['summary']);
        $model->set(ArticleTable::EDATE,date('Y-m-d H:i:s'));
        $model->set(ArticleTable::BODY,$data['body']);
        $model->update();
    }
    private function verifyPostData($data,$type){
        $len = strlen($data['title']);
        if($len < 2){
            return array(
                'errcode'=>1,
                'message'=>'标题太短，请保持在2-100个字符范围.'
            );
        }
        if($len > 200){
            return array(
                'errcode'=>1,
                'message'=>'标题太长，请保持在2-100个字符范围.'
            );
        }
        if($type == 'add'){
            $articleTable = new ArticleTable();
            $len = $articleTable->countFind(array(
                ArticleTable::TITLE=>$data['title']
            ));
            if($len){
                return array(
                    'errcode'=>1,
                    'message'=>'标题已存在！'
                );
            }
        }
        if(!strlen($data['body'])){
            return array(
                'errcode'=>1,
                'message'=>'请填写内容！'
            );
        }
        return false;
    }
    private function getAddPostData(){
        $req = $this->getRequest();
        
        $data = array();
        
        $data['id'] = trim($req->post('id',0));
        $data['title'] = trim($req->post('title'));
        $data['entitle'] = trim($req->post('entitle'));
        $data['image'] = trim($req->post('image'));
        $data['summary'] = trim($req->post('summary'));
        $data['kind'] = intval($req->post('kind'));
        $data['body'] = trim($req->post('body'));
        
        return $data;
    }
    public function editAction($id=''){
        
        $akTable = new ArticleKindDefineTable();
        $kinds = $akTable->find();
        $this->assign('kinds',$kinds);
        $this->assign('type','edit');
        
        $action = $this->getRequest()->post('action');
        if($action != 'edit'){
            $id = intval($id);
            if(!$id){
                $this->getView()->alert("无有效id！",$this->get('web_root','/').'admin/blog/list');
                return false;
            }
            $artTable = new ArticleTable();
            $data = $artTable->findOne('*',array(
                ArticleTable::ID=>$id
            ));
            if(!$data){
                $this->getView()->alert("无有效id！",$this->get('web_root','/').'admin/blog/list');
                return false;
            }
            $this->assign('data',$data);
            return "blog/add.php";
        }else{
            $data = $this->getAddPostData();
            if($errinfo = $this->verifyPostData($data,'edit')){
                $this->assign('error-message',$errinfo['message']);
                $this->assign('data',$data);
                return true;
            }
            $this->updateArticle($data);
            $this->getView()->alert("修改完成",$this->get('web_root','/').'admin/blog/list');
            return false;
        }
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