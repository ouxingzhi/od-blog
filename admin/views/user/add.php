<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title"><?php if($this->g('type','add') == 'add'):?>添加<?php else:?>编辑<?php endif;?>用户</h2>
            <div class="blog-list" id="list-box">
                 <div id="error-box" style="text-align:left">
                     <?=$this->g('error-message');?>
                 </div>
                 <form method="post" action="<?=$this->g('web_root','/')?>admin/user/<?=$this->g('type','add')?>">
                 <table class="edit user-add">
                     <tr>
                         <th class="c1">用户名：</th>
                         <td class="c2"><input class="input" type="text" <?php if($this->g('type') == 'edit'):?>disabled="disabled"<?php endif;?> id="name"  name="name" value="<?=$this->g('data.name')?>"></td>
                     <tr>
                         <th class="c1">昵称：</th>
                         <td class="c2"><input class="input" type="text" id="nickname" name="nickname" value="<?=$this->g('data.nickname')?>"></td>
                     </tr>
                     <?php if($this->g('type','add') == 'add'):?>
                     <tr>
                         <th class="c1">密码：</th>
                         <td class="c2"><input class="input" type="password" id="password" name="password" value="<?=$this->g('data.password')?>"></td>
                     </tr>
                     <tr>
                         <th class="c1">确认密码：</th>
                         <td class="c2"><input class="input" type="password" id="password2" name="password2" value="<?=$this->g('data.password2')?>"></td>
                     </tr>
                     <?php endif;?>
                     <tr>
                         <td>&nbsp;</td>
                         <td><input type="submit" value="提交"></td>
                     </tr>
                 </table>
                 <input type="hidden" name="id" value="<?=$this->g('data.id')?>"/>
                 <input type="hidden" name="type" value="<?=$this->g('type','add')?>"/>
                 </form>
            </div>
        </div>
    </div>
</div>

<?php $this->startSection();?>
<script>

</script>

<?php $this->endSection('scripts');?>