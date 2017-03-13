<?php /* Smarty version Smarty-3.1.6, created on 2017-03-12 23:33:06
         compiled from "/data/home/bxu2442600368/htdocs/res/html/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:18936110958c26356b1c303-93353272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf5c1cfcb10dd1ca68a0af813087f2fbb6f11f99' => 
    array (
      0 => '/data/home/bxu2442600368/htdocs/res/html/menu.html',
      1 => 1489332770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18936110958c26356b1c303-93353272',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58c26356b4caf',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58c26356b4caf')) {function content_58c26356b4caf($_smarty_tpl) {?>        <script src="/res/js/jquery.js"></script> 
  <div class="top_all">
      <div class="top">
        <div class="top_menu">
        <label>无奇不有</label>
          <a href="/index/index/index">首页</a>
          <a href="/index/index/index/type/0">奇闻</a>
          <a href='/index/index/index/type/1'>异事</a>
        </div>
        <div class="top_user">
          <?php if (isset($_SESSION['name'])){?>
          <a href=""  class="name_show"><?php echo $_SESSION['name'];?>
</a>
          <img src="">
          <a href="/index/index/articleedit">发文章</a>
          <a href="/user/user/logout">注销</a>
          <?php }else{ ?>
          <a href="javascript:;" onclick="alert_div()">登录</a>
          <?php }?>
        </div>
  </div>
  <div class="alert_div " style="display:none">
      <div class="login_title">
        <label>奇闻异事账号</label>
        <a  class="alert_close" href="javascript:;" ><img scr='/res/img/login_close.png'></a>
      </div>
      <div class="login_div">
        <div class="input_div">
            <label><img src="/res/img/login_user.png"></label>
            <input type="text"  id="name" placeholder="账号">
        </div>
        <div class="input_div">
            <label><img src="/res/img/login_pass.png"></label>
            <input type="text" id="pass" placeholder="密码">
        </div>
        <div class="ti">
          <button id="login">登录</button>
        </div>
      </div>
      <hr>
      <div class="login_ti" >
        温馨提示:登录即注册
      </div>
  </div>
<div class="fade" style="display:none"></div>

        <script type="text/javascript">
            $().ready(function(){
    var name_show=$('.name_show').text()
    var name_l=name_show.length
    if (name_l>5){
      $('.name_show').text(name_show.substring(0,5)+'....')
    }
    })
        function alert_div(){
          $(".alert_div").css("display","block")
          $(".fade").css("display","block")
        }
        $('.alert_close').click(function(){
          $(".alert_div").css("display","none")
          $(".fade").css("display","none")

        })
        $("#login").click(function(){
          var params={}
          params['name']=$("#name").val();
          params['pass']=$("#pass").val();
          if (params['name']==''){
            alert("账号不能为空");
            return false;
          }
          if (params['pass']==''){
            alert("密码不能为空");
            return false;
          }       
          $.ajax({
            type:"post",
            url:"/user/user/login",
            data:params,
            dataType:"json",
            success:function(data){
              if (data.code==1){
                location.reload()
              }
              else {
                alert(data.message)
              }
            },

          } )  
        })  
        

        </script><?php }} ?>