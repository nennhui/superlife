<?php if (!defined('THINK_PATH')) exit();?>    <!DOCTYPE html>
    <html>
      <head>
        <title>Bootstrap 101 Template</title>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       <style type="text/css">
        .top{ width: 100%; height: 6rem;border-bottom:solid 1px red;} 
        .top_menu{ width: 70%;height: 100%; margin: 0 auto;}
        .top_menu img {width: }
        .top_menu a{display: inline-block; height: 3rem;margin: 0 atuo;}

        .main{ width: 45%;margin: 0 auto;}
        .main img{width: 1rem;height: 1rem;}
        .content_text{  white-space:nowrap;line-height: 1.5rem;overflow: hidden ;text-overflow:ellipsis;}
       </style>
       <link rel="stylesheet" type="text/css" href="/res/static/init.css">
      </head>
      <body>
      <div class="top">
        <div class="top_menu">
          <img src="">
          <a href="">新鲜事</a>
          <a href="">昨天</a>
          <a href=''>久事</a>
        </div>
      </div>

      <div class="main">
        <div class="main_content">
          <div class="content_user">
            <a>
            <img  src="/res/img/example.jpg"> <label>上天入地</label>
            </a>
          </div>
          <div class="content_text">
          <a href="">
            <span>
活动沙龙 「Mobile Testing Summit China 2017」第三届中国移动互联网测试开发大会-讲师征集
集  联网测试开发大会-讲师联网测试开发大会-讲师
            </span>
            </a>
          </div>
          <div class="content_reply">
            <p>最后回答-xxx (3小时前)</p>
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