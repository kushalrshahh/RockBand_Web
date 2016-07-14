<!DOCTYPE html>
<html>
<body>
<?php
include "connectdb.php"; 
include("Thirdpage.html");
$uid="sm91";
$f_fname=array();
$gname=array();
$fid=array();
$f_city=array();
$count=0;
$f=0;
$j=0;
$k=0;
$mainarray= array();
foreach($_GET['accumulate'] as $check)
	{
		echo $check;
        $mainarray[] = array("fid" => $check);
        $j=$j+1;	
    }
	$j=$j-1;
$stmt=$mysqli->prepare("INSERT INTO follows VALUES (?,?,now())");
$stmt->bind_param('ss',$uid,$fid);
		    $fid=$mainarray[$j]["fid"];
			$stmt->execute();
			$stmt->close();
foreach($_GET['accumulate'] as $check1)
	{
        $mainarray1[] = array("fid" => $check1);
        $f=$f+1;	
    }$f=$f-1;
	
$stmt=$mysqli->prepare("INSERT INTO follows VALUES (?,?,now())");
$stmt->bind_param('ss',$uid,$fid);
		    $fid=$mainarray[$f]["fid"];
			$stmt->execute();
			$stmt->close();
	
foreach($_GET['accumulate'] as $check2)
	{
        $mainarray2[] = array("fid" => $check2);
        $k=$k+1;	
    }
	$k=$k-1;
	
	
$stmt=$mysqli->prepare("INSERT INTO follows VALUES (?,?,now())");
$stmt->bind_param('ss',$uid,$fid);
		    $fid=$mainarray[$k]["fid"];
			$stmt->execute();
			$stmt->close();
		
?>
