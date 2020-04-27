<?php
	
	$link = @mysqli_connect('localhost', 'root', '', 'bulletin');
	mysqli_query($link, 'SET NAMES utf8'); 
	$sql = "SELECT id, Title, Content, Date FROM bulletin_content";
	$result = mysqli_query($link, $sql);
	
	$item = array();
	$turnBack = "";
	$count = 0;
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$count++;	
			$row["Content"] = str_replace(" ","&nbsp;",$row["Content"]);;
			$row["Content"] = str_replace("\r\n","<br>",$row["Content"]);
			array_push($item, $row["id"].":,:".$row["Title"].":,:".$row["Content"].":,:".$row["Date"]);
		}
	}
	//echo "var jstext=['$item[0]', '$item[1]']";
	foreach($item as $i){
		$turnBack = $turnBack.$i.":;:";
	}

	echo $turnBack.$count;
	echo "var itemCount = $count;";
	
	mysqli_close($link);
	
?>