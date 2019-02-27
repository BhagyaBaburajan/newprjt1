<!DOCTYPE html>
<html>
<head>
<style>

#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 70%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #00008B;
    color: white;
}



</style>
</head>
<body >
<a href="app_can_one.php">back</a>

<?php
session_start();
$con=mysql_connect("localhost","root","");
	mysql_select_db("prjt",$con);
	
	$id=$_POST['id'];
	
	$sq="select * from cand_bas where tcand_id='$id'";
	$res=mysql_query($sq,$con);
	$sq1="select * from cand_edu where tcand_id='$id'";
	$re=mysql_query($sq1,$con);
	$sq2="select * from cand_profile where tcand_id='$id'";
	$re2=mysql_query($sq2,$con);
	$sq3="select * from  cand_profesion where tcand_id='$id'";
	$re3=mysql_query($sq3,$con);
	echo "<table id=customers>";

	while($row=mysql_fetch_array($res))
	{
			echo "<tr><td colspan=2><b><center>MY DATAS</center></b></tr>";
		echo "<tr><th>user name<td>$row[tcand_user]</td></tr><tr><th>email<td>$row[temail]</td></tr><tr><th>password<td>$row[tcand_pass]</td></tr><tr><th>gender<td>$row[tgender]</td></tr><tr><th>contact<td>$row[tcontact]</td></tr><tr><th>updated date<td>$row[ttoday]</td></tr>";
	
	}
	
	
	while($row=mysql_fetch_array($re2))
	{
		
		
		echo "<tr><td colspan=2><b><center>PERSONAL DETAILS</center></b></tr>";
		echo "<tr><th>first name<td>$row[tfname]<tr><th>last name<td>$row[tlname]<tr><th>caste<td>$row[treg_caste]<tr><th>father name<td>$row[tfather]<tr><th>mother name<td>$row[tmother]<tr><th>address<td>$row[taddress]<tr><th>state<td>$row[tstate]<tr><th>district<td>$row[tdistrict]</td></tr>";
		//echo "<tr><th>cpp<td>$row[tcpp]<tr><th>python<td>$row[tphython]<tr><th>perl<td>$row[tperl]<tr><th>java<td>$row[tjava]<tr><th>mysql<td>$row[tmysql]<tr><th>php<td>$row[tphp]<tr><th>jquery<td>$row[tjquery]<tr><th>ajax<td>$row[tajax]<tr><th>c<td>$row[tc]</td></tr>";
		//echo "<tr><th>dotnet<td>$row[tdotnet]<tr><th>c#<td>$row[tcsharp]<tr><th>javascript<td>$row[tjava_script]<tr><th>ios<td>$row[tios]<tr><th>android<td>$row[tandroid]</td></tr>";

	}
	while($row=mysql_fetch_array($re))
	{
		
		echo "<tr><td colspan=6><b><center>EDUCATIONAL DETAILS</center></b></tr>";
		//echo "<tr><th>percentage of 10<td>'$row[tper10]'</td></tr><tr><th>percentage of 12<td>'$row[tper12]'</td></tr><tr><th>graduation<td>'$row[tgrad]'</td></tr><tr><th>percentage of ug<td>'$row[tper_ug]'</td></tr><tr><th>post graduage<td>'$row[tpost_grad]'</td></tr><tr><th>percentage of pg<td>'$row[tper_pg]'<tr><th>other courses<td>'$row[tother_course]'</td></tr><tr><th>arrier<td>'$row[tarrier]'</td></tr>";
		echo "<tr><th>COURSE<th>BRANCH / SUBJECTS <th>UNIVERSITY / BOARD <th>NAME OF INSTITUTION <th>YEAR OF PASSING <th>SCORE </tr>";
		echo "<tr><td>";echo strtoupper("$row[tpost_grad]");echo " <td>$row[tbranch_pg]<td>$row[tuni_pg]<td>$row[tcg_pg]<td>$row[tyr_pg]<td>$row[tper_pg]</tr>";
		echo "<tr><td>";echo strtoupper("$row[tgrad]");echo "<td>$row[tbranch_ug]<td>$row[tuni_ug]<td>$row[tcg_ug]<td>$row[tyr_ug]<td>$row[tper_ug]</tr>";
		echo "<tr><td>Higher Secondary Education (12<sup>th<sup>) <td>$row[tbranch_pt]<td>$row[tuni_pt]<td>$row[tsc_pt]<td>$row[tyr_pt]<td>$row[tper_pt]</tr>";
		echo "<tr><td>High School Education (10<sup>th<sup>) <td>$row[tbranch_ten]<td>$row[tuni_ten]<td>$row[tscl_ten]<td>$row[tyr_ten]<td>$row[tper_ten]</tr>";
		
	}
	while($row=mysql_fetch_array($re3))
	{
		echo "<tr><th><b><u>PROFESSIONAL DETAILS</u></b></tr>";
		echo "<tr><th>experience<td>'$row[texpr]'</td></tr><tr><th>salary<td>'$row[tsal]'</td></tr><tr><th>current<td>'$row[tcur_comp]'</td></tr><tr><th>role<td>'$row[tind_role]'</td></tr><tr><th>professional skills<td>'$row[tpro_skill]'</td></tr>";
	
	}
	
?>



</body>
</html>
