<?php /* Smarty version Smarty-3.1.6, created on 2017-03-10 17:19:44
         compiled from "./Application/Index/View/Index/test.html" */ ?>
<?php /*%%SmartyHeaderCode:28873810958c263dc9a4224-90422849%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fff9f60ac7cf1cbabee645065b9cda88bf5a2d94' => 
    array (
      0 => './Application/Index/View/Index/test.html',
      1 => 1489136961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28873810958c263dc9a4224-90422849',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58c263dc9dbde',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c263dc9dbde')) {function content_58c263dc9dbde($_smarty_tpl) {?><!DOCTYPE html>
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