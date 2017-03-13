<?php /* Smarty version Smarty-3.1.6, created on 2017-03-12 23:37:32
         compiled from "./Application/Index/View/Index/articleedit.html" */ ?>
<?php /*%%SmartyHeaderCode:89153696958c56a3cc91708-18647675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7055e7655b9739cc65e40e9b19978e413a81d444' => 
    array (
      0 => './Application/Index/View/Index/articleedit.html',
      1 => 1489333047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89153696958c56a3cc91708-18647675',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58c56a3ccfa64',
  'variables' => 
  array (
    'typelist' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c56a3ccfa64')) {function content_58c56a3ccfa64($_smarty_tpl) {?><!DOCTYPE HTML>
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
    <div><label>标题</label>
    <input type="text" class="title">
    </div>
    <div><label>分类</label>
    <select class="type">
    <?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['typelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
</option>
    <?php } ?>
  </select>
    <textarea id="container" >输入内容</textarea>
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
        article.main_editor = UE.getEditor('container',{ 
        toolbars:[['undo','redo','simpleupload']],
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
        params['type']   =$('.type').val()
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
                        // window.location.href="/index/index/index"
                        }
                    },
                })
        }
    
    article.init();
      })
    </script>
</body>

</html><?php }} ?>