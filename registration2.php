<?php
	include 'connectdb.php';
$fid=$_GET['id'];
echo $_GET['f_birthdate'];

	echo "!isset";
				$stmt = $mysqli->prepare("INSERT INTO fan VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

				$fid=$_GET['id'];
				$f_fname=$_GET['f_fname'];
				$f_mname=$_GET['f_mname'];
				$f_lname=$_GET['f_lname'];
				$f_city=$_GET['f_city'];
				$trustscore=0;
				$lastlogintime='2014-11-16 11:53:37';
				$lastlogouttime='2014-11-16 11:53:37';
				$f_birthdate=$_GET['f_birthdate'];
				$f_email=$_GET['f_email'];
				$f_street=$_GET['f_street'];
				$f_zipcode=$_GET['f_zipcode'];
				$password=$_GET['password'];
				$stmt->bind_param('sssssssisssis',$fid,$f_fname,$f_mname,$f_lname,$f_city,$f_birthdate,$f_email,$trustscore,$lastlogintime,$lastlogouttime,$f_street,$f_zipcode,$password);
				
				
				$stmt->execute();
				$fid=$_GET['id'];
				$sub_gname="test";
				$stmt1 = $mysqli->prepare("INSERT INTO likes VALUES(?,?,?)");
				 foreach ($_GET['list2'] as $selectedOption)
				{
					
					$gname=$selectedOption;
					
					$stmt1->bind_param('sss',$fid,$gname,$sub_gname);
					$stmt1->execute();
					
				}
				
				$stmt32 = $mysqli->prepare("INSERT INTO user_type values(?,?)");
				$fid=$_GET['id'];
				$type="user";
				$stmt32->bind_param('ss',$fid,$type);
				$stmt32->execute();
				include("startpage.html");
				
?>