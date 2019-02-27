<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
  background-color:black;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #5a90ac;
  padding: 5px 20px 15px 20px;
  border: 7px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 150%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 30px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #000000;
  color: white;
  padding: 10px;
  margin: 10px 500px;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}


a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
.error {color: #FF0000;}
</style>

</head>
<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $cnErr = "";
$usrnm = $email = $cn = "";
$flag=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usrnm"])) {
    $nameErr = "UserName is required";
  } else {
    $usrnm = test_input($_POST["usrnm"]);
	$flag=1;
    // check if usrnm only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$usrnm)) {
      $nameErr = "Only letters and white space allowed"; 
	  $flag=0;
    }
  }
  
  if (empty($_POST["ucontact"])) {
    $cnErr = "contact is required";
  } else {
    $cn = test_input($_POST["ucontact"]);
	$flag=1;
    // check if usrnm only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$cn)) {
      $cnErr = "Only numbers are allowed"; 
	  $flag=0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
	$flag=1;
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
	  $flag=0;
    }
  }
   
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<a href="maintemp.php">back</a>
<h2><center><font color="blue">Recruiter Form</font></center></h2>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style="max-width:1000px;margin:left" >
      
        <div class="row">
          <div class="col-50">
            <h3>Recruiter Address</h3>
            <label for="fname"><i class="fa fa-user"></i>Name</label>
            <input type="text" id="fname" name="usrnm" placeholder="Recruiter name...">
			 <span class="error">* <?php echo $nameErr;?></span>
			
			<label for="person"><i class="fa fa-envelope"></i> password</label>
            <input type="text" id="row" name="psw" placeholder="password  of the person..." >
			
			<label for="contact"><i class="fa fa-phone"></i> Company contact</label>
            <input type="text" id="contact" name="ucontact" placeholder="Contact number...">
			 <span class="error">* <?php echo $cnErr;?></span>
			
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
				 <span class="error">* <?php echo $emailErr;?></span>
			
            <label for="adr"><i class="fa fa-address-card-o"></i> details</label>
            <input type="text" id="adr" name="detail" placeholder="address">
			
			
          </div>
		
        <input type="submit" value="SUBMIT" name="register" class="btn" >
      </form>
    </div>
  </div>
  
</body>
</html>

<?php

if(isset($_POST["register"]))
{
	$per="recruiter";
	$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	
	if($flag==1)
	{
	
		$sql="insert into company values(DEFAULT,'$_POST[usrnm]','$_POST[psw]','$_POST[ucontact]','$_POST[email]','$_POST[detail]',0)";
		mysql_query($sql,$con);
		$sq3="select max(tcom_id) as mid from company";
		$res=mysql_query($sq3,$con);
		while($row=mysql_fetch_array($res))
		{
	
			echo "id is" .$row['mid'];
			$sql1="insert into login values('$_POST[usrnm]','$_POST[psw]','$per','$row[mid]',0)";
			mysql_query($sql1,$con);	
	
		}
	}
}
?>