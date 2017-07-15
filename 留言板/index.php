<style type="text/css">
	a{
		text-decoration: none;
		color: #000;
	}
</style>
<a href="add.php">继续添加文章</a>&nbsp;
<form action="index.php" method="get">
	<input type="text" name="search">&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" name="sub" value="搜索">
</form>
 <?php
	include "blog.php";
	$page=$_GET['p']<1?1:$_GET['p'];
	$pagenum=5;
	$showpage=5;
	$pageoffset=($showpage-1)/2;

	if(isset($_GET['search'])){
		$se=$_GET['search'];
		$w="title like '%$se%'";
	}else{
		$w=1;
	}

	$sql="select * from blog where $w order by bid desc limit ".(($page-1)*$pagenum).",$pagenum";
	$query=mysqli_query($link,$sql);
	while($arr=mysqli_fetch_array($query)){
?>

	<h3><a href="show.php?bid=<?php echo $arr['bid'];?>"><?php echo $arr['title']?></a> | <a href="delete.php?bid=<?php echo $arr['bid']?>">删除</a> |<a href="edit.php?bid=<?php echo $arr['bid']?>">修改</a></h3>
	<li><?php echo $arr['time']?></li>
	<p><?php echo iconv_substr($arr['content'],0,10);?>...</p>
	<hr />
<?php
	//substr
	}
?>
<!-- 分页A标签条码
1：总条数  count(*)  
2:总页数 ceil(总条数/$pagenum)
3:显示的标签数 $pageshow
4:显示偏移量 $pageoffset=($pageshow-1)/2
5:判断条件  $page大于$pageoffset+1  $page大于$pageoffset 
         $page小于$pageoffset  $page+$pageoffset大于count(*)
         //$page_all>$showpage && $page_all>$page+$pageoffset -->


<?php  
	$sql="select count(*) from blog ";
	$query=mysqli_query($link,$sql);
	$arr=mysqli_fetch_array($query);
	$all=$arr[0];;

	$page_all=ceil($all/$pagenum);
	$str="";
	$prepage=$page-1;
	$nextpage=$page+1;
	$str.="<a href='".$_SERVER['PHPSELF']."?p=1'>首页</a>";
	if($page>1){
		$str.="<a href='".$_SERVER['PHPSELF']."?p=$prepage'>上一页</a>";
	}else{
		$str.="<a href='javascript:void(0)' disabled = 'true' style='opacity: 0.2'>上一页</a>";

	}
	$start=1;
	$end=$page_all;
	if($page_all>$showpage){
		if($page_all>$pageoffset+1){
			$str.="...";
		}
		if($page>$pageoffset){
			$start=$page-$pageoffset;
			$end=$page_all>$page+$pageoffset?$page+$pageoffset:$page_all;
		}else{
			$start=1;
			$end=$page_all>$showpage?$showpage:$page_all;
		}
		if($page+$pageoffset>$page_all){
			$start=$start-($page+$pageoffset-$page_all);
			$end=$page_all;
		}
	}

	for($i=$start;$i<=$end;$i++){
		$str.="<a href='".$_SERVER['PHPSELF']."?p=$i' >$i&nbsp&nbsp</a>";
	}
	if($page_all>$showpage && $page_all>$page+$pageoffset){
		$str.="...";
	}

	if($page<$page_all){
		$str.="<a href='".$_SERVER['PHPSELF']."?p=$nextpage'>下一页</a>";
	}else{
		$str.="<a href='javascript:void(0)' disabled = 'true' style='opacity: 0.2'>下一页</a>";
	}
	$str.="<a href='".$_SERVER['PHPSELF']."?p=$page_all'>末页</a>";
	echo $str;



?>

<!-- //a默认是get提交方式 -->