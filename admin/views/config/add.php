<?php 
use OdBlog\Table\ConfigTable;
?>
<div class="container">
    <?php $this->insert('top.php');?>
    <div class="container-bottom">
        <?php $this->insert('left.php');?>
        <div class="container-right">
           <h2 class="column-title"><?php if($this->g('type','add') == 'add'):?>添加<?php else:?>修改<?php endif;?>配置</h2>
            <div class="blog-list" id="list-box">
                 <div id="error-box" style="text-align:left">
                     <?=$this->g('error-message');?>
                 </div>
                 <div>
                    <input type="button" value="返回" onclick="location.href='<?=$this->g('app_root','/')?>config/list'"/>
                </div>
                 <form method="post" action="<?=$this->g('app_root','/')?>config/<?=$this->g('type','add')?>">
                 <table class="config-table">
                     <tr>
                         <th class="c1">配置标题：</th>
                         <td class="c2"><input type="text" id="title" name="title" value="<?=$this->g('data.title')?>"></td>
                     </tr>
                     <tr>
                         <th class="c1">配置名称：</th>
                         <td class="c2"><input type="text" id="key" name="key" value="<?=$this->g('data.key')?>"></td>
                     </tr>
                     <tr>
                         <th class="c1">配置分类：</th>
                         <td class="c2">
                             <select name="kind">
                                <?php 
                                $kindlist = $this->g('kindlist',array());
                                $kind = $this->g('kind');
                                foreach($kindlist as $i=>$kitem):
                                 ?>
                                 <option value="<?=$kitem['id']?>" <?php if($kitem['id'] == $kind):?>selected="selected"<?php endif;?> ><?=$kitem['title']?></option>
                                <?php
                                endforeach;
                                ?>
                             </select>
                             
                         </td>
                     </tr> 
                     <tr>
                         <th class="c1">配置类型：</th>
                         <td class="c2">
                             <select id="ftype" name="ftype">
                                 <?php
                                 $typelist = $this->get('typelist'); 
                                 $type = $this->get('data.type',0);
                                 foreach($typelist as $key=>$tit):
                                 ?>
                                 <option value="<?=$key?>" <?php if($type==$key):?>selected="selected"<?php endif;?>><?=$tit?></option>
                                 <?php
                                 endforeach; 
                                 ?>
                             </select>
                         </td>
                     </tr>
                     <tr id="definebox" <?php if($type != ConfigTable::TYPE_SELECT):?>style="display:none"<?php endif;?> >
                         <th class="c1">选项定义：</th>
                         <td class="c2">
                             <textarea id="define" name="define"><?=$this->get('data.define')?></textarea>
                             <div>
                                 格式：一行定义一个option，行内通过`｜`分割，左边为value，右边为title，如: 1|选项1
                             </div>
                         </td>
                     </tr>
                    <tr>
                         <th class="c1">配置说明：</th>
                         <td ><textarea id="desc" name="desc"><?=$this->g('data.desc')?></textarea></td>
                     </tr>
                     <tr>
                         <th class="c1">值：</th>
                         <td id="valuebox" class="c2">
                             <?php if($type == ConfigTable::TYPE_ONELINE):?>
                             <input id="value" name="value" value="<?=$this->g('data.value')?>"/>
                             <?php elseif($type == ConfigTable::TYPE_MULTLINE):?>
                             <textarea id="value" name="value"><?=$this->g('data.value')?></textarea>
                             <?php elseif($type == ConfigTable::TYPE_SELECT):?>
                             
                             <select id="value" name="value">
                            <?php
                                $definestr = $this->g('data.define','');
                                $oplines = preg_split("/[\r\n]+/",$definestr);
                                foreach($oplines as $i=>$opt):
                                $op = explode('|',$opt);
                                $key = $this->v($op,'0',0);
                                $text = $this->v($op,'1',"");
                            ?>
                                 <option value="<?=$key?>"<?php if($key==$this->get('data.value')):?> selected="selected"<?php endif;?> ><?=$text?></option>
                             <?php endforeach;?>
                             </select>
                             <?php endif;?>
                         </td>
                     </tr>
                     <tr>
                         <th class="c1">排序：</th>
                         <td class="c2"><input type="text" id="sort" name="sort" value="<?=$this->g('data.sort')?>"/>数字小排前面</td>
                     </tr>
                     <tr>
                         <th colspan="2"><input class="submit" type="submit" value="提交"/></th>
                     </tr>
                 </table>
                 <input type="hidden" name="id" value="<?=$this->g('data.id')?>"/>
                 <input type="hidden" name="type" value="<?=$this->g('type','add')?>"/>
                 </form>
            </div>
        </div>
    </div>
</div>

<?php $this->startSection();?>
<script>
    void function(){
        var TYPE_ONELINE = <?=ConfigTable::TYPE_ONELINE?>;
        var TYPE_MULTLINE = <?=ConfigTable::TYPE_MULTLINE?>;
        var TYPE_SELECT = <?=ConfigTable::TYPE_SELECT?>;
        
        var type = $('#ftype'),
            definebox = $('#definebox'),
            valuebox = $('#valuebox'),
            define = $('#define');
        
        type.on('change',function(){
            var val = type.val();
            var v = $('#value').val();
            switchType(val,v,define.val());
        });
        
        define.on('input keyup',function(){
            var txt = define.val();
            if(txt.match(/(\w+\|\w+[\r\n]*)?/)){
                var sel = buildSelect(txt);
                var val = $('#value').val();
                valuebox.html('');
                valuebox.append(sel);
                sel.val(val);
            }
        });
        
        function switchType(type,val,def){
            type = parseInt(type);
            switch(type){
                case TYPE_ONELINE:
                    definebox.hide();
                    valuebox.html('<input id="value" name="value" value="'+val+'"/>');
                    break;
                case TYPE_MULTLINE:
                    definebox.hide();
                    valuebox.html('<textarea id="value" name="value">'+val+'</textarea>');
                    break;
                case TYPE_SELECT:
                    definebox.show();
                    var sel = buildSelect(def);
                    valuebox.html('');
                    valuebox.append(sel);
                    sel.val(val);
                    break;
            }
        }
        function buildSelect(text){
            var ml = (text || '').split(/[\r\n]+/i),
                op,
                html = [];
            html.push('<select id="value" name="value">');
            for(var i=0,l=ml.length;i<l;i++){
                op = ml[i].split('|');
                html.push('<option value="'+(op[0] ? op[0] : '')+'">'+(op[1] ? op[1] : '')+'</option>');
            }
            html.push('</select>');
            return $(html.join(''));
        }
        
    }();
</script>
<?php $this->endSection('scripts');?>