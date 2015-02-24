<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">列表</h2>
            <div class="blog-list" id="list-box">
                <table class="table-list">
                    <tr>
                        <th class="h1">选择</th>
                        <th class="h2">标题</th>
                        <th class="h3">创建时间</th>
                        <th class="h4">修改时间</th>
                        <th class="h5">操作</th>
                    </tr>
                    <?php
                        $list = $this->g('list');
                        if($list):
                        foreach($list as $i=>$r):
                    ?>
                    <tr>
                        <td class="c1"><input type="checkbox" class="selected" name="id[]" value="<?=$this->v($r,'id')?>"/></td>
                        <td class="c2"><?=$this->v($r,'title');?></td>
                        <td class="c3"><?=$this->v($r,'cdate');?></td>
                        <td class="c4"><?=$this->v($r,'edate');?></td>
                        <td class="c5">
                            <input data-id="<?=$this->v($r,'id');?>" type="button" value="编辑" class="edit"/>
                            <input data-id="<?=$this->v($r,'id');?>" type="button" value="删除" class="del"/>
                        </td>
                    </tr>
                    <?php 
                        endforeach;
                    ?>
                    <tr>
                        <td><input type="checkbox" id="toggleselect"/>全选</td>
                        <td colspan="4"><input class="delall" type="button" value="删除选中"/></td>
                    </tr>
                    <?php else:?>
                    <tr>
                        <td colspan="5" align="center">无数据</td>
                    </tr>
                    <?php endif;?>
                </table>
                <?php $this->insert('pagebar.php',array('baseurl'=>$this->g('web_root','/').'admin/blog/list/'));?>
            </div>
        </div>
    </div>
</div>
<?php $this->startSection();?>
<script>
    var listbox = $('#list-box');
    listbox.on('click','input.edit',function(e){
        var dom = $(e.currentTarget),
            id = dom.attr('data-id');
        location.href = "<?=$this->g('web_root','/')?>admin/blog/edit/" + id;
    });
    listbox.on('click','input.del',function(e){
        var dom = $(e.currentTarget);
        var arr = [dom.attr('data-id')];
        toast('确定要删除吗！',function(){
            deleteArticle(arr,function(d){
                location.reload();
            });
        });
    });
    listbox.on('click','#toggleselect',function(e){
        var dom = $(e.currentTarget);
        if(dom.is(':checked')){
            listbox.find('.selected').each(function(){
               this.checked = true;
            });
        }else{
            listbox.find('.selected').each(function(){
               this.checked = false;
            });
        }
    });
    
    listbox.on('click','input.delall',function(){
        var selected = listbox.find('.selected:checked');
        var arr = [];
        selected.each(function(){
            arr.push($(this).val());
        });
        toast('确定要删除选中的吗！',function(){
            deleteArticle(arr,function(d){
                location.reload();
            });
        });
    });
</script>

<?php $this->endSection('scripts');?>