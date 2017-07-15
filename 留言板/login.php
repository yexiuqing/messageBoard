<?php 
	if(isset($_POST['sub'])){
		$name=$_POST['name'];
		$pass=$_post['pass'];

		$sql="select * from user where name='$name' and pass='$pass'";
		$query=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($query);
		if($result){
			setcookie('uid',$result['uid'],time()+180);
			setcookie('name',$result['name'],time()+180);
			echo "<script>location='index.php'</script>";
		}
		else{
			echo "<script>location='login.php'</script>";
		}

	}
	if(isset($_POST['update'])){
		echo "<script>location='update.php'</script>";
	}
?>
<meta charset="utf-8">
<form action='login.php' method='post'>
	用户名：<input type="text" name="name"><br />
	密码：<input type="password" name="pass"><br/>
	<input type="submit" name="sub" value="登录">&nbsp;&nbsp;
	<input type="submit" name="update" value="修改密码">
</form>	

