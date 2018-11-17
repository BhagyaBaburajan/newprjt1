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
<h3><center><font color="white">UPDATE PERSONAL DETAILS</font></h3>

<div class="container">
  <form action="" method="POST">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
	
	<label for="dob">date of birth</label>
    <input type="date" id="dob" name="dob" placeholder="Your date of birth.."><br><br>

    <label for="gender">gender</label>
    <input type="radio" id="gender" name="gender" value="female">female
	<input type="radio" id="gender" name="gender" value="male">male<br><br>
	
	 <label for="caste">Religion,Caste</label>
    <input type="text" id="caste" name="caste" placeholder="Religion,caste..">
	
    <label for="father">Father's name</label>
    <input type="text" id="father" name="father" placeholder="father's name..">
	
	<label for="mother">Mother's name</label>
    <input type="text" id="mother" name="mother" placeholder="mother's name..">
	
	<label for="address">Address</label>
    <textarea id="address" name="address" placeholder="Yur address.." style="height:200px"></textarea>
	
	<label for="state">State</label>
    <input type="text" id="state" name="state" placeholder="Your State..">
	
	<label for="district">District</label>
    <select name="district" placeholder="district..">
		<option  value="Malappuram">Malappuram</option> 
	  <option  value="Thiruvananthapuram">Thiruvananthapuram</option>
	  <option  value="Ernakulam">Ernakulam</option>
	  <option  value="Thrissur">Thrissur</option>
	  <option  value="Kozhikode">Kozhikode</option>
	  <option  value="Palakkad">Palakkad</option>
	  <option  value="Kollam">Kollam</option>
	  <option  value="Kannur">Kannur</option>
	  <option  value="Alappuzha">Alappuzha</option>
	  <option  value="Kottayam">Kottayam</option>
	  <option  value="Kasaragod">Kasaragod</option>
	   <option value="Pathanamthitta">Pathanamthitta</option>
	    <option value="Idukki">Idukki</option>
		 <option  value="Wayanad">Wayanad</option>
		 </select>

   
	
	 <label for="skill">Your Skills</label>
    <input type="checkbox" id="skill" name="cpp" value="cpp">C++
	<input type="checkbox" id="skill" name="python" value="python">Python
	<input type="checkbox" id="skill" name="perl" value="perl">Perl
	<input type="checkbox" id="skill" name="java" value="java">JAVA
	<input type="checkbox" id="skill" name="mysql" value="mysql">My SQL
	<input type="checkbox" id="skill" name="php" value="php">PHP
	<input type="checkbox" id="skill" name="jquery" value="jquery">J Query
	<input type="checkbox" id="skill" name="ajax" value="ajax">AJAX
	<input type="checkbox" id="skill" name="c" value="c">C
	<input type="checkbox" id="skill" name="dotnet" value="dotnet">DOT Net
	<input type="checkbox" id="skill" name="csharp" value="csharp">C#
	<input type="checkbox" id="skill" name="javascript" value="JavaScript">JavaScript
	<input type="checkbox" id="skill" name="ios" value="ios">iOS
	<input type="checkbox" id="skill" name="android" value="Android">Android
	<input type="checkbox" id="skill" name="others" value="others">Others<br><br>
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
	
	if($_SESSION["name"] && $_SESSION["id"]) {
	$id=$_SESSION["id"];
	}
	
	$sql="update cand_profile set tfname='".$_POST['firstname']."',tlname='".$_POST['lastname']."',
		tdob='".$_POST['dob']."',tgen='".$_POST['gender']."',treg_caste='".$_POST['caste']."',
		tfather='".$_POST['father']."',tmother='".$_POST['mother']."',taddress='"
		.$_POST['address']."',tstate='".$_POST['state']."',tdistrict='".$_POST['district']."',
		tcpp='".$_POST['cpp']."',tphython='".$_POST['python']."',tperl='".$_POST['perl']."',
		tjava='".$_POST['java']."',tmysql='".$_POST['mysql']."',
		tphp='".$_POST['php']."',tjquery='".$_POST['jquery']."',
		tajax='".$_POST['ajax']."',tc='".$_POST['c']."',
		tdotnet='".$_POST['dotnet']."',tcsharp='".$_POST['csharp']."',
		tjava_script='".$_POST['javascript']."',
		tios='".$_POST['ios']."',tandroid='".$_POST['android']."',tothers='".$_POST['others']."' where tcand_id='$id'";
		echo $sql;
		mysql_query($sql,$con);
}
?>
