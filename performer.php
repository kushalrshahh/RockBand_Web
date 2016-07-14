<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>



<body>
<table class="table-fill">

<?php
include("Thirdpage.html");
include("connectdb.php");

$fid=$_SESSION['fid'];
$bname=$_GET['search'];

//echo "<font color='white' size='5' text-align='center'>   UPCOMING CONCERTS INFO </font>";
$query="select pname,bname,cname,cdate,ctime,vname from concert natural join perform natural join performer where pname='{$search}' AND cdate>CURDATE()";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1> UPCOMING CONCERTS INFO</h1></caption>";
echo "<tr>";
	echo "<th class='text-left'>Band Name</th>";
     echo "<th class='text-left'>Concert Name</th>";
	 echo "<th class='text-left'>Concert Date</th>";
	 echo "<th class='text-left'>Concert Time</th>";
	 echo "<th class='text-left'>Venue</th>";
	  echo "<th class='text-left'>Details</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";
		echo "<td class='text-left'>".$row["bname"]."</td>";
     echo "<td class='text-left'>".$row["cname"]."</td>";
	 echo "<td class='text-left'>".$row["cdate"]."</td>";
	 echo "<td class='text-left'>".$row["ctime"]."</td>";
	 echo "<td class='text-left'>".$row["vname"]."</td>";
	 $link_address="concert.php?search=".$row["cname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table></br></br></br>";

//echo "<font color='white' size='5' text-align='center'>  PAST CONCERTS INFO </font>";
$query="select pname,bname,cname,cdate,ctime,vname from concert natural join perform natural join performer where pname='{$search}' AND cdate<CURDATE()";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1> PAST CONCERTS INFO</h1></caption>";
echo "<tr>";
	echo "<th class='text-left'>Band Name</th>";
     echo "<th class='text-left'>Concert Name</th>";
	 echo "<th class='text-left'>Concert Date</th>";
	 echo "<th class='text-left'>Concert Time</th>";
	 echo "<th class='text-left'>Venue</th>";
	  echo "<th class='text-left'>Details</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";
		echo "<td class='text-left'>".$row["bname"]."</td>";
     echo "<td class='text-left'>".$row["cname"]."</td>";
	 echo "<td class='text-left'>".$row["cdate"]."</td>";
	 echo "<td class='text-left'>".$row["ctime"]."</td>";
	 echo "<td class='text-left'>".$row["vname"]."</td>";
	 $link_address="concert.php?search=".$row["cname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table></br></br></br>";

?>

  </table>
</body>
</html>