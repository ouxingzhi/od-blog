<?php

namespace Blog\View;

use Fw\Core\View;

class BlogView extends View{
    public function __construct($viewpath,$layoutpath){
        parent::__construct($viewpath,$layoutpath);   
    }
    public function alert($message,$jumpUrl=null,$sleep=5){
        $this->assign('message',$message);
        $this->assign('jumpUrl',$jumpUrl);
        $this->assign('sleep',$sleep);
        $this->write('ui/alert.php');
    }
    public function echo404(){
        $this->write('ui/404.php');    
    }
}