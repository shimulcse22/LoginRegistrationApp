<?php
	$con = mysqli_connect('localhost','root','','ilcsesip');
	if($con){
		 echo'Connection Success..........';
	}
	else{
		 echo'Connection failed';
	}
	
	$name = $_GET['name'] ;
	$email =$_GET['email'] ;
	$paswword=$_GET['paswword'];
	
	
	$sql = "Select * from registration where name = '$name'";
	
	$result = mysqli_query($con,$sql);
	
	if(mysqli_num_rows($result)>0){
		$status = "Exist";
	}
	else{
		$sql2 = "INSERT INTO registration(name, email, password) VALUES('$name' , '$email' , '$paswword');";
		if(mysqli_query($con,$sql2))
		{
			$status = "Ok" ;
		}
		
		else
		{
			$status = "error" ;
		}
		
	}
	echo json_encode(array("response"=>$status));
	
	mysqli_close($con);	
	 
 
?>