<?php

include("StartPage.html");
$fid=$_GET['fid'];
include 'connectdb.php';

$stmt31 = $mysqli->prepare("UPDATE fan SET lastlogouttime=now() where fid=?");
$stmt31->bind_param('s',$fid);
$stmt31->execute();
session_start();
session_destroy();

?>