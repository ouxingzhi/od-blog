<?php
    $pageinfo = $this->g('pageinfo');
    $urlparam = $this->g('urlparam');
    $baseurl = isset($baseurl) ? $baseurl : '';
    if($pageinfo and $urlparam):?>
<div class="pagebar">
   <table>
       <tr><td>
        <ul>
            <?php if($pageinfo['haspre']):?>
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>1))?>">第一页</a></li>
            <?php else:?>
            <?php endif;?>
            <?php if($pageinfo['haspre']):?>
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>$pageinfo['cur']-1))?>">上一页</a></li>
            <?php else:?>
            <?php endif;?>
            <?php if(count($pageinfo['steps'])>1):?>
            <?php foreach($pageinfo['steps'] as $i=>$pid):?>
            <?php if($pid != $pageinfo['cur']):?>
            <li class="step"><a href="<?=$baseurl . $urlparam->build(array('page'=>$pid))?>"><?=$pid?></a></li>
            <?php else:?>
            <li class="step cur"><?=$pid?></li>
            <?php endif;?>
            <?php endforeach;?>
            <?php endif;?>
            <?php if($pageinfo['hasnext']):?>
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>$pageinfo['cur']+1))?>">下一页</a></li>
            <?php else:?>
            <?php endif;?>
            <?php if($pageinfo['hasnext']):?>
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>$pageinfo['totalpage']))?>">末页</a></li>
            <?php else:?>
            <?php endif;?>
        </ul>
       </td></tr>
    </table>
</div>
<?php endif;?>