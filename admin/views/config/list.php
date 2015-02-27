<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title">配置列表</h2>
            <div class="blog-list" id="list-box">
                <table class="table-list">
                    <tr>
                        <th class="h2">名称</th>
                        <th class="h3">说明</th>
                        <th class="h4">值</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->startSection();?>
<script>

</script>

<?php $this->endSection('scripts');?>