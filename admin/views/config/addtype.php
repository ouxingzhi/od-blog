<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title"><?php if($this->g('type','addtype') == 'addtype'):?>添加<?php else:?>修改<?php endif;?>配置类型</h2>
            <div class="blog-list" id="list-box">
                 <div id="error-box" style="text-align:left">
                     <?=$this->g('error-message');?>
                 </div>
                 <div>
                    <input type="button" value="返回" onclick="location.href='<?=$this->g('web_root','/')?>admin/config/typelist'"/>
                </div>
                 <form method="post" action="<?=$this->g('web_root','/')?>admin/config/<?=$this->g('type','addtype')?>">
                 <table class="">
                     <tr>
                         <th class="c1">类型名称：</th>
                         <td class="c2"><input type="text" id="title" name="title" value="<?=$this->g('data.title')?>"></td>
                     <tr>
                         <th class="c1">类型说明：</th>
                         <td ><textarea id="desc" name="desc"><?=$this->g('data.desc')?></textarea></td>
                     </tr>
                     <tr>
                         <th class="c1">排序：</th>
                         <td class="c2"><input type="text" id="sort" name="sort" value="<?=$this->g('data.sort')?>"/></td>
                     </tr>
                     <tr>
                         <th colspan="2"><input class="submit" type="submit" value="提交"/></th>
                     </tr>
                 </table>
                 <input type="hidden" name="id" value="<?=$this->g('data.id')?>"/>
                 <input type="hidden" name="type" value="<?=$this->g('type','addtype')?>"/>
                 </form>
            </div>
        </div>
    </div>
</div>

<?php $this->startSection();?>
<script>

</script>

<?php $this->endSection('scripts');?>