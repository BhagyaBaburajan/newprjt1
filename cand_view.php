<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  border: 2px solid #ccc;
  background-color: darkblue ;
  border-radius: 150px;
  padding: 16px;
  margin: 30px 0
}
body  {
    
    background-color: AliceBlue ;
	height: 800px;
	background-repeat: no-repeat; 
    background-position: center;
    background-size: cover;
}
.container::after {
  content: "";
  clear: both;
  display: table;
}


.container span {
  font-size: 30px;
  margin-right: 15px;
}

@media (max-width: 500px) {
  .container {
      text-align: center;
  }
 
}
</style>
</head>
<body>
<a href="admin.php">back</a>
<h1>POSTED JOBS ARE</h1>
<?php

$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	$sql="select * from cand_bas";
	$res=mysql_query($sql,$con);
	while($row=mysql_fetch_array($res))
	{
?>
<form action="candtab_view.php" method="POST">
<font color=white>
<div class="container"><input type=hidden name = id value=<?php echo "$row[tcand_id]"?> >
  <p><center><span><?php echo "$row[tcand_user] "?></span>
	<p><?php echo "  email  : $row[temail]  gender  : $row[tgender] contact no : $row[tcontact]  date  : $row[ttoday]  "?> </p>
	<p><input type="submit" value="VIEW DATAILS" name="register" class="btn" ></p>
	

</div>
</form>
<?php } ?>
	

</body>
</html>


