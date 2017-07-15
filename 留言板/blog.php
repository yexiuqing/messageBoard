<?php  
	//创建数据库
	@$link=mysqli_connect("localhost","root","") or die("数据库连接错误");
	//选择数据库
	@mysqli_select_db($link,"blog_2");
	//选择编码
	@mysqli_set_charset($link,"UTF8");
?>