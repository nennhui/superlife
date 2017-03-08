<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <title>上传文件</title>
    <script src="/res/js/jquery.min.js" type="text/javascript"></script>
</head>
<body>
    <div>
        <label>主题</label>
        <input class="title" placeholder="活动主题">
    </div>

    <textarea id="container" >输入具体活动内容</textarea>
    <!-- 加载编辑器的容器 -->
    <button class="up">提交</button>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/res/Ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/res/Ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
    $().ready(function(){
    var article={}
    article.init = function(){
        article.main_editor = UE.getEditor('container');
        $(".up").click(function(){
            article.save();
                })
        }
    article.params=function(){
        params={}
        params["content"]=article.main_editor.getContent()   
        params['title']   =$('.title').val()
        return params
    }
    article.save= function(){
        var params = article.params();
                $.ajax({
                    type:'post',
                    url: '/index/index/save',
                    data:params,
                    dataType:'json',
                    success:function(data){
                        alert(data.message)
                    }
                })
        }
    
    article.init();
      })
    </script>
</body>

</html>