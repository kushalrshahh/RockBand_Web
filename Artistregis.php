<?php
	include 'connectdb.php';

$fid=$_GET['fid'];
	$query="select trustscore from fan where fid='{$fid}'";
$result=$mysqli->query($query);

While($row=$result->fetch_array())
{  
	$trustscore=$row["trustscore"];
	 
}
	if($trustscore>7)
	{
	
				$stmt = $mysqli->prepare("INSERT INTO concert VALUES(?,?,?,?,now())");
				$cname=$_GET['cname'];
				$cdate=$_GET['cdate'];
				$ctime=$_GET['ctime'];
				$vname=$_GET['vname'];
				$stmt->bind_param('ssss',$cname,$cdate,$ctime,$vname);
				$stmt->execute();
				$stmt1 = $mysqli->prepare("INSERT INTO ticket_venue VALUES(?,?,?,?,?)");
				$tick_vname=$_GET['tick_vname'];
				$street=$_GET['street'];
				$city=$_GET['city'];
				$phone=$_GET['phone'];
				$website=$_GET['website'];
			    $stmt1->bind_param('sssis',$tick_vname,$street,$city,$phone,$website);
			    $stmt1->execute();
				$stmt1 = $mysqli->prepare("INSERT INTO ticket VALUES(?,?)");
				$tick_vname=$_GET['tick_vname'];
				$cname=$_GET['cname'];
			    $stmt1->bind_param('ss',$tick_vname,$cname);
			    $stmt1->execute();
				$stmt2 = $mysqli->prepare("INSERT INTO c_musictype VALUES(?,?)");
				 foreach ($_GET['list2'] as $selectedOption)
				{
					
					$musictype=$selectedOption;
					
					$stmt2->bind_param('ss',$cname,$musictype);
					$stmt2->execute();
					
				}
				$stmt3 = $mysqli->prepare("INSERT INTO ticket_venue VALUES(?,?,?,?,?)");
				$tick_vname=$_GET['tick_vname1'];
				$street=$_GET['street1'];
				$city=$_GET['city1'];
				$phone=$_GET['phone1'];
				$website=$_GET['website1'];
				$stmt3->bind_param('sssis',$tick_vname1,$street1,$city1,$phone1,$website1);
			    $stmt3->execute();
				$stmt4 = $mysqli->prepare("INSERT INTO ticket VALUES(?,?)");
				$tick_vname=$_GET['tick_vname1'];
				$cname=$_GET['cname'];
			    $stmt4->bind_param('ss',$tick_vname1,$cname);
			    $stmt4->execute();
	}
	else
	{
	echo "aaaaaaaaaaaaa";
	}
 include 'ThirdPage.html';
				
?>