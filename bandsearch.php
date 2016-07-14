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
<form action="bandsearch.php" method="GET" align="center">
        <table align='center'>
            <tr>
                <td class='text-left'>
                    <label for="q" color="white">Search Band</label>
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
$query="select bname,b_startdate from band where bname like'{$search}'";
$result=$mysqli->query($query);

echo "</br></br>";
echo "<table bgcolor='#FFFFFF' align='center' border='2'>";
echo "<tr>";
     echo "<th class='text-left'>Band Name</th>";
	 echo "<th class='text-left'>Band StartDate</th>";
	 echo "<th class='text-left'>Details</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";
     echo "<td class='text-left'>".$row["bname"]."</td>";
	 echo "<td class='text-left'>".$row["b_startdate"]."</td>";
	 $link_address="band.php?search=".$row["bname"];
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