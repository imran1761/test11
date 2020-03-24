<?php

try
{
	$insert_arr=array();
	$mysqli = new mysqli('localhost', 'root', '', 'document') or die(mysqli_error(mysqli));
	
	$user_data=json_decode($_POST['user_data']);

	
	
	$name=($user_data->name);
	$location=($user_data->location);
	
	
	$check_exist=$mysqli->query ("SELECT * from users where name='$name'");

	$check_exist_rows = mysqli_num_rows($check_exist);

	if($check_exist_rows >0)
	{
			$insert_arr=array('name'=>$name);
			$resul_arr=array('status'=>'false','message'=>'Name already exist!','inserted_list'=>$insert_arr);
			echo json_encode($resul_arr);
	}
	else
	{
		$result=$mysqli->query ("INSERT INTO users (name, location) values('$name', '$location')") or die($mysqli->error); 
		if($result)
		{
			
			$insert_arr=array('name'=>$name,'location'=>$location);
			$resul_arr=array('status'=>'true','message'=>'inserted successfully','inserted_list'=>$insert_arr);
			echo json_encode($resul_arr);
		}
	}

	


}
catch(Exception  $ex)
{
	echo "db connection failed";
}

    
        
?>
