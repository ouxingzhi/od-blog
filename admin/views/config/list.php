<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">配置列表</h2>
            <div>
                <input type="button" onclick="location.href='<?=$this->g('web_root','/')?>admin/config/add'" value="添加配置"/>
                <input type="button"  onclick="location.href='<?=$this->g('web_root','/')?>admin/config/typelist'" value="配置类型列表"/>
            </div>
            <form method="post" action="">
            <div class="blog-list" id="list-box">
                <ul class="kind-list">
                   <?php 
                    $kind = $this->g('kind');
                    $kindlist = $this->g('kindlist',array());
                    foreach($kindlist as $i=>$kitem):
                    ?>
                    <li <?php if($kind==$kitem['id']):?>class="cur"<?php endif;?> ><a href="<?=$this->g('web_root','/')?>admin/config/list/<?=$param->build(array('kind'=>$kitem['id']))?>"><?=$kitem['title']?></a></li>
                   <?php endforeach;?>
                </ul>
                <table class="table-list">
                    <tr>
                        <th class="h2">标题</th>
                        <th class="h2">名称</th>
                        <th class="h3">说明</th>
                        <th class="h4">值</th>
                    </tr>
                    <?php
                    $list = $this->g('list',array());
                    foreach($list as $i=>$cf):
                    ?>
                    <tr>
                        <td><?=$cf['title']?></td>
                        <td><?=$cf['key']?></td>
                        <td><?=$cf['desc']?></td>
                        <td><input type="text" name="id[<?=$cf['id']?>]" value="<?=$cf['value']?>"/></td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </table>
                <div>
                    <input type="submit" value="提交"/>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<?php $this->startSection();?>
<script>

</script>

<?php $this->endSection('scripts');?>