<html>

<head>
<link rel="stylesheet" type="text/css" href="table.css">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Live Demo of Google Maps Geocoding Example with PHP</title>
     
    <style>
    body{
        font-family:arial;
        font-size:.8em;
    }
     
    input[type=text]{
        padding:0.5em;
        width:20em;
    }
     
    input[type=submit]{
        padding:0.4em;
    }
     
    #gmap_canvas{
        width:100%;
        height:30em;
    }
     
    #map-label,
    #address-examples{
        margin:1em 0;
    }
    </style>
</head>



<body>

<table class="table-fill">

<?php
include("Thirdpage.html");
include("connectdb.php");

$fid=$_SESSION['fid'];
$cname=$_GET['search'];

echo "<font color='white' size='5' text-align='center'>   CONCERT INFO </font>";
$query="select bname,cname,cdate,ctime,vname from concert natural join perform where cname='{$cname}'";
$result=$mysqli->query($query);
echo "<table align='center'>";

echo "<tr>";
	echo "<th class='text-left'>Band Name</th>";
     echo "<th class='text-left'>Concert Name</th>";
	 echo "<th class='text-left'>Concert Date</th>";
	 echo "<th class='text-left'>Concert Time</th>";
	 echo "<th class='text-left'>Venue</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
$vnamee=$row["vname"];
	echo "<tr>";
		echo "<td class='text-left'>".$row["bname"]."</td>";
     echo "<td class='text-left'>".$row["cname"]."</td>";
	 echo "<td class='text-left'>".$row["cdate"]."</td>";
	 echo "<td class='text-left'>".$row["ctime"]."</td>";
	 echo "<td class='text-left'>".$row["vname"]."</td>";
     echo "</tr>";
	 
}
echo "</table></br></br></br>";

echo "<font color='white' size='5' text-align='center'>   VENUE INFO </font>";
$query="select vname,vtype,street,city,zipcode,website,info,phoneno from concert natural join venue where cname='{$cname}'";
$result=$mysqli->query($query);

echo "<table align='center'>";


echo "<tr>";
	echo "<th class='text-left'>venue</th>";
     echo "<th class='text-left'>type</th>";
	 echo "<th class='text-left'>street</th>";
	 echo "<th class='text-left'>city</th>";
	 echo "<th class='text-left'>zipcode</th>";
	 echo "<th class='text-left'>website</th>";
	 echo "<th class='text-left'>info</th>";
	 echo "<th class='text-left'>phoneno</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	$link_address=$row["website"];
	echo "<tr>";
     echo "<td class='text-left'><b><u>".$row["vname"]."</u></b></td>";
	 echo "<td class='text-left'>".$row["vtype"]."</td>";
	 echo "<td class='text-left'>".$row["street"]."</td>";
	 echo "<td class='text-left'>".$row["city"]."</td>";
	 echo "<td class='text-left'>".$row["zipcode"]."</td>";
	 echo "<td class='text-left'><a href='http:".$link_address."'>website</a></td>";
	 echo "<td class='text-left'>".$row["info"]."</td>";
	 echo "<td class='text-left'>".$row["phoneno"]."</td>";
     echo "</tr>";
	 
}
echo "</table>";

//echo "<font color='white' size='5' text-align='center'>   TICKET WINDOWS </font>";
$query="select tick_vname,street,city,phone,website from concert natural join ticket natural join ticket_venue where cname='{$cname}'";
$result=$mysqli->query($query);
echo "<table align='center'>";
echo "<font color='white' size='5' text-align='center'>   TICKET WINDOWS </font>";
echo "<tr>";
	echo "<th class='text-left'>ticket venue</th>";
     echo "<th class='text-left'>street</th>";
	 echo "<th class='text-left'>city</th>";
	 echo "<th class='text-left'>phone</th>";
	 echo "<th class='text-left'>website</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	$link_address=$row["website"];
	echo "<tr>";
     echo "<td class='text-left'><b><u>".$row["tick_vname"]."</u></b></td>";
	 echo "<td class='text-left'>".$row["street"]."</td>";
	 echo "<td class='text-left'>".$row["city"]."</td>";
	 echo "<td class='text-left'>".$row["phone"]."</td>";
	  $link_address=$row["website"];
	 echo "<td class='text-left'><a href='http:".$link_address."'>website</a></td></tr>";
     //echo "</tr>";
	 
}
echo "</table>";
$query21="select fid,status,rating,recommend,review from attend where cname='{$cname}'";
$result=$mysqli->query($query21);
echo "<table align='center'>";
echo "<font color='white' size='5' text-align='center'>   Reviews By Other users </font>";
echo "<tr>";
	echo "<th class='text-left'>userid</th>";
     echo "<th class='text-left'>rating</th>";
	 echo "<th class='text-left'>status</th>";
	 echo "<th class='text-left'>recommend</th>";
	 echo "<th class='text-left'>review</th>";
     echo "</tr>";
