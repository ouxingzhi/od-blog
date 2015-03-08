<?php 
use OdBlog\Table\ConfigTable;
?>
<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">配置列表</h2>
            <div>
                <input type="button" onclick="location.href='<?=$this->g('app_root','/')?>config/add'" value="添加配置"/>
                <input type="button"  onclick="location.href='<?=$this->g('app_root','/')?>config/typelist'" value="配置类型列表"/>
            </div>
            <form method="post" action="">
            <div class="blog-list" id="list-box">
                <ul class="kind-list">
                   <?php 
                    $kind = $this->g('kind');
                    $kindlist = $this->g('kindlist',array());
                    foreach($kindlist as $i=>$kitem):
                    ?>
                    <li <?php if($kind==$kitem['id']):?>class="cur"<?php endif;?> ><a href="<?=$this->g('app_root','/')?>config/list/<?=$param->build(array('kind'=>$kitem['id']))?>"><?=$kitem['title']?></a></li>
                   <?php endforeach;?>
                </ul>
                <table class="table-list">
                    <tr>
                        <th class="h2">标题</th>
                        <th class="h2">名称</th>
                        <th class="h3">值</th>
                        <th class="h4">操作</th>
                    </tr>
                    <?php
                    $list = $this->g('list',array());
                    foreach($list as $i=>$cf):
                    ?>
                    <tr>
                        <td><?=$cf['title']?></td>
                        <td><?=$cf['key']?></td>
                        <td>
                        <?php if($cf['type'] == ConfigTable::TYPE_ONELINE):?>
                         <input id="value" name="value" value="<?=$this->v($cf,'value')?>"/>
                         <?php elseif($cf['type'] == ConfigTable::TYPE_MULTLINE):?>
                         <textarea id="value" name="value"><?=$this->v($cf,'value')?></textarea>
                         <?php elseif($cf['type'] == ConfigTable::TYPE_SELECT):?>

                         <select id="value" name="value">
                        <?php
                            $definestr = $this->v($cf,'define','');
                            $oplines = preg_split("/[\r\n]+/",$definestr);
                            foreach($oplines as $i=>$opt):
                            $op = explode('|',$opt);
                            $key = $this->v($op,'0',0);
                            $text = $this->v($op,'1',"");
                        ?>
                             <option value="<?=$key?>"<?php if($key==$this->v($cf,'value')):?> selected="selected"<?php endif;?> ><?=$text?></option>
                         <?php endforeach;?>
                         </select>
                         <?php endif;?>
                        </td>
                        <td>
                            <input type="button" value="编辑" class="edit" data-id="<?=$cf['id']?>"/>
                            <input type="button" value="删除" class="del" data-id="<?=$cf['id']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="tl">
                            <strong>介绍: </strong><?=$cf['desc']?>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
                <?php if($list):?>
                <div>
                    <input type="submit" value="提交"/>
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
        var id = $(e.currentTarget).attr('data-id');
        toast('确定删除吗？',function(){
            location.href = "<?=$this->g('app_root','/')?>config/del/"+id;
        });
    });
    listbox.on('click','.edit',function(e){
        var id = $(e.currentTarget).attr('data-id');
        location.href = "<?=$this->g('app_root','/')?>config/edit/"+id;
    });
</script>

<?php $this->endSection('scripts');?>