<?php /* Smarty version Smarty-3.1.6, created on 2017-03-09 16:47:21
         compiled from "./Application/Index/View\Index\test.html" */ ?>
<?php /*%%SmartyHeaderCode:1485558c11636760a09-06656436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78a78b841b0c53e2f8b5f57710c996bc7c7883d5' => 
    array (
      0 => './Application/Index/View\\Index\\test.html',
      1 => 1489049233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1485558c11636760a09-06656436',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58c11636800ca',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c11636800ca')) {function content_58c11636800ca($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
            <form id ='dd'>
          <input type="file" name='upfile' id='upfile'/>
          </form>
<script src="/res/js/jquery.js"></script> 
                <script type="text/javascript">

      $("#upfile").change(function(){
        var formData = new FormData($("#dd")[0]);
        // alert (formData)
        $.ajax({
          type:"post",
          url:"/index/index/updata",
          data:formData,
          processData: false,
          contentType: false,
          async: false,
           cache: false,
          success:function(data){
            alert(data)
          },

        })
      })
      </script>
</body>
</html><?php }} ?>