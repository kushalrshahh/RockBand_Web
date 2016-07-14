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

//echo "<font color='white' size='5' text-align='center'>   concert on basis of users favourite music types</font>";
$query="select cname,cdate,ctime,vname from concert where cname in (Select distinct(cname) from c_musictype join likes ON c_musictype.musictype=likes.gname where fid='{$fid}')";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>concert on basis of users favourite music types</h1></caption>";
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
	 $link_address="concert.php?search=".$row["cname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table></br></br></br>";


//echo "<font color='white' size='5' text-align='center'>   concerts in the categories the user likes that were recommended in many lists by other users</font>";
$query="select cname,cdate,ctime,vname from concert where cname in (Select distinct(cname) from attend  where cname in(Select cname from likes join c_musictype on likes.gname=c_musictype.musictype and likes.fid='{$fid}')and recommend='yes' group by cname having(count(fid))>2)";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>concerts in the categories the user likes that were recommended in many lists by other users</h1></caption>";
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
	 $link_address="concert.php?search=".$row["cname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table>";

//echo "<font color='white' size='5' text-align='center'>   Recommended concerts by user himself</font>";
$query="select cname,cdate,ctime,vname from concert natural join attend where fid='{$fid}' and recommend='yes'";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>User's Recommendation list</h1></caption>";
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