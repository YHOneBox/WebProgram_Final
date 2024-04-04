<?php
session_start();  
$username=$_SESSION["username"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="zh-tw" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>

<body style="background-color: lightblue">
<?php
              require('navbar.php');
              ?>
<div class="text-center">
           
</div>
<div class="text-center">
            <h2 class="animate__animated animate__lightSpeedInRight">這邊顯示的是所有資料</h2>
			<h3 class="font-weight-bold"><管理模式></h3>
</div>
<div class="container text-sm-center bg-white rounded shadow p-3 mb-5">

<p>Show</p>
<p>&nbsp;</p>

<?php
//抓取資料庫
require('conn_db.php');
$sql=$pdo->prepare('select * from heart');
if ($sql->execute()) {
	echo 'Query Success ! ' . '<br>'; }
else {
	echo 'Query Failed !'  . '<br>';
}

?>
<table class="table-bordered table-sm shadow p-3 mb-5 bg-light rounded" width="1000" border="1">
	<tr>
		<td>id</td>
		<td>Sex</td>
		<td>Age</td>
		<td>Diastolic</td>
		<td>Systolic</td>
		<td>Anti-Hypertensives</td>
		<td>Smoker</td>
		<td>Diabetes</td>
		<td>HDL</td>
		<td>TDL</td>
		<td>Score</td>
		<td>Risk</td>
		<td>userID</td>
	</tr>
	<?php foreach ($sql->fetchAll() as $row) {   
	      echo '<tr>';
	      echo '<td>' . $row['id'] . '</td>';
	      echo '<td>' . $row['sex'] . '</td>';
		  echo '<td>' . $row['age'] . '</td>';
  		  echo '<td>' . $row['diastolic'] . '</td>';  
	      echo '<td>' . $row['systolic'] . '</td>';  
	      echo '<td>' . $row['anti-hypertensive'] . '</td>';  
	      echo '<td>' . $row['smoker'] . '</td>';
		  echo '<td>' . $row['diabetes'] . '</td>';
	      echo '<td>' . $row['tdl'] . '</td>';
		  echo '<td>' . $row['hdl'] . '</td>';
		  echo '<td>' . $row['score'] . '</td>';
		  echo '<td>' . $row['risk'] . '</td>';
		  echo '<td>' . $row['userID'] . '</td>';
	      
          echo '<td>' . '<a href="editManage.php?id='. $row['id'] . '"> [ EDIT ] ' . '</a></td>';
          echo '<td>' . '<a href="delManage.php?id=' . $row['id'] . '"> [ DEL  ] ' . '</a></td>';
		  echo '</tr>';
	  }
	?> 
</table>
<p>&nbsp;</p>
<p>Total :  <?php echo $sql->rowCount(); ?> Records.</p>
<hr>

</div>

<div class="text-sm-center">
    <hr />

</div>
</body>