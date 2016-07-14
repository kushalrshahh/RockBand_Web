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
if(ISSET($_GET['search']))
$bname=$_GET['search'];

$query="select bname,cname,cdate,ctime,vname from concert natural join band where bname='{$bname}' AND cdate>CURDATE()";
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


$query="select bname,b_startdate,gname from band natural join plays where bname='{$bname}'";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1> BAND INFO</h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>Band Name</th>";
	 echo "<th class='text-left'>Genre</th>";
	 echo "<th class='text-left'>B_StartDate</th>";

     echo "</tr>";

	 
While($row=$result->fetch_array())
{  
	//$link_address=$row["website"];
	echo "<tr>";
     echo "<td class='text-left'><b><u>".$row["bname"]."</u></b></td>";
	 echo "<td class='text-left'>".$row["gname"]."</td>";
	 echo "<td class='text-left'>".$row["b_startdate"]."</td>";
	 //echo "<tr><td class='text-left'>".$row["street"]."</td></tr>";
     echo "</tr>";
	 
}
echo "</table>";


$query="select pname,p_fname,p_lname,p_startdate,biography,p_city from band natural join performer where bname='{$bname}'";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1> PERFORMER INFO</h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>pname</th>";
	 echo "<th class='text-left'>firstname</th>";
	 echo "<th class='text-left'>lastname</th>";
	 echo "<th class='text-left'>startdate</th>";
	 echo "<th class='text-left'>biography</th>";
	 echo "<th class='text-left'>city</th>";
	 echo "<th class='text-left'>Details</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	//$link_address=$row["website"];
	echo "<tr>";
     echo "<td class='text-left'><b><u>".$row["pname"]."</u></b></td>";
	 echo "<td class='text-left'>".$row["p_fname"]."</td>";
	 echo "<td class='text-left'>".$row["p_lname"]."</td>";
	 echo "<td class='text-left'>".$row["p_startdate"]."</td>";
	 echo "<td class='text-left'>".$row["biography"]."</td>";
	 echo "<td class='text-left'>".$row["p_city"]."</td>";
	  $link_address="searchartist.php?search=".$row["pname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 //echo "<tr><td class='text-left'>".$row["street"]."</td></tr>";
	 
}
echo "</table>";

$query21="select fid,band_rating,band_review from fan_of  where bname='{$bname}' ";
$result=$mysqli->query($query21);
echo "<table align='center'>";
echo "<font color='white' size='5' text-align='center'>   Reviews By Other users </font>";
echo "<tr>";
	echo "<th class='text-left'>fan_id</th>";
     echo "<th class='text-left'>rating</th>";
	 echo "<th class='text-left'>review</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	
	echo "<tr>";
	echo "<td class='text-left'>".$row["fid"]."</td>";
	 echo "<td class='text-left'>".$row["band_rating"]."</td>";
	 echo "<td class='text-left'>".$row["band_review"]."</td>";
     //echo "</tr>";
	 
}
echo "</table>";




echo "<font color='white' size='5' text-align='center'>   FEEDBACK</font>";
?>
<form action="" method="GET" align="center">
        <table align="center">
            <tr>
                <td class='text-left'>
                    <label for="q" color="white">Rating(1-5)</label>
                    <input type="text" name="rating" value="" align="center" />
                </td>
                
            </tr>
			<tr>
                <td class='text-left'>
                    <label for="q" color="white">Review</label>
                    <input type="text" name="review" value="" align="center" />
                </td>
                
            </tr>
			<tr>
			<td class='text-left'><input type="submit" name="submit" value="submit" />
			<input type="hidden" name="search" value="<?=$bname?>" /></td>
			</td>
			</tr>
        </table>
    </form>
	
<form action="" method="GET" align="center">
        <table align="center">
            
			<tr>
			<td class='text-left'><input type="submit" name="follow" value="follow" />
			<input type="hidden" name="search" value="<?=$bname?>" /></td>
			</td>
			</tr>
        </table>
    </form>
	



<?php
include("connectdb.php");


if(ISSET($_GET['follow']))
{

	$stmt = $mysqli->prepare("INSERT INTO band_follow VALUES(?,?)");
				//echo $_GET['fid'];
				
				echo "Shwetttttt";
				//$bname=$_GET['recommend'];
				//$becamefanon='2014-11-16 17:47:13';
				//$fid=$_GET['fid'];
				$bname=$_GET['search'];
				//$status=$_GET['status'];
				$stmt->bind_param('ss',$fid,$bname);
				
				
				$stmt->execute();
}

?>

  </table>
</body>
</html>