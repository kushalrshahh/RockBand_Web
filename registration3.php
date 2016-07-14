<html>
<head>
<link rel="stylesheet" href="css/login.css">
<h1>Welcome to the World of MuSiC</h1>
</head>
<body>
 <?php  
include('connectdb.php');
$fid=$_GET['fid'];
//echo $fid;
//echo "Shwettttttttttttt";
if(isset($fid))
{
//echo "Shwettttttttttttt";
$query="select fid,f_fname,f_mname,f_lname,f_city,f_birthdate,f_email,trustscore,lastlogintime,lastlogouttime,f_street,f_zipcode,password from fan where fid='{$fid}'";
$result=$mysqli->query($query);
While($row=$result->fetch_array())
{  
	//$link_address=$row["website"];
	$fid=$row["fid"];
	$f_fname=$row["f_fname"];
	$f_mname=$row["f_mname"];
	$f_lname=$row["f_lname"];
	$f_city=$row["f_city"];
	$f_birthdate=$row["f_birthdate"];
	$f_email=$row["f_email"];
	$f_street=$row["f_street"];
	$f_zipcode=$row["f_zipcode"];
	$password=$row["password"];
	//$fid=$row["bname"];
	
	 
	 
}
} 
?>
	<form action="Registration1.php"  name="registration" method="GET" id="login">

		<h1>Register</h1>

		<fieldset id="inputs">
			 <input type="id" placeholder="id" name="id" value="<?=isset($fid)?$fid:'';?>"/>
			 <input type="password" placeholder="password" name="password" value="<?=isset($fid)?$password:'';?>"/>
			 <input type="f_fname" placeholder="firstname" name="f_fname"  value="<?=isset($fid)?$f_fname:'';?>"/>
			 <input type="f_mname" placeholder="middlename" name="f_mname" value="<?=isset($fid)?$f_mname:'';?>"/>
			<input type="f_lname" placeholder="lastname"name="f_lname" value="<?=isset($fid)?$f_lname:'';?>"/>
			 <input type="f_city" placeholder="city"name="f_city" value="<?=isset($fid)?$f_city:'';?>"/>
			 <input type="date of birth" placeholder="birthdate"name="f_birthdate" value="<?=isset($fid)?$f_birthdate:'';?>"/>
			 <input type="f_email" placeholder="email"name="f_email" value="<?=isset($fid)?$f_email:'';?>"/>
			 <input type="f_street" placeholder="street"name="f_street" value="<?=isset($fid)?$f_street:'';?>"/>
			 
			 <input type="f_zipcode" placeholder="zipcode" name="f_zipcode" value="<?=isset($fid)?$f_zipcode:'';?>"/>
			 <select name="list2[]" id="list2" multiple>
				<option value="jazz">jazz</option>
				<option value="hip-hop">hip-hop</option>
				<option value="blues">blues</option>
			</select>
		</fieldset>
		<fieldset id="actions">	
			<input type="submit" id="submit" value="Submit" />
		</fieldset>
	</form>

</body>
</html>