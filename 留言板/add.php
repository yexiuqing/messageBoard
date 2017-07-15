<?php 
	include "blog.php";
	if(isset($_POST['sub'])){
		$title=$_POST['title'];
		$content=$_POST['con'];

		$sql="insert into blog(bid,title,content,time) values(null,'$title','$content',now())";
		$query=mysqli_query($link,$sql);

		if($query){
			echo "<script>location='index.php'</script>";
		}else{
			echo "<script>alert('插入失败')</script>";
			echo "<script>location='add.php'</script>";
		}

	}
 ?>
<meta charset="utf-8">
<form action="add.php" method="post">
	标题：<input type="text" name="title">
	<br />
	内容：<input type="textarea" name="con" rows="10" cols="20">
	<br />
	<input type="submit" name="sub" value="添加文章">
</form>