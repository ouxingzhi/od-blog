<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">添加文章</h2>
            <div class="blog-list" id="list-box">
                 <div id="error-box" style="text-align:left">
                     <?=$this->g('error-message');?>
                 </div>
                 <form method="post" action="<?=$this->g('web_root','/')?>admin/blog/<?=$this->g('type','add')?>">
                 <table class="blog-edit">
                     <tr>
                         <th class="c1">标题：</th>
                         <td class="c2"><input class="input" type="text" id="title" name="title" value="<?=$this->g('data.title')?>"></td>
                     <tr>
                         <th class="c1">英文标题：</th>
                         <td class="c2"><input class="input" type="text" id="entitle" name="entitle" value="<?=$this->g('data.entitle')?>"></td>
                     </tr>
                     <tr>
                         <th>分类：</th>
                         <td>
                             <select id="kind" name="kind">
                                 <option value="0">请选择分类</option>
                                 <?php
                                    $kinds = $this->g('kinds',array());
                                        foreach($kinds as $i => $kind):
                                 ?>
                                 <option value="<?=$kind['id']?>"<?php if($kind['id'] == $this->g('data.kind')):?> selected="true"<?php endif;?>><?=$kind['name']?></option>
                                 <?php endforeach;?>
                             </select>
                         </td>
                     </tr>
                     <tr>
                         <th>图片：</th>
                         <td>
                             <div id="imagebox">
                                 <?php if($this->g('data.image')):?>
                                 <img src="<?=$this->g('data.image')?>"/>
                                 <?php endif;?>
                             </div>
                             <input type="button" id="selectimage" value="选择图片"/>
                             <input type="hidden" id="image" name="image" value="<?=$this->g('data.image')?>"/>
                         </td>
                     </tr>
                     <tr>
                         <th>摘要：</th>
                         <td><textarea type="text" id="summary" name="summary"><?=$this->g('data.summary')?></textarea></td>
                     </tr>
                     <tr>
                         <th>内容：</th>
                         <td><textarea type="text" id="body" name="body"><?=$this->g('data.body')?></textarea></td>
                     </tr>
                     <tr>
                         <th colspan="2"><input class="submit" type="submit" value="提交"/></th>
                     </tr>
                 </table>
                 <input type="hidden" name="id" value="<?=$this->g('data.id')?>"/>
                 <input type="hidden" name="action" value="<?=$this->g('type','add')?>"/>
                 </form>
            </div>
        </div>
    </div>
</div>
<?php $this->startSection();?>
<script src="<?=$this->g('web_root','/');?>libs/ckeditor/ckeditor.js"></script>
<script src="<?=$this->g('web_root','/');?>libs/ckfinder/ckfinder.js"></script>
<?php $this->endSection('expandlibs');?>
<?php $this->startSection();?>
<script>
    var editor = CKEDITOR.replace('body');
    
    var finderBasePath =  "<?=$this->g('web_root','/');?>libs/ckfinder/";
    CKFinder.setupCKEditor( editor, { 
        basePath : finderBasePath, 
        rememberLastFolder : false
    }) ;
    var selectimage = $('#selectimage');
    selectimage.on('click',function(){
        var finder = new CKFinder({
            basePath:"<?=$this->g('web_root','/');?>libs/ckfinder/",
            resourceType:'Images',
            language:'zh-cn'
        });
        finder.selectActionFunction = function(file){
            var imagebox = $('#imagebox'),
                image = $('#image');
            imagebox.html('<img src="'+file+'" />');
            image.val(file);
        }
        finder.popup(600,400);
    });
</script>

<?php $this->endSection('scripts');?>