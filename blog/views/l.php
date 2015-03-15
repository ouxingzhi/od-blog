<div class="container">
    <?php $this->insert('head.php');?>
    <section class="content main-width clearboth">
        <section class="left">
            <div class="list">
            <?php
            $list = $this->get('list',array());
            $len = count($list);
            if($len):
            foreach($list as $i=>$item):
            ?>
            <a href="<?=$this->g('app_root','/')?>a/<?=$item['id']?>">
            <dl class="art-box">
                <dt class="art-date"><?=date('Y年m月d日',$this->v($item,'cdate',0))?></dt>
                <dt class="art-title"><h3><?=$this->v($item,'title')?></h3></dt>
                <dd class="art-summary">
                <?php
                $text = preg_replace("/&nbsp;|[\s\t]+/m","",strip_tags($this->v($item,'body','')));
                if(iconv_strlen($text,"utf-8") > 200):
                $ctext = iconv_substr($text,0,200,"utf-8") . '...';
                else:
                $ctext = $text;
                endif;
                echo $ctext;
                ?></dd>
                
            </dl>
            </a>
            <?php if($i != $len-1):?><div class="bh2em"></div><?php endif;?>
            <?php
            endforeach;
            else:
            ?>
            <div class="list-empty">无数据...</div>
            <?php endif;?>
            </div>
            <?php $this->insert('pagebar.php',array('baseurl'=>$this->g('app_root','/') . 'l/' ));?>
        </section>
        <aside class="right">
            <div class="left-black about">
                <h4 class="left-black-title">关于</h4>
                <div class="left-black-cont"><?=$this->get('cfg.about')?></div>
            </div>
            <div class="bh2em"></div>
            <div class="left-black arttype">
                <h4 class="left-black-title">分类</h4>
                <div class="left-black-cont">
                <ul class="kindlist">
                <?php
                $kindlist = $this->g('kindlist',array());
                $urlparam = $this->g('urlparam');
                $curkind = $this->g('kind');
                foreach($kindlist as $i=>$kind):
                ?>
                    <li <?php if($curkind == $kind['id']):?>class="cur"<?php endif;?> ><a href="<?=$this->get('app_root','/')?>l/<?=$urlparam->build(array('kind'=>$kind['id']),array('page'))?>"><?=$kind['name']?></a></li>
                <?php endforeach;?>
                </ul>
                </div>
            </div>
            <div class="bh2em"></div>
            <div class="left-black comments">
                <h4 class="left-black-title">评论</h4>
                <div class="left-black-cont"></div>
            </div>
        </aside>
    </section>
</div>