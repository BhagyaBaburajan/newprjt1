<!---sample pdf---!--->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  border: 2px solid #ccc;
  background-color: midnightblue ;
  border-radius: 150px;
  padding: 16px;
  margin: 30px 0
}
body  {
    
    background-color: black;
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
<center><h1>AthiraRaj</h1></center>


<a href="admin.php"><font color=white>back</a>
<h1><font color=white>RECRUITERS ARE</h1>
<?php
$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	$sq="select * from  company";
	$res=mysql_query($sq,$con);
	while($row=mysql_fetch_array($res))
	{
?>
<form action="update_rec.php" method="POST">
<div class="container"><input type=hidden name = id value=<?php echo "$row[tcom_id]"?> >

  <p><center><span><?php echo "$row[tcom_name]"?></span><p>company contact : <?php echo "$row[tcom_cont],    company email :$row[tcom_email]"?> </p><p> <?php echo "  company details :$row[tcom_details]"?> </p>
	<p>company status  : <?php echo "  $row[tcomp_status]  "?> </p>
	<p><input type="submit" value="SUBMIT" name="register" class="btn" ></p>
</div>
</form>
	<?php }?>



</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

<script>
         let doc = new jsPDF('p', 'pt', 'a4'); 
         doc.addHTML(document.body, function () {
             doc.save('result.pdf');
         });

    </script>
</html>
<!--count--->

<!-------------->