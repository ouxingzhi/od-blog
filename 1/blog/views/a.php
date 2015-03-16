<div class="container">
    <?php $this->insert('head.php');?>
    <section class="content main-width clearboth">
        <section class="left">
            <div class="article-cont">
                <h1 class="article-title"><?=$this->g('article.title')?></h1>
                <div class="article-info"><?=date('Y-m-d',$this->g('article.cdate',0))?></div>
                <div class="article-body"><?=$this->g('article.body');?></div>
            </div>
            <div class="comments">
                <h3>评论</h3>
                <div class="comments-list">
                    <?php 
                    $comments = $this->g('comments',array());
                    foreach($comments as $i=>$c):
                    ?>
                    <dl>
                        <dt><?=$c['name']?>:</dt>
                        <dd><?=$c['body']?></dd>
                    </dl>
                    <?php endforeach;?>
                    <?php if(!$comments):?>
                    <div style="text-align:center">无评论</div>
                    <?php endif;?>
                </div>
            </div>
            <div class="comments-post">
                   <h3>评论提交</h3>
                    <div>
                        <p>名称：</p>
                        <p><input type="text" name="name"/></p>
                    </div>
                    <div>
                        <p>Email：</p>
                        <p><input type="text" name="email"/></p>
                    </div>
                    <div>
                        <p>留言：</p>
                        <p><textarea name="body" class=""></textarea></p>
                    </div>
                    <input type="hidden" name="id" value="<?=$this->g('article.id',0)?>"/>
                    <p><input type="submit" id="submitmessage" value="提交"/></p>
            </div>
            
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
        </aside>
    </section>
</div>
<?php $this->startSection();?>
<script>
    void function(){
        $('#submitmessage').on('click',function(){
            var data = {};
            data.id = $('input[name=id]').val();
            data.email = $('input[name=email]').val();
            data.name = $('input[name=name]').val();
            data.body = $('textarea[name=body]').val();

            $.post('<?=$this->g('app_root','/')?>comment/post',data,function(d){
                if(d.code){
                    toast(d.message);   
                }else{
                    location.reload();   
                }
            },'json');
        });
    }();
</script>
<?php $this->endSection('scripts');?>