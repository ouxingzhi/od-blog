<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title><?=$this->get('cfg.web_title')?></title>
    <meta name="viewport" content="width=device-width,target-densitydpi=high-dpi,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="<?=$this->get('web_root','/')?>libs/art/css/ui-dialog.css"/>
    <link rel="stylesheet" type="text/css" href="<?=$this->get('app_root','/')?>public/css/common.css"/>
</head>
<body>
<?php $this->insert($this->getViewName());?>
<script src="<?=$this->get('web_root','/')?>libs/jquery/jquery-1.11.2.min.js"></script>
<?php $this->echoSection('expandlibs');?>
<script src="<?=$this->get('web_root','/')?>libs/art/dist/dialog-min.js"></script>
<script src="<?=$this->get('web_root','/')?>libs/common/common.js"></script>
<script src="<?=$this->get('app_root','/')?>public/js/business.js"></script>
<?php $this->echoSection('scripts');?>
</body>
</html>