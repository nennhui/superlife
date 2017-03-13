<?php /* Smarty version Smarty-3.1.6, created on 2017-03-12 23:53:57
         compiled from "./Application/Index/View/Index/articleshow.html" */ ?>
<?php /*%%SmartyHeaderCode:92359191158c56f153b9bc5-60372409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '068a0f129dd3d09bf0ec90a6a9252f692181e4b9' => 
    array (
      0 => './Application/Index/View/Index/articleshow.html',
      1 => 1489332720,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '92359191158c56f153b9bc5-60372409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58c56f154260c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c56f154260c')) {function content_58c56f154260c($_smarty_tpl) {?>    <!DOCTYPE html>
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
        .main_content,.article_answer,.my_answer {overflow:auto;height:auto;margin: 1rem;background: white;padding:1rem}
        .main_left{ width: 60%;float: left }
        .main_right{width: 40%;float: right;}
        .my_answer textarea{ height:5rem;width: 100% }
        .my_answer button{height: 2rem ;background: #4eaa4c;color: white;}
        .text_content{margin-bottom: 1rem;overflow: hidden;}
        
       </style>
       <link rel="stylesheet" type="text/css" href="/res/css/init.css">
      </head>
      <body>
  <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['menu_path']->value)."/res/html/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

          <div class="main_all">
      <div class="main">
      <div class="main_left">
        <div class="main_content">
          <div class="content_user">
            <a>
            <img  src="/res/img/example.jpg"> 
            </a>
            <a href=""><?php echo $_smarty_tpl->tpl_vars['data']->value['user_name'];?>
</a>
          </div>
          <div class="content_text">
          <div class="text_content">
          <span><?php echo $_smarty_tpl->tpl_vars['data']->value['article_content'];?>
</span>
          </div>
          <div class="text_reply">
            <p>最后回答-xxx (3小时前)</p>
          </div>
          </div>
        </div>
        <div class="my_answer">
        <p>发表评论</p>
        <textarea class="my_answer_content"></textarea>
        <button onclick="my_ti()">发表评论</button>
        </div>
        <div class="article_answer">
           <div class="answer_title">评论</div>
           <hr>
           <div class="answer_content">但事实上</div> 
        </div>
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
      function my_ti(){
        var content=$(".my_answer_content").val()
        var articleid=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>

        var data={}
        data['content']=content
        data['articleid']=articleid
        $.ajax({
          type:'post',
          url:'/index/answer/answer',
          data:data,
       dataType:'json',
          success:function(data){

          },
        })
      }
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