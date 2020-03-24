<?php

try
{
	$users_list=array();
	$mysqli = new mysqli('localhost', 'root', '', 'document') or die(mysqli_error(mysqli));
	
	$status=$_POST['status'];
	
	
	$check_exist=$mysqli->query ("SELECT * from users where status='$status'");

	$check_exist_rows = mysqli_num_rows($check_exist);

	if($check_exist_rows >0)
	{	
		while($row=mysqli_fetch_assoc($check_exist))
		{
			$users_list[]=$row;	
		}

		
			$resul_arr=array('status'=>'true','message'=>'records found','users_list'=>$users_list);
			echo json_encode($resul_arr);
	}
	else
	{
		
			$resul_arr=array('status'=>'false','message'=>'no records found','users_list'=>$users_list);
			echo json_encode($resul_arr);
		
	}

	



}
catch(Exception  $ex)
{
	echo "db connection failed";
}

    
        
?>
