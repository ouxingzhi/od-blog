<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">添加类型</h2>
            <div class="blog-list" id="list-box">
                 <div id="error-box" style="text-align:left">
                     <?=$this->g('error-message');?>
                 </div>
                 <form method="post" action="<?=$this->g('app_root','/')?>kind/<?=$this->g('type','add')?>">
                 <table class="kink-edit">
                     <tr>
                         <th class="c1">名称：</th>
                         <td class="c2"><input class="input" type="text" id="name" name="name" value="<?=$this->g('data.name')?>"></td>
                     </tr>
                     <tr>
                         <th>&nbsp;</th>
                         <td><input type="submit" value="提交"/></td>
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