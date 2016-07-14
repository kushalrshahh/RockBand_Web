<!DOCTYPE html>

<html>
<body>
<div align="center">
<font color="red">  


<?php include("Thirdpage.html");
include "connectdb.php";
$con=mysqli_connect("localhost","root","","rockband_new");

 $uid="sm91";

$fid=array();
$gname=array();
$sub_gname=array();
$j=0;
$mainarray= array();
foreach($_GET['accumulate'] as $check)
	{
        $resulting = explode("-", $check);
        $mainarray[] = array("fid" => $resulting[0]);
        $j=$j+1;	
    }
	$j=$j-1;
	


$stmt=$mysqli->prepare("INSERT INTO follows VALUES (?,?,now())");
$stmt->bind_param('ss',$uid,$fid);
           
			echo "$uid";
		    $fid=$mainarray[$j]["fid"];
			echo "$fid";
			
            $stmt->execute();
			$stmt->close();
/*if(! $retval )
{
  die('Could not enter data: ' mysqli_error());
}*/
echo "Entered data successfully\n";
mysqli_close($con);
?>
</body>
</html>