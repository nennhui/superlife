<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
<style type="text/css">
    .top_menu{
    height:40px; 
    }
    .mian {width:100%}

    .main_content{
    width:70%;
    margin: 0 auto;
    }
    .parameter{
        width: 1000px;
        border: 1px solid #00F;
        padding: 10px;
    }
        .parameter_text{
        width: 960px;
        display: none;
        border: 1px solid #00F;
        padding: 10px;
    }
    input{
   /*     border-radius: 1px;*/
    }
    tr{
     border: 1px solid #00F;
    }
    td,th{
        border: 1px solid #00F; 
    }
    button{
        background:#F0F0F0;
    }
</style>
        <link href="/res/static/init.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="main">

    <div class="main_content">
        <label> 添加请求的域名和请求方法</label>
        <div>    
            <input  class="url"placeholder="url地址">
            <input class="method" placeholder="请求方法">
            
        </div>   
         <label>添加参数，如果没有不需要填写</label>    
        <div class="parameter">
        <table class='parameter_table'>
            <thead>
                <tr >
                   <th  style="width:400px; height:100px"> 参数名称</th> 
                   <th  style="width:400px; height:100px;">参数值</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <textarea class='parameter_text' placeholder="输入json串类似于{'a':1,'b':2}" ></textarea>
        <button onclick="add_parameter()">添加参数</button>
        <button onclick="use_json()">使用json串</button>
        </div>
        <label>添加cookie，如果没有不需要填写</label> 
        <div>
            <input placeholder="cookie">
        </div>
        <div><button class="tijiao">提交</button></div>
    </div>
</div>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
<script>
    $().ready(function(){

    })
    function add_parameter(){
    $(".parameter_table").append
    ('<tr><td><input  class="parameter_name" placeholder="参数名称"></td><td><input class="parameter_val" placeholder="参数值"><button onclick="del_parameter(this)">删除参数</button></td></tr>')}
   
    function del_parameter(now){
        $(now).parent().parent().remove()
    }
    function use_json(){
        $('.parameter_text').attr('display',block)

    }
    $(".tijiao").click(function(){
        var dic = {}
        var pa={}
        dic["url"]=$(".url").val();
        dic["method"]=$(".method").val();
        var parameter_names=$('.parameter_name')
        var parameter_vals=$('.parameter_val')
        par_length=($(parameter_names).length)
        for (var i=0;i<par_length;i++)
        {
        var parameter_name=$(parameter_names[i]).val()
        var parameter_val=$(parameter_vals[i]).val()
        pa[parameter_name]=parameter_val
        dic['pa']=pa

        }

        $.ajax({
            type:'POST',
            url:'/index.php/testtool/index/aja',
            data:dic,
            dataType : 'json',
            success:function(data){
                // alert(data)
            }

        })
      
    })

</script>
</body>
</html>