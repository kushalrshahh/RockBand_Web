<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>



<body>
<table class="table-fill">

<?php include("Thirdpage.html");
$fid=$_SESSION['fid'];
$cname=array();
$cdate=array();
$ctime=array();
$vname=array();
$count=0;
include 'connectdb.php';
//echo "<font color='white' size='5' text-align='center'>   Followed Bands</font>";
$query="select bname,fid from band_follow  where fid='{$fid}'";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1> FOLLOWED BANDS</h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>Band Name</th>";
	 echo "<th class='text-left'>fid</th>";
	 echo "<th class='text-left'>details</th>";
	 
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";
     echo "<td class='text-left'>".$row["bname"]."</td>";
	 echo "<td class='text-left'>".$row["fid"]."</td>";
	 $link_address="band.php?search=".$row["bname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table>";



?>

  </table>
</body>
</html>