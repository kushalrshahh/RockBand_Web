<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>



<body>
<table class="table-fill">

<?php include("Thirdpage.html");
$fid=$_SESSION['fid'];

?>
<form action="SearchArtist.php" method="GET" align="center">
        <table align='center'>
            <tr>
                <td class='text-left'>
                    <label for="q" color="white">Search Artist</label>
                    <input type="text" name="search" value="" align="center" />
                </td>
                <td class='text-left'><input type="submit" name="submit" value="submit" /></td>
            </tr>
        </table>
    </form>
	
<?php 
include("connectdb.php");
if(ISSET($_GET['submit']))
{
$query="select pname,p_fname,biography,p_city,bname from performer where pname like'{$search}'";
$result=$mysqli->query($query);


echo "<table bgcolor='#FFFFFF' align='center' border='2'>";
echo "<tr>";
     echo "<th class='text-left'>performer Name</th>";
	 echo "<th class='text-left'>first name</th>";
	 echo "<th class='text-left'>biography</th>";
	 echo "<th class='text-left'>city</th>";
	 echo "<th class='text-left'>band</th>";
	 echo "<th class='text-left'>Details</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";
     echo "<td class='text-left'>".$row["pname"]."</td>";
	 echo "<td class='text-left'>".$row["p_fname"]."</td>";
	 echo "<td class='text-left'>".$row["biography"]."</td>";
	 echo "<td class='text-left'>".$row["p_city"]."</td>";
	 echo "<td class='text-left'>".$row["bname"]."</td>";
	 $link_address="performer.php?search=".$row["pname"];
	 //echo "<td class='text-left'><a href='band.php/?search='".$row["bname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table>";
}
?>

  </table>
</body>
</html>