<?php
	$svr="W88210-2K1"; //serverName\instanceName
	$dbs="HQBIdb"; //database

	if(!empty($_GET['hotelId'])||!empty($_GET['checkinDate'])||!empty($_GET['checkoutDate'])){
		$hid=$_GET['hotelId']; 
		$cin=$_GET['checkinDate'];
		$cout=$_GET['checkoutDate'];
		
		//check if valid date
		if (($timestamp = strtotime($cin)) === false){
			echo "Invalid check-in date parameter!";
		} elseif (($timestamp = strtotime($cout)) === false){
			echo "Invalid check-out date parameter!";		
		} else {
			deliver_response(200,"Valid Request",$hid,$cin,$cout,$svr,$dbs);
		}	
	}
	else{
		deliver_response(400,"Invalid Request",NULL,NULL,NULL,$svr,$dbs);
	}

	function deliver_response($status,$status_message,$hotelId,$checkIn,$checkOut,$serverName,$db)
	{
		// SQL connection using Windows Authentication.
		$connectionInfo = array( "Database"=>$db);
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( !$conn ) {
			 echo "Connection could not be established.<br />";
			 die( print_r( sqlsrv_errors(), true));
		}
		//call stored procedure that will get the best deal
		$tsql = "exec bi_data.spqGetBestDeal " .$hotelId.",'".$checkIn."','".$checkOut."'"; 

		$stmt = sqlsrv_query( $conn, $tsql);
		if( $stmt === false )
		{
			 echo "Error in executing query.</br>";
			 die( print_r( sqlsrv_errors(), true));
		}

		/* Retrieve and display the results of the query. */
		$row = sqlsrv_fetch_array($stmt);

		$response['status']=$status;
		$response['status_message']=$status_message;
		$data = array(	'offerId ' => $row[0],
						'hotelId ' => $row[1], 
						'checkinDate ' => date("Y-m-d",strtotime($row[2])),
						'checkoutDate ' => date("Y-m-d",strtotime($row[3])),
						'sellingPrice ' =>$row[4],
						'currencyCode ' =>$row[5]);

		echo json_encode($data);
		
		sqlsrv_free_stmt( $stmt);
		sqlsrv_close( $conn);
	}
?>

