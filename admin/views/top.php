<div class="container-top">
    <h1 class="main-title">后台</h1>
    <div class="main-top-menu">
        <ul>
            <li>欢迎回来，<?=$this->get('userinfo.name','游客');?></li>
            <li><a href="<?=$this->g('web_root','/');?>">博客首页</a></li>
            <li><a href="<?=$this->g('app_root','/');?>logout">退出</a></li>
        </ul>
    </div>
</div>