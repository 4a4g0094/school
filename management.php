<?php
	
	header("location:management.html"); 
	
	function insert($title, $content){			
		$link = @mysqli_connect('localhost', 'root', '', 'bulletin');
		if ( !$link ) {
		   echo "MySQL資料庫連接錯誤!<br/>";
		   exit();
		}
		$sql = "INSERT INTO `bulletin_content`(`Title`, `Content`) VALUES ('".$title."', '".$content."')";
		mysqli_query($link, 'SET NAMES utf8'); 
		mysqli_query($link, $sql);

		mysqli_close($link);  // 關閉資料庫連接
	}
	
	function delect($id1, $id2, $id3, $id4, $id5){	
		$link = @mysqli_connect('localhost', 'root', '', 'bulletin');
		if ( !$link ) {
		   echo "MySQL資料庫連接錯誤!<br/>";
		   exit();
		}
		$sql1 = "DELETE FROM `bulletin_content` WHERE id=".$id1.";";
		$sql2 = "DELETE FROM `bulletin_content` WHERE id=".$id2.";";
		$sql3 = "DELETE FROM `bulletin_content` WHERE id=".$id3.";";
		$sql4 = "DELETE FROM `bulletin_content` WHERE id=".$id4.";";
		$sql5 = "DELETE FROM `bulletin_content` WHERE id=".$id5.";";
		mysqli_query($link, 'SET NAMES utf8'); 
		mysqli_query($link, $sql1);
		mysqli_query($link, $sql2);
		mysqli_query($link, $sql3);
		mysqli_query($link, $sql4);
		mysqli_query($link, $sql5);

		mysqli_close($link);  // 關閉資料庫連接
	}
	
/* 	$item = array();
	$count = 0;
	
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$count++;	  
			array_push($item, $row["id"].",".$row["Title"].",".$row["Content"]);
		}
	} */

	if(isset($_POST['add'])){
		insert($_POST['bulletinTitle'], $_POST['bulletinContent']);
	}	
	if(isset($_GET['id1'])){
		delect($_GET['id1'],$_GET['id2'],$_GET['id3'],$_GET['id4'],$_GET['id5']);
	}
?>