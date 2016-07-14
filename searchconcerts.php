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

<form action="searchconcerts.php" method="GET" align="center">
        <table align='center'>
            <tr>
                <td class='text-left'>
                    <label for="q">Search Keyword</label>
                    <input type="text" name="search" value="" align="center" />
                </td>
                <td class='text-left'>
                     <select name="list2" id="list2" align="center" >
                        <option value="cname" >cname</option>
                        <option value="bname" >band</option>
						<option value="date" >date</option>
						<option value="venue" >venue</option>
						<option value="gname" >musictype</option>
						<option value="city" >city</option>
                    </select>
                </td>
                <td class='text-left'><input type="submit" name="submit" value="submit" /></td>
            </tr>
        </table>
    </form>
	
<?php 
include("connectdb.php");
if(ISSET($_GET['submit']))
{

if($_GET['list2']=="cname")
{
$query="select cname,cdate,ctime,vname from concert where cname like'{$search}'";
$result=$mysqli->query($query);
}

if($_GET['list2']=="date")
{
$query="select cname,cdate,ctime,vname from concert where cdate='{$search}'";
$result=$mysqli->query($query);
}


if($_GET['list2']=="venue")
{
$query="select cname,cdate,ctime,vname from concert where vname='{$search}'";
$result=$mysqli->query($query);
}


if($_GET['list2']=="bname")
{
$query="select cname,cdate,ctime,vname from perform natural join concert where bname='{$search}'";
$result=$mysqli->query($query);
}

if($_GET['list2']=="gname")
{
$query="select cname,cdate,ctime,vname from concert natural join c_musictype where musictype like '{$search}'";
$result=$mysqli->query($query);
}

if($_GET['list2']=="city")
{
$query="select cname,cdate,ctime,vname from concert natural join venue where city like '{$search}'";
$result=$mysqli->query($query);
}
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1></h1></caption>";
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
}






 ?>
 
 </table>
</body>
</html>