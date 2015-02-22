<form id="loginform" method="post" action="<?=$this->get('web_root','/');?>admin/login">
<div class="login">
    <div class="login-title">登录</div>
    <div class="login-username"><span>用户名:</span><input type="text" id="username" name="username" /></div>
    <div class="login-password"><span>密<em style="padding-left:1em"></em>码:</span><input type="password" id="password" name="password"/></div>
    <input type="hidden" name="action" value="post"/>
    <div class="login-submit"><input type="submit" value="提交"/></div>
    <div id="error-box"><?=$this->get("error_message");?></div>
</div>
</form>
<?php $this->startSection();?>
<script>
    $(function(){
        var errorbox = $('#error-box');
        $('input[type=submit]').button();
        $('#loginform').on('submit',function(e){
            errorbox.hide();
            var $this = $(this),
                username = $this.find('#username'),
                password = $this.find('#password');
            if(!$.trim(username.val())){
                errorbox.html('请输入用户名！').css('color','#fff').show().animate({
                    color:'#f00',
                },500);
                return false;
            }
            if(!$.trim(password.val())){
                errorbox.html('请输入密码！').css('color','#fff').show().animate({
                    color:'#f00',
                },500);
                return false;
            }
            return true;
        });
    });
</script>
<?php $this->endSection('scripts');?>