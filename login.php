<?php

	$con = mysqli_connect('localhost','root','','ilcsesip');
	$user_name = $_GET['name'];
	$user_password = $_GET['password'];
	
	$sql = "SELECT name FROM registration WHERE name='$user_name' and password = '$user_password'";
	
	$result = mysqli_query($con,$sql);
	 if(!mysqli_num_rows($result)>0)
	 {
		 $status = "Failed";
		 echo json_encode(array("response"=>$status));
	
	 }
	else{
		$row = mysqli_fetch_assoc($result);
		$name = $row['name'];
		$status = "ok";
		echo json_encode(array("response"=>$status,"name"=>$name));
	}
	mysqli_close($con);
	
	

?>