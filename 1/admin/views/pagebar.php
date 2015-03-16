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
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>1))?>">首页</a></li>
            <?php else:?>
            <li>首页</li>
            <?php endif;?>
            <?php if($pageinfo['haspre']):?>
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>$pageinfo['cur']-1))?>">上一页</a></li>
            <?php else:?>
            <li>上一页</li>
            <?php endif;?>
            <?php foreach($pageinfo['steps'] as $i=>$pid):?>
            <?php if($pid != $pageinfo['cur']):?>
            <li class="step"><a href="<?=$baseurl . $urlparam->build(array('page'=>$pid))?>"><?=$pid?></a></li>
            <?php else:?>
            <li class="step"><?=$pid?></li>
            <?php endif;?>
            <?php endforeach;?>
            <?php if($pageinfo['hasnext']):?>
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>$pageinfo['cur']+1))?>">下一页</a></li>
            <?php else:?>
            <li>下一页</li>
            <?php endif;?>
            <?php if($pageinfo['hasnext']):?>
            <li><a href="<?=$baseurl . $urlparam->build(array('page'=>$pageinfo['totalpage']))?>">末页</a></li>
            <?php else:?>
            <li>末页</li>
            <?php endif;?>
        </ul>
        <div>
            共<?=$pageinfo['total'];?>条，每页<?=$pageinfo['count'];?>条，共<?=$pageinfo['totalpage'];?>页，当前第<?=$pageinfo['cur'];?>页。
        </div>
       </td></tr>
    </table>
</div>
<?php endif;?>