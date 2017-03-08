<?php /* Smarty version Smarty-3.1.6, created on 2017-03-07 17:38:03
         compiled from "C:\wamp\wamp\www\res\html\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:1616558be56b2af6143-27011768%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35d43ba5d6308ff3da90746d97929f9ed7f130d8' => 
    array (
      0 => 'C:\\wamp\\wamp\\www\\res\\html\\menu.html',
      1 => 1488879480,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1616558be56b2af6143-27011768',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_58be56b2b24f4',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58be56b2b24f4')) {function content_58be56b2b24f4($_smarty_tpl) {?>        <script src="http://code.jquery.com/jquery.js"></script>   
      <div class="top">
        <div class="top_menu">
          <img src="">
          <a href="">新鲜事</a>
          <a href="">昨天</a>
          <a href=''>久事</a>
        </div>
        <div class="top_user">
        <ul >
          <?php if (isset($_SESSION['name'])){?>
          <li><a href="" ><?php echo $_SESSION['name'];?>
</a></li>
          <li><img src=""></li>
          <li><a href="/user/user/logout">注销</a></li>
          <?php }else{ ?>
          <li><a href="#" onclick="alert_div()">登录</a></li>
          <li><a href="">注册</a></li>
          <?php }?>

        </ul>
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