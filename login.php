<html>
<head>
<head>
<link rel="stylesheet" type="text/css" href="table.css">
</head>


</head>
<body>
<table class="table-fill">
<?php
include 'connectdb.php';
	// user is not logged in.
    if (!isset($_POST['submit']))
    {

        // retrieve the id and password sent from login form
        // First we remove all HTML-tags and PHP-tags, then we create a md5-hash
        // This step will make sure the script is not vurnable to sql injections.
        $u = $_GET['fid'];
        $p = $_GET['password'];
		
		echo $_GET['fid'];
        //Now let us look for the user in the database.
		$query="SELECT * FROM fan where fid='{$u}'  AND password='{$p}'";
		$result=$mysqli->query($query);
		$count=0;
		While($row=$result->fetch_array())
		{
		$count=$count+1;
		}
		$query1="SELECT type FROM user_type where fid='{$u}'";
		$result=$mysqli->query($query1);
		
		While($row=$result->fetch_array())
		{
		$type=$row["type"];
		echo $type;
		}
        //$query = sprintf("SELECT * FROM fan WHERE fid = %s AND password = %s ;",$u,$p);
        //$result = mysql_query($query);
        // If the database returns a 0 as result we know the login information is incorrect.
        // If the database returns a 1 as result we know  the login was correct and we proceed.
        // If the database returns a result > 1 there are multple users
        // with the same id and password, so the login will fail.
		//$prodcount=mysql_num_rows($result);
        if ( $count ==0)
        {
            // invalid login information
            echo "Wrong id or password!";
            //show the loginform again.
            include "StartPage.html";
        } else {
            // Login was successfull
			
            $row = $result->fetch_array();
            // Save the user ID for use later
			session_start();
            $_SESSION['fid'] = $_GET['fid'];
			$_SESSION['type'] = $type;
			
			include "ThirdPage.html";
			
			//echo $_SESSION['fid'];
$fid=$_SESSION['fid'];
$cname=array();
$cdate=array();
$ctime=array();
$vname=array();
$count=0;
include 'connectdb.php';




$stmt31 = $mysqli->prepare("UPDATE fan SET lastlogintime=now() where fid=?");
$stmt31->bind_param('s',$fid);
$stmt31->execute();

//echo "<font color='white' size='5' text-align='center'>   UPCOMING CONCERTS</font>";
$query="select cname,cdate,ctime,vname from concert where cname in(select distinct(cname) from concert natural join c_musictype where musictype in(select gname from likes where fid='{$fid}')) AND datediff(cdate,curdate())< 7 AND datediff(cdate,curdate())>0";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>Upcoming Concerts </h1></caption>";
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
	 //echo "<td><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table>";


//echo "<font color='white' size='5' text-align='center'>   concert on basis of users favourite music types</font>";
$query="select cname,cdate,ctime,vname from concert where cname in (Select distinct(cname) from c_musictype join likes ON c_musictype.musictype=likes.gname where fid='{$fid}')";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<caption style='color:#FFFFFF'><h1>User's Favorite Music Type Concerts</h1></caption>";
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
	 //echo "<td><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table></br></br></br>";


//echo "<font color='white' size='5' text-align='center'>   concerts in the categories the user likes that were recommended in many lists by other users</font>";
$query="select cname,cdate,ctime,vname from concert where cname in (Select distinct(cname) from attend  where cname in(Select cname from likes join c_musictype on likes.gname=c_musictype.musictype where likes.fid='{$fid}')and recommend='yes' group by cname having(count(fid))>2)";
$result=$mysqli->query($query);
echo "<table align='center' border='2'>";
echo "<caption style='color:#FFFFFF'><h1>Recommended Concerts by other Users </h1></caption>";
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
	 //echo "<td><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table>";

$query21="select fid,cname,rating,review,recommend from attend where recommend='yes' and fid in(select fid from follows where uid='{$fid}') ";
$result=$mysqli->query($query21);
echo "<table align='center' border='2'>";
echo "<caption style='color:#FFFFFF'><h1>Recommended list of followed users </h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>Concert Name</th>";
	 echo "<th class='text-left'>rating</th>";
	 echo "<th class='text-left'>review</th>";
	 echo "<th class='text-left'>recommend</th>";
	 echo "<th class='text-left'>Details</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<tr>";  
     echo "<td class='text-left'>".$row["cname"]."</td>";
	 echo "<td class='text-left'>".$row["rating"]."</td>";
	 echo "<td class='text-left'>".$row["review"]."</td>";
	 echo "<td class='text-left'>".$row["recommend"]."</td>";
	 $link_address="concert.php?search=".$row["cname"];
	 //echo "<td><a href='concert.php/?search='".$row["cname"].">details</a></td>";
	 echo "<td class='text-left'><a href='".$link_address."'>Link</a></td>";
     echo "</tr>";
	 
}
echo "</table>";

$query77="select fid,f_fname from fan where fid='{$fid}'";
$result=$mysqli->query($query77);
While($row=$result->fetch_array())
{  
	$test=$row['f_fname'];
	 
}

$query78="select fid,f_fname,comment from comments where f_fname='{$test}'";
$result=$mysqli->query($query78);
echo "<table align='center' border='2'>";
echo "<caption style='color:#FFFFFF'><h1>comments </h1></caption>";
echo "<tr>";
     echo "<th class='text-left'>fid</th>";
	 echo "<th class='text-left'>f_fname</th>";
	 echo "<th class='text-left'>comment</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	echo "<td class='text-left'>".$row["fid"]."</td>";
	 echo "<td class='text-left'>".$row["f_fname"]."</td>";
	 echo "<td class='text-left'>".$row["comment"]."</td>";
}


echo "</table>";




     
       
	

     



// Associative array
              // Save the id for use later
            //$_SESSION['id'] = $u;
              // Now we show the userbox
            //show_userbox();
			
        }
    } else {
    	 // User is not logged in and has not pressed the login button
    	 // so we show him the loginform
			include "StartPage.html";
			}
 

?>
</table>
</body>
</html>