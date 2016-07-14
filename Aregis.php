<html>
<head>
<link rel="stylesheet" href="css/login.css">
<h1>Welcome to the World of MuSiC</h1>
</head>
<body>

	<form action="Artistregis.php"  name="registration" method="GET" id="login">

		<h1>Concert Registration</h1>
		<fieldset id="inputs">
			 <input type="cname" placeholder="Concert Name" name="cname" />
			 <input type="cdate" placeholder="Concert Date" name="cdate" />
			 <input type="ctime" placeholder="Concert Time" name="ctime" />
			 <input type="vname" placeholder="Venue Name" name="vname" />
		</br><b>Ticket Venue1</b>
			 <input type="tick_vname" placeholder="Ticket Venue Name" name="tick_vname" />
			 <input type="street" placeholder="Street" name="street" />
			 <input type="city" placeholder="City" name="city" />
			 <input type="phone" placeholder="Phone Number" name="phone" />
			 <input type="website" placeholder="Website Name" name="website" />
		</br><b>Ticket Venue2</b>
			<input type="tick_vname1" placeholder="Ticket Venue Name" name="tick_vname1" />
			 <input type="street1" placeholder="Street" name="street1" />
			 <input type="city1" placeholder="City" name="city1" />
			 <input type="phone1" placeholder="Phone Number" name="phone1" />
			 <input type="website1" placeholder="Website Name" name="website1" />
			 <select name="list2[]" id="list2" multiple>
				<option value="jazz">jazz</option>
				<option value="hip-hop">hip-hop</option>
				<option value="blues">blues</option>
			</select>
		</fieldset>
		<fieldset id="actions">	
			<input type="submit" id="submit" value="Submit" />
			<input type="hidden" id="fid" name="fid" value="<?=$_GET['fid']?>"/>
			
		</fieldset>
	</form>

</body>
</html>