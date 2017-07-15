<?php  
	include "blog.php";
	if(isset($_GET['bid'])){
		$bid=$_GET['bid'];
		$sql="update blog set hit=hit+1 where bid='$bid'";
		// echo "highlight_string(str)";
		$query=mysqli_query($link,$sql);
		if($query){
			$sql="select * from blog where bid=$bid";
			
			$query=mysqli_query($link,$sql);
			$arr=mysqli_fetch_array($query);

		}
	}
?>
<meta charset="utf-8">
<h2>标题:<?php echo $arr['title']?></h2>
<span>发表时间:<?php echo $arr['time']?></span><br/>
<span>查看次数: <?php echo $arr['hit']?></span>
<p>内容：<?php echo $arr['content']?></p>
<hr/>
<form action='index.php' method='get'>
	<input type="submit" name="return" value="返回列表">
</form>


