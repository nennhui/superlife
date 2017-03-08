<?php /* Smarty version Smarty-3.1.6, created on 2017-03-07 18:10:52
         compiled from "./Application/Index/View\Index\article.html" */ ?>
<?php /*%%SmartyHeaderCode:2745358be81568ccc38-09907902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '595845dbd0da2290902a369dab83211b029cbf72' => 
    array (
      0 => './Application/Index/View\\Index\\article.html',
      1 => 1488881131,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2745358be81568ccc38-09907902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58be81569af56',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58be81569af56')) {function content_58be81569af56($_smarty_tpl) {?>    <!DOCTYPE html>
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
      <div class="article_title">
        <h1><b><?php echo $_smarty_tpl->tpl_vars['data']->value['article_title'];?>
</b></h1>
        <div> 
          <a ><?php echo $_SESSION['name'];?>
</a>-发布于<label><?php echo $_smarty_tpl->tpl_vars['data']->value['create_time'];?>
</label>
        </div>
        <div class="article_content">
        <?php echo $_smarty_tpl->tpl_vars['data']->value['article_content'];?>

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