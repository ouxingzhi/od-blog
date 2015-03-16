<?php

namespace Admin\View;

use Fw\Core\View;

class AdminView extends View{
    public function __construct($viewpath,$layoutpath){
        parent::__construct($viewpath,$layoutpath);   
    }
    public function alert($message,$jumpUrl=null,$sleep=5){
        $this->assign('message',$message);
        $this->assign('jumpUrl',$jumpUrl);
        $this->assign('sleep',$sleep);
        $this->write('ui/alert.php');
    }
}