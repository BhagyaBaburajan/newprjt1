<?php
$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	$id="$_POST[id]";
	
	$sq="delete from cand_bas where tcand_id='$id'";
	$res=mysql_query($sq,$con);
	$sq1="delete from cand_edu where tcand_id='$id'";
	$res=mysql_query($sq1,$con);
	$sq2="delete from cand_profile where tcand_id='$id'";
	$res=mysql_query($sq2,$con);
	$sq3="delete from cand_profesion where tcand_id='$id'";
	$res=mysql_query($sq3,$con);
	$sq4="delete from login where tcand_id='$id'";
	$res=mysql_query($sq4,$con);
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    box-sizing: border-box;
}

.columns {
    float: left;
    width: 33.3%;
    padding: 8px;
}

.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
}

.price:hover {
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
    background-color: #111;
    color: white;
    font-size: 25px;
}

.price li {
    border-bottom: 1px solid #eee;
    padding: 20px;
    text-align: center;
}

.price .grey {
    background-color: #eee;
    font-size: 20px;
}

.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}

@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
</style>
</head>
<body>


<a href="admin.php">back</a>
<h2 style="text-align:center">DELETE CANDIDATES</h2>
<?php

$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	$sql="select * from cand_bas";
	$res=mysql_query($sql,$con);
	while($row=mysql_fetch_array($res))
	{
?>
<div class="columns">
  <ul class="price">
  <form action="del_view.php" method="POST">
  <input type=hidden name = id value=<?php echo "$row[tcand_id]"?> >
    <li class="header"><?php echo strtoupper("$row[tcand_user]")?></li>
    <li class="grey"><?php echo "$row[temail] "?></li>
    <li><?php echo "$row[tgender]  "?></li>
    <li><?php echo "$row[tcontact] "?></li>
    <li><?php echo "$row[ttoday] "?></li>
    
    <li class="grey"><input type="submit" value="DELETE" name="register" class="button" ></li>
  </ul>
  </form>
</div>
 <?php } ?>


</body>
</html>
