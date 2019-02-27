<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.card {
  box-shadow: 0 4px 16px 0 rgba(0,0,0,0.5);
  transition: 0.7s;
  width: 40%;
  background-color: #f2f2f2;
}

.card:hover {
  box-shadow: 0 8px 8px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 36px 30px;
  
}
</style>
</head>
<body>
<a href="rec.php">back</a>

<?php
session_start();

	$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	
	if($_SESSION["name"] && $_SESSION["id"]) {
	$id=$_SESSION["id"];
	}
	
	$sq="select * from  post_job where tcom_id='$id'";
	$res=mysql_query($sq,$con);
	while($row=mysql_fetch_array($res))
	{
?>

<div class="card">
  <div class="container">
  <form action="view_appl_cand.php" method="POST">
	<div style="overflow-x:auto;"><input type=hidden name = id value=<?php echo "$row[tjobpost_id]"?> >
    <h4><b><center>Vacancy:<?php echo "$row[tvacancy] "?></center></b></h4> 
    <td><center><input type="submit" value="VIEW CANDIDATES" name="register" class="btn" ></center></td>
  </div>
</div>



	
	</div>
	</form>
	<?php } ?>
</body>
</html> 
