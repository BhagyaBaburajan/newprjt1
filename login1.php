<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body  {
    background-image: url("hb2.jpg");
    background-color: #cccccc;
	height: 800px;
	background-repeat: no-repeat; 
    background-position: center;
    background-size: cover;
}

</style>
<body>
<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
	
	
      <div class="w3-center"><br>
	 
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        <img src="errr.jpg" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="" method="POST">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="usrname" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="text" placeholder="Enter Password" name="psw" required>
          
          <input class="w3-check w3-margin-top" type="radio" checked="checked" name="user" value="admin" > Admin
		  <input class="w3-check w3-margin-top" type="radio" name="user" value="recruiter"> Recruiter
		  <input class="w3-check w3-margin-top" type="radio" name="user" value="seeker"> seeker
		  <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit" name="login">Login</button>
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <a href="maintemp.php">back
        
      </div>

    </div>
	</body>
</html>

<?php 
session_start();
if(isset($_POST["login"]))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	$sql="select * from login where username='$_POST[usrname]'";
	$res=mysql_query($sql,$con);
	if($row=mysql_fetch_array($res))
	{
		if($_POST['usrname']==$row['username']&&$_POST['psw']==$row['password']&&$_POST['user']==$row['role'])
		{
			$_SESSION["name"]=$row['username'];
			$_SESSION["id"]=$row['tcand_id'];
			if($row['role']=="admin")
			{
				if(isset($_SESSION["name"])) {
					header("location:admin.php");
				}
			}
			else if($row['role']=="seeker")
			{
				if(isset($_SESSION["name"])) {
					header("location:seekhm.php");
				}
			}
			else if($row['role']=="recruiter")
			{
				if(isset($_SESSION["name"])) {
					header("location:rec.php");
				}
			}
		}
	}

	else
	{
		$_SESSION["login"]=$row['username'];
	}
}
if (isset($_SESSION["login"]))
	{
	echo "<h1 align=center>Hye you are sucessfully login!!!</h1>";
	exit;
	}
	
if(isset($_POST["back"]))
{
	header("location:maintemp.php");
}

?>