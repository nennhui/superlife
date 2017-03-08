<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
 <html>
 <head>
 	<title>test</title>
 <style type="text/css">
 .main{
 	width:100px;
 	padding: 30px;
 	border: 3px solid #00F;
 	background: #BBFFFF;
 	margin: 3px 4px 5px 6px;
 }
 .ee{
 	width: 100%;
 	background: 	#000000;

 }
 </style>
 </head>


<div>
     <?php if(is_array($name)): foreach($name as $key=>$vo): echo ($key); ?>|<?php echo ($vo["username"]); ?>|<?php echo ($vo["email"]); endforeach; endif; ?>
   </div>
 <?php echo ($ss); ?>




 	// <script src="http://apps.bdimg.com/libs/jquery/1.6.4/jquery.js"></script>
// <script type="text/javascript">
// 	$(document).ready(function(){
// 		$.ajax({
// 			type:'post',
// 			url:'/index.php/testtool/index/aja',
// 			data:'123',
// 			type:'json',
// 			success:function(data){
// 				alert (data.a)
// 			},

// 		})
// 	})
// </script>
 </body>
 </html>