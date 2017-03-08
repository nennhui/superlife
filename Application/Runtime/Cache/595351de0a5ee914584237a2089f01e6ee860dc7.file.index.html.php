<?php /* Smarty version Smarty-3.1.6, created on 2017-02-15 10:34:35
         compiled from "./Application/Niceshow/View\Resource\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2630458a3bbf2c0fb00-32077293%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '595351de0a5ee914584237a2089f01e6ee860dc7' => 
    array (
      0 => './Application/Niceshow/View\\Resource\\index.html',
      1 => 1487126074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2630458a3bbf2c0fb00-32077293',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58a3bbf2d3c7c',
  'variables' => 
  array (
    'i' => 0,
    'number' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58a3bbf2d3c7c')) {function content_58a3bbf2d3c7c($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>爱图</title>
<style type="text/css">

.main{
    width: 70%;
    margin: 0 auto;
}

.example{
    float: left;
    width:20%;
    height: 300px;
    margin: 2%;
    border: 1px solid red;
    background: #ffffff;
    display: block;

}
.example_img{
    width: 100%;
    height: 80%;
}
.example_title{
    width: 100%;
    height: 20%;
    margin: 0 auto;
}
.page{
    width: 100%;
    height: 50px;

}
.page_block{
    display: inline;
    float: left;
    width: 40px;
    height:40px;
    border: 1px solid red;
    margin: 0 auto;
}
.clear { clear: both; }  
</style>
        <link href="/res/static/init.css" rel="stylesheet" type="text/css">
</head>
<body>
<include file="$menu_path"/>
<div class="main">
<div>
<foreach name="number" item="vo" >
   
        <a class='example' href="http://www.baidu.com">
            <img src="/res/img/example.jpg"  class="example_img">
            <div class='example_title'>
                <p>快来看啊</p> 
            </div>
        </a>
</foreach>
</div>
<div class="clear"></div>

<div class="page">
<for start="1" end="$page_num+1" name="i">
    <a class='page_block' href='http://localhost/index.php/niceshow/resource/index?page=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a>
</for>
</div>

</div>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>

<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['number']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['foo']->key;
?>
12333
<?php } ?>
</script>
</body>
</html><?php }} ?>