<?php /* Smarty version Smarty-3.1.6, created on 2017-03-09 17:47:45
         compiled from "./Application/Index/View\Index\articleedit.html" */ ?>
<?php /*%%SmartyHeaderCode:679158be644dd02630-97926922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b714eb4f67b002f90c76d981c3ee7310f5b44c88' => 
    array (
      0 => './Application/Index/View\\Index\\articleedit.html',
      1 => 1489052863,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '679158be644dd02630-97926922',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58be644ddf0af',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58be644ddf0af')) {function content_58be644ddf0af($_smarty_tpl) {?><!DOCTYPE HTML>
<html lang="en-US">

<head>
    <link rel="stylesheet" type="text/css" href="/res/css/common.css">
           <link rel="stylesheet" type="text/css" href="/res/css/init.css">
    <meta charset="UTF-8">
    <title>上传文件</title>
    <style type="text/css">
    
        .main_all{width:100%;margin: 0 auto}
        .main{ width: 72%;margin: 0 auto;margin-top: 1rem; }
        
    </style>
<script src="/res/js/jquery.js"></script> 
</head>
<body>

  <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['menu_path']->value)."/res/html/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="main_all">
      <div class="main">

    <textarea id="container" >输入具体活动内容</textarea>
    <!-- 加载编辑器的容器 -->
    <button class="up">提交</button>

        </div>
    </div>

    <!-- 配置文件 -->
    <script type="text/javascript" src="/res/Ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/res/Ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
    $().ready(function(){
    var article={}
    article.init = function(){
        article.main_editor = UE.getEditor('container',{ toolbars: [
        [ 'undo', 'redo', 'simpleupload']
    ],
        imageUrl: '/index/index/id',
        zIndex: 1}
    );
        $(".up").click(function(){
            article.save();
                })
        }
    article.params=function(){
        params={}
        params["content"]=article.main_editor.getContent()   
        params['title']   =$('.title').val()
        return params
    }
    article.save= function(){
        var params = article.params();
                $.ajax({
                    type:'post',
                    url: '/index/index/save',
                    data:params,
                    dataType:'json',
                    success:function(data){
                        if (data.code==1){
                        alert(data.message)
                        window.location.href="/index/index/index"}
                    },
                })
        }
    
    article.init();
      })
    </script>
</body>

</html><?php }} ?>