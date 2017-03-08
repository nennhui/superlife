<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>爱图</title>
<style type="text/css">

.main{
    width: 70%;
    margin: 0 auto;
}

.example{
    float: left;
    width:20%;
    height: 300px;
    margin: 2%;
    border: 1px solid red;
    background: #ffffff;
    display: block;

}
.example_img{
    width: 100%;
    height: 80%;
}
.example_title{
    width: 100%;
    height: 20%;
    margin: 0 auto;
}
.page{
    width: 100%;
    height: 50px;

}
.page_block{
    display: inline;
    float: left;
    width: 40px;
    height:40px;
    border: 1px solid red;
    margin: 0 auto;
}
.clear { clear: both; }  
</style>
        <link href="/res/static/init.css" rel="stylesheet" type="text/css">
</head>
<body>
<div>sssss</div>
<div class="main">
<div>
<?php if(is_array($number)): foreach($number as $key=>$vo): ?><a class='example' href="http://www.baidu.com">
            <img src="/res/img/example.jpg"  class="example_img">
            <div class='example_title'>
                <p>快来看啊</p> 
            </div>
        </a><?php endforeach; endif; ?>
</div>
<div class="clear"></div>

<div class="page">
<?php $__FOR_START_11036__=1;$__FOR_END_11036__=$page_num+1;for($i=$__FOR_START_11036__;$i < $__FOR_END_11036__;$i+=1){ ?><a class='page_block' href='http://localhost/index.php/niceshow/resource/index?page=<?php echo ($i); ?>'>[$i]</a><?php } ?>
</div>

</div>
	<script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
<?php  for ($x=0; $x<=10; $x++) { echo "数字是：$x <br>"; } ?>
foreach (name="number" item="vo" )
   
        <a class='example' href="http://www.baidu.com">
            <img src="/res/img/example.jpg"  class="example_img">
            <div class='example_title'>
                <p>快来看啊</p> 
            </div>
        </a>
        [/foreach]
</script>
</body>
</html>