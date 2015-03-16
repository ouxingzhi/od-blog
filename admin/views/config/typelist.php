<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">配置类型列表</h2>
           <form method="post" action="<?=$this->g('app_root','/')?>config/typelist">
            <div class="blog-list" id="list-box">
               <div>
                <input type="button" value="返回" onclick="location.href='<?=$this->g('app_root','/')?>config/list'"/>
                <input type="button" onclick="location.href='<?=$this->g('app_root','/')?>config/addtype'" value="添加配置类型"/>
            </div>
                <table class="table-list">
                    <tr>
                        <th class="h2">名称</th>
                        <th class="h3">排序</th>
                    </tr>
                    <?php 
                    $list = $this->g('list',array());
                    foreach($list as $i=>$item):
                    ?>
                    <tr>
                        <td><?=$item['title']?></td>
                        <td>
                            <input class="sort" type="text" name="id[<?=$item['id']?>]" value="<?=$item['sort']?>"/>
                            <input type="button" value="修改" class="edit" data-id="<?=$item['id']?>"/>
                            <input type="button" value="删除" class="del" data-id="<?=$item['id']?>"/>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
                <?php if($list):?>
                <div>
                    <input type="hidden" name="type" value="editorder"/>
                    <input type="submit" value="保存排序"/>
                </div>
                <?php endif;?>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $this->startSection();?>
<script>
    var listbox = $('#list-box');
    listbox.on('click','.del',function(e){
        var dom = $(e.currentTarget);
        var id = dom.attr('data-id');
        toast('确定要删除吗！',function(){
            location.href = "<?=$this->g('app_root','/')?>config/deltype/" + id;
        });
    });
    listbox.on('click','.edit',function(e){
        var dom = $(e.currentTarget);
        var id = dom.attr('data-id');
        location.href = "<?=$this->g('app_root','/')?>config/edittype/" + id;
    });
</script>

<?php $this->endSection('scripts');?>