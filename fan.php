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
$f_fname=$_GET['search'];
if(ISSET($_GET['search']))
$bname=$_GET['search'];

$query="select f_fname,f_mname,f_lname,gname from fan natural join likes  where f_fname='{$f_fname}' ";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1> FAN INFO</h1></caption>";
echo "<tr>";
	echo "<th class='text-left'>First Name</th>";
     echo "<th class='text-left'>Middle Name</th>";
	 echo "<th class='text-left'>Last Name</th>";
	 echo "<th class='text-left'>MusicType</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";
		echo "<td class='text-left'>".$row["f_fname"]."</td>";
     echo "<td class='text-left'>".$row["f_mname"]."</td>";
	 echo "<td class='text-left'>".$row["f_lname"]."</td>";
	 echo "<td class='text-left'>".$row["gname"]."</td>";
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 
	 
}
echo "</table></br></br></br>";


$query="select bname,becamefanon,band_rating,band_review from fan_of natural join fan where f_fname='{$f_fname}'";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>Band Review</h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>Bname</th>";
	 echo "<th class='text-left'>becamefanon</th>";
	 echo "<th class='text-left'>band rating</th>";
	 echo "<th class='text-left'>band review</th>";

     echo "</tr>";

	 
While($row=$result->fetch_array())
{  
	//$link_address=$row["website"];
	echo "<tr>";
     echo "<td class='text-left'><b><u>".$row["bname"]."</u></b></td>";
	 echo "<td class='text-left'>".$row["becamefanon"]."</td>";
	 echo "<td class='text-left'>".$row["band_rating"]."</td>";
	 	 echo "<td class='text-left'>".$row["band_review"]."</td>";
	 //echo "<tr><td class='text-left'>".$row["street"]."</td></tr>";
     echo "</tr>";
	 
}
echo "</table>";


$query="select cname,status,rating,recommend,review from attend natural join fan where f_fname='{$f_fname}'";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>Concert Review</h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>concert</th>";
	 echo "<th class='text-left'>status</th>";
	 echo "<th class='text-left'>rating</th>";
	 echo "<th class='text-left'>recommend</th>";
	 echo "<th class='text-left'>review</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	//$link_address=$row["website"];
	echo "<tr>";
     echo "<td class='text-left'><b><u>".$row["cname"]."</u></b></td>";
	 echo "<td class='text-left'>".$row["status"]."</td>";
	 echo "<td class='text-left'>".$row["rating"]."</td>";
	 echo "<td class='text-left'>".$row["recommend"]."</td>";
	 echo "<td class='text-left'>".$row["review"]."</td>";
     echo "</tr>";
	 //echo "<tr><td class='text-left'>".$row["street"]."</td></tr>";
	 
}
echo "</table>";

$query55="select cname,cdate,ctime,vname from fan natural join attend natural join concert where f_fname='{$f_fname}' and recommend='yes'";
$result=$mysqli->query($query55);
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
if(ISSET($_GET['submit']))
{
$stmt=$mysqli->prepare("INSERT INTO comments VALUES (?,?,?)");
$stmt->bind_param('sss',$fid,$f_fname,$comment);
		    $comment=$_GET['comment'];
			$f_fname=$_GET['f_fname'];
			$fid=$_GET['fid'];
			$stmt->execute();
			$stmt->close();
}

?>
<form action="" method="GET" align="center">
		<tr>
                <td class='text-left'>
                    <font color='white' size='3' text-align='center'>Comment</font>
                    <input type="text" name="comment" value="" align="center" />
					<input type="hidden" name="f_fname" value="<?=$f_fname?>" />
					<input type="hidden" name="fid" value="<?=$fid?>" />
					<input type="hidden" name="search" value="<?=$f_fname?>" />
					<input type="submit" name="submit" value="submit" />
                </td>
                
            </tr>




  </table>
</body>
</html>