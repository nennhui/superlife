<?php /* Smarty version Smarty-3.1.6, created on 2017-03-08 20:35:02
         compiled from "C:\wamp\www\res\html\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:1825058bff209528211-64368356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3523a5ca32c885579491635ae803c4bd0c5a8610' => 
    array (
      0 => 'C:\\wamp\\www\\res\\html\\menu.html',
      1 => 1488976500,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1825058bff209528211-64368356',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58bff209779ea',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58bff209779ea')) {function content_58bff209779ea($_smarty_tpl) {?>        <script src="/res/js/jquery.js"></script> 

  <div class="top_all">
      <div class="top">
        <div class="top_menu">
        <label>超乎想象</label>
          <a href="/index/index/index">文章</a>
          <a href="">昨天</a>
          <a href=''>久事</a>
        </div>
        <div class="top_user">
          <?php if (isset($_SESSION['name'])){?>
          <a href="" ><?php echo $_SESSION['name'];?>
</a>
          <img src="">
          <a href="/index/index/articleedit">发文章</a>
          <a href="/user/user/logout">注销</a>
          <?php }else{ ?>
          <a href="#" onclick="alert_div()">登录</a>
          <a href="">注册</a>
          <?php }?>

        </div>
        <div class="alert_div " style="display:none">
        <div class="login_div">
          <div class="">
            <label><img src=""></label>
            <input type="text"  id="name" placeholder="账号">
          </div>
          <div class="">
            <label><img src=""></label>
            <input type="text" id="pass" placeholder="密码">
          </div>
          <div class="ti">
          <button id="login">登录</button>
          </div>
          </div>
        </div>
    </div>


        <script type="text/javascript">
        function alert_div(){
          $(".alert_div").css("display","block")
        }

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
        </script>
      </div><?php }} ?>