<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">博文列表</h2>
            <div class="blog-list bloglist" id="list-box">
               <div class="top-button-box">
                    <input type="button" value="添加博文" onclick="location.href='<?=$this->get('app_root','/')?>blog/add'"/>
                </div>
                <table class="table-list">
                    <tr>
                        <th class="h1">选择</th>
                        <th class="h2">标题</th>
                        <th class="h3">类型</th>
                        <th class="h4">修改时间</th>
                        <th class="h5">操作</th>
                    </tr>
                    <?php
                        $list = $this->g('list');
                        $kindMap = $this->g('kinds',array());
                        if($list):
                        foreach($list as $i=>$r):
                    ?>
                    <tr>
                        <td class="c1"><input type="checkbox" class="selected" name="id[]" value="<?=$this->v($r,'id')?>"/></td>
                        <td class="c2"><?=$this->v($r,'title');?></td>
                        <td class="c3"><?=$this->v($kindMap,$r['kind'].'.name')?></td>
                        <td class="c4"><?=date('Y-m-d',$this->v($r,'edate',0));?></td>
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
                        <td colspan="4" style="text-align:left"><input class="delall" type="button" value="删除选中"/></td>
                    </tr>
                    <?php else:?>
                    <tr>
                        <td colspan="5" align="center">无数据</td>
                    </tr>
                    <?php endif;?>
                </table>
                <?php $this->insert('pagebar.php',array('baseurl'=>$this->g('app_root','/').'blog/list/'));?>
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
        location.href = "<?=$this->g('app_root','/')?>blog/edit/" + id;
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