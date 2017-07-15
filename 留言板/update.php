<?php  
	include "blog.php";
	if(isset($_POST['update'])){
		$flag=1;
		$name=$_POST['name'];
		$pass=$_POST['pass'];
		$repass=$_POST['repass'];
		$sql="select * from user where name='$name' and pass='$pass'";
		$query=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($query);
		// echo "<script>alert('修改成功')</script>";
		if($result){ 
			$sql="update user set pass='$repass' where name='$name'";
			$query=mysqli_query($link,$sql);

			echo "<script>alert($query)</script>";
			// echo"1111";
			// $res=mysqli_fetch_array($query);
			// if($res){
			// 	echo "<script>alert('修改成功')</script>";
			// }else{
			// 	echo "<script>alert('修改失败')</script>";
			// }
		}else{
			echo "修改失败";
		}

	}


?>
<meta charset="utf-8">
<form action='update.php' method='post'>
	用户名：<input type="text" name="name"><br />
	旧密码：<input type="password" name="pass"><br/>
	新密码：<input type="password" name="repass">
	<input type="submit" name="update" value="确认修改密码">
</form>	
