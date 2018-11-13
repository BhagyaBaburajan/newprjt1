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
    background-image: url("new6.jpg");
    background-color: #cccccc;
	height: 800px;
	background-repeat: no-repeat; 
    background-position: center;
    background-size: cover;
}
</style>
</head>
<body>
<h3><center>ADD CANDIDATE DETAILS</h3>
<a href="head.php"></a>
<div class="container">
  <form action="" method="POST">
	
	<label for="per10">percentage of 10</label>
    <input type="text" id="per10" name="per10" placeholder="percentage of 10..">

    <label for="per12">percentage of 12</label>
    <input type="text" id="per12" name="per12" placeholder="percentage of 12..">
	
	<label for="ug">graduate</label>
    <select name="ug" placeholder="graduate..">
	 <option  value="bsc">B Sc</option> 
	  <option  value="cs">CS</option>
	   <option value="bca">BCA</option>
	    <option value="btech">BTech</option>
		 <option  value="it">IT</option>
		 </select>

    <label for="perug">percentage of ug</label>
    <input type="text" id="perug" name="perug" placeholder="percentage of ug..">
	
	<label for="pg">Post graduate</label>
    <select name="pg" placeholder="post graduate..">
		<option  value="msc">M Sc</option> 
	  <option  value="cs">CS</option>
	   <option value="mca">MCA</option>
	    <option value="mtech">MTech</option>
		 <option  value="it">IT</option>
		 </select>

    <label for="perpg">percentage of pg</label>
    <input type="text" id="perpg" name="perpg" placeholder="percentage of pg+..">
	
	<label for="other">other courses </label>
    <select name="other" placeholder="other..">
	<option  value="PHd">PhD</option> 
	  <option  value="MPhill">MPhill</option>
	  <option  value="No">No</option>
		 </select>

    <label for="arriers">arriers</label>
    <input type="text" id="arriers" name="arriers" placeholder="arriers..">
	
    <input type="submit" value="Submit" name="fsub">
  </form>
</div>

</body>
</html>

<?php echo "hai"; ?>
<?php
session_start();
if(isset($_POST['fsub']))
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	if($_SESSION["name"] && $_SESSION["id"]) {
	$id=$_SESSION["id"];
	}
	$sql="insert into cand_edu values('$id','$_POST[per10]','$_POST[per12]','$_POST[ug]','$_POST[perug]',
			'$_POST[pg]','$_POST[perpg]','$_POST[other]','$_POST[arriers]')";
	mysql_query($sql,$con);
}
?>
