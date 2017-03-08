<?php /* Smarty version Smarty-3.1.6, created on 2017-03-07 16:03:46
         compiled from "./Application/Index/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2639858be2eb1605591-75736804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '114b671a9aacd43fc2c3e063330dd75fee80711a' => 
    array (
      0 => './Application/Index/View\\Index\\index.html',
      1 => 1488872821,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2639858be2eb1605591-75736804',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58be2eb1739f6',
  'variables' => 
  array (
    'data' => 0,
    'foo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58be2eb1739f6')) {function content_58be2eb1739f6($_smarty_tpl) {?>    <!DOCTYPE html>
    <html>
      <head>
    <link rel="stylesheet" type="text/css" href="/res/css/common.css">
           <link rel="stylesheet" type="text/css" href="/res/css/init.css">
        <title>列表</title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <style type="text/css">
       

/*        .content_text{  white-space:nowrap;line-height: 1.5rem;overflow: hidden ;text-overflow:ellipsis;}*/
        .content_text{width: 90%;float: right;height: 6rem;}
        .content_user{ width: 10%;float: left;
          }
        .content_user img {width :4rem;height: 4rem;border-radius: 4rem;}
        .main_content {height: 6rem;margin: 1rem;}
        
       </style>
       <link rel="stylesheet" type="text/css" href="/res/css/init.css">
      </head>
      <body>

  <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['menu_path']->value)."/res/html/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

      <div class="main">
      <?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['foo']->key;
?>
        <div class="main_content">
          <div class="content_user">
            <a>
            <img  src="/res/img/example.jpg"> 
            </a>
          </div>
          <div class="content_text">
          <div class="text_title">
          <a href="/index/index/articleId/id/<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
">
            <span>
            <?php echo $_smarty_tpl->tpl_vars['foo']->value['article_title'];?>

            </span>
            </a>
          </div>
          <div class="text_content">
          <span><?php echo $_smarty_tpl->tpl_vars['foo']->value['article_content'];?>
</span>
          </div>
          <div class="text_reply">
            <p>最后回答-xxx (3小时前)</p>
          </div>
          </div>
        </div>
      <?php } ?>
      </div>


<!-- 
            <form id ='dd'>
          <input type="file" name='upfile' id='upfile'/>
          </form>
          <a href="/index.php/index/index/downfile">下载</a> -->
      <script src="http://code.jquery.com/jquery.js"></script>

      <script type="text/javascript">

      $("#upfile").change(function(){
        var formData = new FormData($("#dd")[0]);
        // alert (formData)
        $.ajax({
          type:"post",
          url:"/index.php/index/index/updata",
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
    </html>


<?php }} ?>