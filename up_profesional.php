<!DOCTYPE html>
<html>
<head>
<link href="C:\wamp\www\sampe\head.php">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #000000;
    color: white;
    padding: 15px 50px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #000000;
}

.container {
    border-radius: 5px;
    background-color: #5a90ac;
    padding: 20px;
}
body  {
    background-color: #000000;
    
}
</style>
</head>
<body>
<a href="seekhm.php"><font color="white">back</font><a/>
<h3><center><font color="white">UPDATE PROFESIONAL DETAILS</font></center></h3>

<div class="container">
  <form action="" method="POST">
    
	<label for="exp">Experience</label>
    <input type="text" id="exp" name="experience" placeholder="Your experience..">

	<label for="sal">Salary</label>
    <input type="text" id="sal" name="salary" placeholder="Recent Salary..">
	
	<label for="ind">Current company</label>
    <input type="text" id="ind" name="company" placeholder="Recent Company..">
	
	<label for="role">Industry role</label>
    <input type="text" id="role" name="role" placeholder="Company field..">
	
	<label for="skill">Profesional Skills</label>
    <input type="text" id="skill" name="skill" placeholder="Which platform are you worked..">
	
    <input type="submit" name="fsub" value="update">
  </form>
</div>

</body>
</html>

<?php
session_start();
if(isset($_POST['fsub']))
{
	
	$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	echo "hai";
	if($_SESSION["name"] && $_SESSION["id"]) {
	$id=$_SESSION["id"];
	}
	
	$sql="update cand_profesion set texpr='".$_POST['experience']."',tsal='".$_POST['salary']."',
		tcur_comp='".$_POST['company']."',tind_role='".$_POST['role']."',tpro_skill='".$_POST['skill']."' 
		where tcand_id='$id'";
		echo $sql;
		mysql_query($sql,$con);
}
?>