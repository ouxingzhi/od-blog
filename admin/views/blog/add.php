<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">添加文章</h2>
            <div class="blog-list" id="list-box">
                 <table class="blog-edit">
                     <tr>
                         <th class="c1">标题：</th>
                         <td class="c2"><input class="input" type="text" id="title" name="title"></td>
                     </tr>
                     <tr>
                         <th>图片：</th>
                         <td>
                             <div id="imagebox"></div>
                             <input type="button" id="selectimage" value="选择图片"/>
                             <input type="hidden" id="image" name="image" value=""/>
                         </td>
                     </tr>
                     <tr>
                         <th>摘要：</th>
                         <td><textarea type="text" id="summary" name="summary"></textarea></td>
                     </tr>
                     <tr>
                         <th>内容：</th>
                         <td><textarea type="text" id="body" name="body"></textarea></td>
                     </tr>
                     <tr>
                         <th colspan="2"><input type="submit" value="提交"/></th>
                     </tr>
                 </table>
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
        CKFinder.popup(finderBasePath,600,400,function(file){
            var imagebox = $('#imagebox'),
                image = $('#image');
            imagebox.html('<img src="'+file+'" />');
            image.val(file);
        });
    });
</script>

<?php $this->endSection('scripts');?>