While($row=$result->fetch_array())
{  
	
	echo "<tr>";
     echo "<td class='text-left'><b><u>".$row["fid"]."</u></b></td>";
	 echo "<td class='text-left'>".$row["rating"]."</td>";
	 echo "<td class='text-left'>".$row["status"]."</td>";
	 echo "<td class='text-left'>".$row["recommend"]."</td>";
	 echo "<td class='text-left'>".$row["review"]."</td>";
     //echo "</tr>";
	 
}
echo "</table>";
$query22="select vname from concert natural join venue where cname='{$cname}'";
$result=$mysqli->query($query22);
While($row=$result->fetch_array())
{
$final=$row["vname"];
}
echo "<font color='white' size='5' text-align='center'>   FEEDBACK</font>";
?>
<form action="" method="GET" align="center">
        <table align="center">
		<tr>
                <td class='text-left'>
                    <font color='white' size='3' text-align='center'>Attend Status</font>
                    <input type="text" name="status" value="" align="center" />
                </td>
                
            </tr>
            <tr>
                <td class='text-left'>
                    <font color='white' size='3' text-align='center'>Rating(1-5)</font>
                    <input type="text" name="rating" value="" align="center" />
                </td>
                
            </tr>
			<tr>
                <td class='text-left'>
                    <font color='white' size='3' text-align='center'>Review</font>
                    <input type="text" name="review" value="" align="center" />
                </td>
                
            </tr>
			<tr>
                <td class='text-left'>
                    <font color='white' size='3' text-align='center'>Recommend</font>
                    <input type="text" name="recommend" value="" align="center" />
                </td>
                
            </tr>
			<tr>
			<td class='text-left'><input type="submit" name="submit" value="submit" />
			<input type="hidden" name="search" value="<?=$cname?>" /></td>
			</tr>
        </table>
    </form>
	
	
	<form action="" method="GET" align="center">
        <table align="center">
			<tr>
                <td class='text-left'>
                    <font color='white' size='3' text-align='center'>Rsvp</font>
                    <select name="list1" id="list1">
				<option value="yes">yes</option>
				<option value="maybe">maybe</option>
				<option value="no">no</option>
			</select>
                </td>
                
            </tr>
			<tr>
			<td class='text-left'><input type="submit" name="rsvp" value="rsvp" />
			<input type="hidden" name="search" value="<?=$cname?>" /></td>
			</tr>
        </table>
    </form>
	
echo "<font color='white' size='5' text-align='center'>   VENUE LOCATION</font>";

<?php

    // get latitude, longitude and formatted address
    $data_arr = geocode($final);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
                     
    ?>
 
    <!-- google map will be shown here -->
    <div id="gmap_canvas">Loading map...</div>
    <div id='map-label'>Map shows approximate location.</div>
 
    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>    
    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }

?>
 
<div id='address-examples'>
    <div>Address examples:</div>
    <div>1. G/F Makati Cinema Square, Pasong Tamo, Makati City</div>
    <div>2. 80 E.Rodriguez Jr. Ave. Libis Quezon City</div>
</div>
 
<!-- enter any address -->
<form action="" method="post">
    <input type='text' name='address' placeholder='Enter any address here' />
    <input type='submit' value='Geocode!' />
</form>
 
<?php
 
// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}
?>
<?php
include("connectdb.php");


if(ISSET($_GET['submit']))
{
$query22="SELECT trustscore FROM fan where fid='{$fid}'";
		$result=$mysqli->query($query22);
		$count=0;
		While($row=$result->fetch_array())
		{
		$trustscore=$row['trustscore'];
		}
if($trustscore>7)
{
	$stmt = $mysqli->prepare("INSERT INTO attend VALUES(?,?,?,?,?,?)");
				$fid=$_SESSION['fid'];
				$cname=$_GET['search'];
				$rating=$_GET['rating'];
				$review=$_GET['review'];
				$recommend=$_GET['recommend'];
				$status=$_GET['status'];
				$stmt->bind_param('sssiss',$cname,$fid,$status,$rating,$recommend,$review);
				
				
				$stmt->execute();
				
				$trustscore=$trustscore +1;
	$stmt99 = $mysqli->prepare("UPDATE fan set trustscore=? where fid=?");
				$fid=$_SESSION['fid'];
				$stmt99->bind_param('is',$trustscore,$fid);
				$stmt99->execute();
				
	
				}
				}


?>


 </table>
</body>
</html>