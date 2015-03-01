<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title"><?php if($this->g('type','add') == 'add'):?>添加<?php else:?>修改<?php endif;?>配置</h2>
            <div class="blog-list" id="list-box">
                 <div id="error-box" style="text-align:left">
                     <?=$this->g('error-message');?>
                 </div>
                 <div>
                    <input type="button" value="返回" onclick="location.href='<?=$this->g('web_root','/')?>admin/config/list'"/>
                </div>
                 <form method="post" action="<?=$this->g('web_root','/')?>admin/config/<?=$this->g('type','add')?>">
                 <table class="">
                     <tr>
                         <th class="c1">配置标题：</th>
                         <td class="c2"><input type="text" id="title" name="title" value="<?=$this->g('data.title')?>"></td>
                     </tr>
                     <tr>
                         <th class="c1">配置名称：</th>
                         <td class="c2"><input type="text" id="key" name="key" value="<?=$this->g('data.key')?>"></td>
                     </tr>
                     <tr>
                         <th class="c1">配置类型：</th>
                         <td class="c2">
                             <select name="kind">
                                <?php 
                                $kindlist = $this->g('kindlist',array());
                                foreach($kindlist as $i=>$kitem):
                                 ?>
                                 <option value="<?=$kitem['id']?>"><?=$kitem['title']?></option>
                                <?php
                                endforeach;
                                ?>
                             </select>
                             
                         </td>
                     </tr> 
                    <tr>
                         <th class="c1">配置说明：</th>
                         <td ><textarea id="desc" name="desc"><?=$this->g('data.desc')?></textarea></td>
                     </tr>
                     <tr>
                         <th class="c1">值：</th>
                         <td class="c2"><input id="value" name="value" value="<?=$this->g('data.value')?>"/></td>
                     </tr>
                     <tr>
                         <th class="c1">排序：</th>
                         <td class="c2"><input type="text" id="sort" name="sort" value="<?=$this->g('data.sort')?>"/>数字小排前面</td>
                     </tr>
                     <tr>
                         <th colspan="2"><input class="submit" type="submit" value="提交"/></th>
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