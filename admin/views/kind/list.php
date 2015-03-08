<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">类型列表</h2>
            <div class="blog-list" id="list-box">
                <div class="top-button-box">
                    <input type="button" value="添加类型" onclick="location.href='<?=$this->get('app_root','/')?>kind/add'"/>
                </div>
                <table class="table-list">
                    <tr>
                        <th class="h2">标题</th>
                        <th class="h3">操作</th>
                    </tr>
                    <?php
                        $list = $this->g('list');
                        if($list):
                        foreach($list as $i=>$r):
                    ?>
                    <tr>
                        <td class="c2"><?=$this->v($r,'name');?></td>
                        <td class="c3">
                            <input data-id="<?=$this->v($r,'id');?>" type="button" value="编辑" class="edit"/>
                            <input data-id="<?=$this->v($r,'id');?>" type="button" value="删除" class="del"/>
                        </td>
                    </tr>
                    <?php 
                        endforeach;
                    ?>
                    <?php else:?>
                    <tr>
                        <td colspan="2" align="center">无数据</td>
                    </tr>
                    <?php endif;?>
                </table>
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
        location.href = "<?=$this->g('app_root','/')?>kind/edit/" + id;
    });
    listbox.on('click','input.del',function(e){
        var dom = $(e.currentTarget);
        var arr = [dom.attr('data-id')];
        toast('确定要删除吗！',function(){
            deleteKind(arr,function(d){
                location.reload();
            });
        });
    });
</script>

<?php $this->endSection('scripts');?>