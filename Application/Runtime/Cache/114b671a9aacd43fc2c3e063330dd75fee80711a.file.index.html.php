<?php /* Smarty version Smarty-3.1.6, created on 2017-03-13 16:07:55
         compiled from "./Application/Index/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2639858be2eb1605591-75736804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '114b671a9aacd43fc2c3e063330dd75fee80711a' => 
    array (
      0 => './Application/Index/View\\Index\\index.html',
      1 => 1489369881,
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
       
        .content_text{font-size:1.2rem;}
        .content_user{ margin:0 auto;}
        .content_user img {width :3rem;height: 3rem;border-radius: 3rem;}

        .main_all{width:100%;}
        .main{ width: 72%;margin: 0 auto;margin-top: 1rem;}
        .main_content {overflow:auto;height:auto;margin: 1rem;background: white;padding:1rem}
        .main_left{ width: 60%;float: left }
        .main_right{width: 40%;float: right;}
        .text_content{margin-bottom: 1rem;overflow: hidden;}
        
       </style>
       <link rel="stylesheet" type="text/css" href="/res/css/init.css">
      </head>
      <body>
  <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['menu_path']->value)."/res/html/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

          <div class="main_all">
      <div class="main">
      <div class="main_left">
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
            <a href=""><?php echo $_smarty_tpl->tpl_vars['foo']->value['user_name'];?>
</a>
          </div>
          <div class="content_text">
          <div class="text_content">
          <a  href="/index/index/articleshow/articleid/<?php echo $_smarty_tpl->tpl_vars['foo']->value['id'];?>
" target="_blank">
          <span><?php echo $_smarty_tpl->tpl_vars['foo']->value['article_content'];?>
</span></a>
          </div>
          <div class="text_reply">
            <p>最后回答-xxx (3小时前)</p>
          </div>
          </div>
        </div>

      <?php } ?>
      </div>
      <div class="main_right">
        
      </div>
      </div>

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