<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>


<body>
<table class="table-fill">

<?php include("Thirdpage.html");
echo $_SESSION['fid'];
$fid=$_SESSION['fid'];
$cname=array();
$cdate=array();
$ctime=array();
$vname=array();
$count=0;
include 'connectdb.php';
$query="select cname,cdate,ctime,vname from concert where cname in (select distinct(cname) from concert natural join c_musictype where musictype in(select gname from likes where fid='{$fid}')) AND cdate-curdate() Between 0 AND 7";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>Upcoming Concerts of your favourite musictype</h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>Concert Name</th>";
	 echo "<th class='text-left'>Concert Date</th>";
	 echo "<th class='text-left'>Concert Time</th>";
	 echo "<th class='text-left'>Venue</th>";
	 echo "<th class='text-left'>Details</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";
     echo "<td class='text-left'>".$row["cname"]."</td>";
	 echo "<td class='text-left'>".$row["cdate"]."</td>";
	 echo "<td class='text-left'>".$row["ctime"]."</td>";
	 echo "<td class='text-left'>".$row["vname"]."</td>";
	 $link_address="concert.php/?search=".$row["cname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table>";

//echo "<font color='white' size='5' text-align='center'>   Upcoming Concerts of Bands followed by you</font>";
$query="select bname,cname,cdate,ctime,vname from  perform natural join concert where cname in(select distinct(cname) from fan_of natural join perform natural join concert where cdate-curdate() Between 0 AND 7)";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>Upcoming Concerts of Bands followed by user</h1></caption>";
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
echo "</table>";
     
       
	

     



// Associative array



?>

</table>
</body>
</html>