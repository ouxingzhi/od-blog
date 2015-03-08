<div class="container">
    <header class="header">
        <h1>title</h1>
    </header>
    <section class="">
        <section class="left">
            <div class="list">
            <?php
            $list = $this->get('list',array());
            foreach($list as $i=>$item):
            ?>
            <dl>
                <dt><?=date('Y年m月d日',$this->v($item,'cdate',0))?></dt>
                <dt><?=$this->v($item,'title')?></dt>
                <dd><?=$this->v($item,'summary')?></dd>
                <dd>posted:<?=date('Y年m月d日',$this->v($item,'edate',0))?></dd>
            </dl>
            <?php
            endforeach;
            ?>
            </div>
            <div></div>
        </section>
        <aside class="right">
            <div class="about">
                
            </div>
            <div class="arttype">
                
            </div>
            <div class="comments">
                
            </div>
        </aside>
    </section>
</div>