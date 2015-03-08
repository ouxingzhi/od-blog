<?php use Fw\Config\Config;?>
<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right alert-parent">
            <div class="alert-box">
                <h2>提示</h2>
                <div class="alert-content"><?=$this->g('message');?></div>
                <?php if($this->g('sleep')):?>
                <div><span class="seconds"><?=$this->g('sleep')?></span>秒之后自动跳转。</div>
                <?php endif;?>
                <div class="alert-buttons">
                    <input id="jumpUrl" type="button" value="确认" />
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->startSection();?>
    <?php 
        $jumpUrl = $this->g('jumpUrl',$this->g('app_root','/').'');
        $sleep = $this->g('sleep','null');
        
    ?>
    <script>
        var seconds = $('.seconds');
        var jumpUrl = '<?=$jumpUrl?>',
            sleep = <?=$sleep?>;
        var debug = <?=Config::get('debug','false')?>;
        if(sleep != null && !debug){
            countDown(5,function(num){
                seconds.html(num);
            },function(){
                location.href = jumpUrl;
            });
        }
        $('#jumpUrl').on('click',function(){
            location.href = jumpUrl;
        });
        
    </script>
<?php $this->endSection('scripts');?>