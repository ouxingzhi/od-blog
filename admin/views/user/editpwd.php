<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">编辑密码</h2>
            <div class="blog-list" id="list-box">
                 <div id="error-box" style="text-align:left">
                     <?=$this->g('error-message');?>
                 </div>
                 <form method="post" action="<?=$this->g('app_root','/')?>user/editpwd">
                 <table class="edit user-add">
                     <tr>
                         <th class="c1">用户名：</th>
                         <td class="c2"><input class="input" type="text" disabled="disabled" id="name"  name="name" value="<?=$this->g('data.name')?>"></td>
                     </tr>
                     <tr>
                         <th class="c1">原密码：</th>
                         <td class="c2"><input class="input" type="password" id="spassword" name="spassword" value="<?=$this->g('data.spassword')?>"></td>
                     </tr>
                     <tr>
                         <th class="c1">新密码：</th>
                         <td class="c2"><input class="input" type="password" id="password" name="password" value=""></td>
                     </tr>
                     <tr>
                         <th class="c1">确认密码：</th>
                         <td class="c2"><input class="input" type="password" id="password2" name="password2" value=""></td>
                     </tr>
                     <tr>
                         <td>&nbsp;</td>
                         <td><input type="submit" value="提交"></td>
                     </tr>
                 </table>
                 <input type="hidden" name="id" value="<?=$this->g('data.id')?>"/>
                 <input type="hidden" name="type" value="editpwd"/>
                 </form>
            </div>
        </div>
    </div>
</div>

<?php $this->startSection();?>
<script>

</script>

<?php $this->endSection('scripts');?>