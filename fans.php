<!DOCTYPE html>

<html>
<body>
<div align="center">
<font color="red">  


<?php include("Thirdpage.html");

$inp="sm91";
include "connectdb.php";
echo '<form action = "follow.php" method="GET">';
$fid=array();
$gname=array();
$sub_gname=array();
$con=mysqli_connect("localhost","root","","rockband_new");
        $res ="SELECT fid,gname,sub_gname FROM likes where gname in(select gname from likes where fid='{$inp}') and fid <> '{$inp}'";
		$result = $con->query($res);
		$count=0;
      echo "<table border='1'>";
       while($row=$result->fetch_array())
        { 

          $fid[$count]=$row["fid"];
          $gname[$count]=$row["gname"];
          $sub_gname[$count]=$row["sub_gname"];

          echo "<tr>";
		  echo '<tr style="background-color:#ffffff">';
		  echo "<td>".$row['fid']."</td>";
		  echo "<td>".$row['gname']."</td>";
		  echo "<td>".$row['sub_gname']."</td>";
echo "<td><input type='hidden' name='accumulate[".$count."]' value='".$fid[$count]."' /></td>";
echo '</tr>';
echo "</tr>";
          echo "</br>";
          $count=$count+1;
        }
		echo "<input type = 'submit' name='aa' value = 'Follow'/>";
/*if ($result->num_rows > 0) {
    // output data of each row
	echo "<table border='1'>";
	
    while($row = $result->fetch_assoc()) {
	echo "<tr>";
	
	echo "<td>";
	
        echo "" . $row["fid"]. " Likes\t\t\t\t\t\t " . $row["gname"]. " " . $row["sub_gname"]. "<br>";
		echo "</td>";
		echo '<tr>'; 
		echo "</tr>";
    }
	
} else {
    echo "0 results";
}
echo "</table>";
*/
echo "</form>";
$con->close();
?>
</div>
</font>
<body>
 <html>
 