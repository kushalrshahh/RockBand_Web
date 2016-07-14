<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>


<body>
<table class="table-fill">

<?php 
include("Thirdpage.html");
$fid=$_SESSION['fid'];
if(ISSET($_GET["search"]))
{
$search=$_GET["search"];
}
$fid="sm91";
?>

<form action="searchfans.php" method="GET" align="center">
        <table align='center'>
            <tr>
                <td class='text-left'>
                    <label for="q">Search Keyword</label>
                    <input type="text" name="search" value="" align="center" />
                </td>
                <td class='text-left'>
                     <select name="list2" id="list2" align="center" >
                        <option value="f_fname" >fan-name</option>
						<option value="gname" >musictype</option>
						<option value="f_city" >city</option>
			                    </select>
                </td>
                <td class='text-left'><input type="submit" name="submit" value="submit" /></td>
            </tr>
        </table>
    </form>
	
<?php 

include("connectdb.php");
echo '<form action = "searchfanfollowup.php" method="GET">';
if(ISSET($_GET['submit']))
{
//$fid=$_GET["fid"];
if($_GET['list2']=="f_fname")
{
$query="select fid,f_fname,f_city,gname from fan natural join likes where f_fname like '{$search}'";
$result=$mysqli->query($query);
$count=0;

echo "<table bgcolor='#FFFFFF' align='center' border='2'>";
echo "<tr>";
     echo "<th class='text-left'>Fan Id</th>";
     echo "<th class='text-left'>Fan Name</th>";
	 echo "<th class='text-left'>Favorite Music</th>";
	 echo "<th class='text-left'>City</td>";
	 echo "<th class='text-left'>follow</td>";
	 echo "<th class='text-left'>link</td>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
//$fid=$_GET["fid"];
$fid[$count]=$row["fid"];
$f_fname[$count]=$row["f_fname"];
          $gname[$count]=$row["gname"];
          $f_city[$count]=$row["f_city"];
	echo "<tr>";
	echo "<td class='text-left'>".$row["fid"]."</td>";
     echo "<td class='text-left'>".$row["f_fname"]."</td>";
	 echo "<td class='text-left'>".$row["gname"]."</td>";
	 echo "<td class='text-left'>".$row["f_city"]."</td>";
	 echo "<td class='text-left'><input type='checkbox' name='accumulate[".$count."]' value='rm32' /></td>";
	   $link_address="fan.php?search=".$row["f_fname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
     echo "</br>";
          $count=$count+1;
	 
}
echo "</table>";
echo "<input type = 'submit' name='ogi' value = 'Follow'/>";

}
}
if(ISSET($_GET['submit']))
{
//$fid=$_GET["fid"];
if($_GET['list2']=="gname")
{
$query="select fid,f_fname,f_city,gname from fan natural join likes where gname like '{$search}'";
$result=$mysqli->query($query);
$count2=0;

echo "<table bgcolor='#FFFFFF' align='center' border='2'>";
echo "<tr>";
     echo "<th class='text-left'>Fan Id</th>";
     echo "<th class='text-left'>Fan Name</th>";
	 echo "<th class='text-left'>Favorite Music</th>";
	 echo "<th class='text-left'>City</th>";
	  echo "<th class='text-left'>follow</td>";
	 echo "<th class='text-left'>link</td>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
$fid[$count2]=$row["fid"];
$f_fname[$count2]=$row["f_fname"];
          $gname[$count2]=$row["gname"];
          $f_city[$count2]=$row["f_city"];
	echo "<tr>";
	echo "<td class='text-left'>".$row["fid"]."</td>";
     echo "<td class='text-left'>".$row["f_fname"]."</td>";
	 echo "<td class='text-left'>".$row["gname"]."</td>";
	 echo "<td class='text-left'>".$row["f_city"]."</td>";
	 echo "<td class='text-left'><input type='checkbox' name='accumulate[".$count2."]' value='rm32' /></td>";
	   $link_address="fan.php?search=".$row["f_fname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
     echo "</br>";
          $count2=$count2+1;
	 
}
echo "</table>";
echo "<input type = 'submit' name='ogi' value = 'Follow'/>";

}
}
if(ISSET($_GET['submit']))
{
//$fid=$_GET["fid"];
if($_GET['list2']=="f_city")
{
$query="select fid,f_fname,f_city,gname from fan natural join likes where f_city like '{$search}'";
$result=$mysqli->query($query);
$count1=0;

echo "<table bgcolor='#FFFFFF' align='center' border='2'>";
echo "<tr>";
     echo "<th class='text-left'>Fan Id</th>";
     echo "<th class='text-left'>Fan Name</th>";
	 echo "<th class='text-left'>Favorite Music</th>";
	 echo "<th class='text-left'>City</th>";
	  echo "<th class='text-left'>follow</td>";
	 echo "<th class='text-left'>link</td>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
$fid[$count1]=$row["fid"];
$f_fname[$count1]=$row["f_fname"];
          $gname[$count1]=$row["gname"];
          $f_city[$count1]=$row["f_city"];
	echo "<tr>";
	echo "<td class='text-left'>".$row["fid"]."</td>";
     echo "<td class='text-left'>".$row["f_fname"]."</td>";
	 echo "<td class='text-left'>".$row["gname"]."</td>";
	 echo "<td class='text-left'>".$row["f_city"]."</td>";
	 echo "<td class='text-left'><input type='checkbox' name='accumulate[".$count1."]' value='rm32' /></td>";
	  $link_address="fan.php?search=".$row["f_fname"];
	 //echo "<td class='text-left'><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
     echo "</br>";
          $count1=$count1+1;
	 
}
echo "</table>";
echo "<input type = 'submit' name='ogi' value = 'Follow'/>";

}

}
echo "</form>";
?>

</table>
</body>
</html>
