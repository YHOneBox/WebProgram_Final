<?php
session_start();  
$username=$_SESSION["username"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>資料更新</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: lightblue">
<?php
              require('navbar.php');
              ?>
<div class="text-center">
            
</div>
<div class="text-center">
            <h2 class="font-weight-bold">Framingham心血管疾病結果</h2>
</div>
<div class="container text-sm-center bg-white rounded shadow p-3 mb-5">
<?php

function age_gender($age, $sex) {
	$age_score = 0;
	$age_m_score = [-1,0,1,2,3,4,5,6,7];
	$age_w_score = [-9,-4,0,3,6,7,8,8,8];
	
	
	if ($age <=34) 					{ $age_index = 0; }
	if ($age >=35 && $age <=39) 	{ $age_index = 1; }
	if ($age >=40 && $age <=44) 	{ $age_index = 2; }
	if ($age >=45 && $age <=49) 	{ $age_index = 3; }
	if ($age >=50 && $age <=54) 	{ $age_index = 4; }
	if ($age >=55 && $age <=59) 	{ $age_index = 5; }
	if ($age >=60 && $age <=64) 	{ $age_index = 6; }
	if ($age >=65 && $age <=69) 	{ $age_index = 7; }	
	if ($age >=70) 					{ $age_index = 8; }

	if ($sex == 1 ) { return $age_m_score[$age_index]; }
	else { return $age_w_score[$age_index]; }
}
	
function blood_score($blood1, $blood2, $sex) {
      //男生分數
     
      $mblood_score1 = array(0,0,1,2,3);
      $mblood_score2 = array(0,0,1,2,3);
      $mblood_score3 = array(1,1,1,2,3);
      $mblood_score4 = array(2,2,2,2,3);
      $mblood_score5 = array(3,3,3,3,3);
      $mblood_score = array($mblood_score1, $mblood_score2,$mblood_score3,$mblood_score4,$mblood_score5);
      
      //女生分數
      $wblood_score1 = array(-3, 0, 0, 2, 3);
      $wblood_score2 = array(0,0,0,2,3);
      $wblood_score3 = array(0,0,0,2,3);
      $wblood_score4 = array(2,2,2,2,3);
      $wblood_score5 = array(3,3,3,3,3);
      $wblood_score = array($wblood_score1, $wblood_score2,$wblood_score3,$wblood_score4,$wblood_score5);
      
      if ($blood1 < 80) 				{ $blood_col_index = 0;}
      if ($blood1 >=80 && $blood1 <=84) { $blood_col_index = 1;}
      if ($blood1 >=85 && $blood1 <=89) { $blood_col_index = 2;}
      if ($blood1 >=90 && $blood1 <=99) { $blood_col_index = 3;}
      if ($blood1 >=100) 				{ $blood_col_index = 4;}
      
      if ($blood2 < 120) 					{ $blood_row_index = 0;}
      if ($blood2 >=120 && $blood2 <=129) 	{ $blood_row_index = 1;}
      if ($blood2 >=130 && $blood2 <=139) 	{ $blood_row_index = 2;}
      if ($blood2 >=140 && $blood1 <=159) 	{ $blood_row_index = 3;}
      if ($blood1 >=160) 					{ $blood_row_index = 4;}
	
	  if ($sex == 1) {  return $mblood_score[$blood_row_index][$blood_col_index];  }
	  else { return $wblood_score[$blood_row_index][$blood_col_index];  }
}

// HDL
function hdl_score($hdl, $sex) {
	$hdl_score = 0;
	$hdl_m_score = [2,1,0,0,-2];
	$hdl_w_score = [5,2,1,0,3];
		
	if ($hdl <35) 					{ $hdl_index = 0; }
	if ($hdl >=35 && $hdl <=44) 	{ $hdl_index = 1; }
	if ($hdl >=45 && $hdl <=49) 	{ $hdl_index = 2; }
	if ($hdl >=50 && $hdl <=59) 	{ $hdl_index = 3; }
	if ($hdl >=60) 					{ $hdl_index = 4; }
	
	if ($sex == 1 ) { return $hdl_m_score[$hdl_index]; }
	else { return $hdl_w_score[$hdl_index]; }
}

// TDL
function tdl_score($tdl, $sex) {
	$tdl_score = 0;
	$tdl_m_score = [-3, 0, 1, 2, 3];
	$tdl_w_score = [-2, 0, 1, 1, 3];
		
	if ($tdl <160) 					{ $tdl_index = 0; }
	if ($tdl >=160 && $tdl <=199) 	{ $tdl_index = 1; }
	if ($tdl >=200 && $tdl <=239) 	{ $tdl_index = 2; }
	if ($tdl >=240 && $tdl <=279) 	{ $tdl_index = 3; }
	if ($tdl >=280) 				{ $tdl_index = 4; }
	
	if ($sex == 1 ) { return $tdl_m_score[$tdl_index]; }
	else { return $tdl_w_score[$tdl_index]; }
}

// Diabetes
function diabetes_score($diabetes, $sex) {
	$diabetes_score = 0;
	$diabetes_m_score = [0, 2];
	$diabetes_w_score = [0, 4];
			
	if ($diabetes == 1 ) { $diabetes_index = 1; } 
	else { $diabetes_index = 0; }
	
	if ($sex == 1) { return $diabetes_m_score[$diabetes_index]; }
	else { return $diabetes_w_score[$diabetes_index]; } 
}

// Smoke
function smoke_score($smoke, $sex) {
	if ($smoke == 1) { return 2; }
	else { return 0; }
}

// Total Risk
function risk_score($total_score, $sex) {
    $risk_index  = $total_score;
	$risk_m_score = [3, 3, 4, 5, 7, 8, 10, 13, 16, 20, 25, 31, 37, 45];
	$risk_w_score = [2, 2, 2, 3, 3, 4, 4, 5, 6, 4, 8, 10, 11, 13, 15, 18, 20,24, 27];

 	if ($total_score <=0) { $risk_index = 0; }
    if ($sex == 1 && $total_score > 13) { $risk_index = 13; }
    if ($sex == 2 && $total_score > 16) {  $risk_index = 18; }
   
	if ($sex == 1) { return $risk_m_score[$risk_index]; }
	else { return $risk_w_score[$risk_index]; }
}


$sex = $_REQUEST['SexGroup'];
$age = $_REQUEST['age'];
$blood_pressure1 = $_REQUEST['blood_pressure1'];
$blood_pressure2 = $_REQUEST['blood_pressure2'];
$hdl = $_REQUEST['hdl'];
$tdl = $_REQUEST['tdl'];


echo '你的性別 : ' . $sex . '<br>';

switch ($sex) {
	case('1'):
		$gender = 'Male';
		break;
	case('2'):
		$gender = 'Female';
		break;
	}
echo 'Your gender is ' . $gender . '<br>';

echo '你的年齡 : ' . $age . '<br>';




if (isset($_REQUEST['high_blood'])) {
	echo '有使用高血壓藥物! ' . '<br>';
	$high_blood = 1; }
else {
	echo '無使用高血壓藥物! ' . '<br>';
	$high_blood = 0; }

if (isset($_REQUEST['smoke'])) {
	echo '有抽菸! ' . '<br>';
	$smoke = 1; }
else {
	echo '無抽菸! ' . '<br>';
	$smoke = 0; }

if (isset($_REQUEST['diabetes'])) {
	echo '有糖尿病! ' . '<br>';
	$diabetes = 1; }
else {
	echo '無糖尿病! ' . '<br>';
	$diabetes = 0; }



echo '舒張壓 : '  .  $blood_pressure1  . '<br>';
echo '收縮壓 : ' . $blood_pressure2 . '<br>';

echo 'HDL :  ' . $hdl . '<br>';
echo 'TDL :  ' . $tdl . '<br>';


?>

<?php
// 主程式
$age_score 		= age_gender($age, $sex);
$blood_score 	= blood_score((int)$blood_pressure1, (int)$blood_pressure2, (int)$sex);
$hdl_score 		= hdl_score($hdl, $sex);
$tdl_score 		= tdl_score($tdl, $sex);
$diabetes_score = diabetes_score($diabetes, $sex);
$smoke_score 	= smoke_score($smoke, $sex);
$total_score 	= $age_score + $blood_score + $hdl_score + $tdl_score + $diabetes_score + $smoke_score;
$total_risk 	= risk_score($total_score, $sex);


echo 'age score : ' . 	$age_score . '<br>';
echo 'blood score : ' . $blood_score . '<br>';
echo 'hdl score : ' . 	$hdl_score . '<br>';
echo 'tdl score : ' . 	$tdl_score . '<br>';
echo 'Diabetes score : ' . $diabetes_score . '<br>';
echo 'Smoke score : ' . $smoke_score . '<br>';
echo 'Toal score : ' . 	$total_score . '<br>';
echo 'Total risk : ' . 	$total_risk . '<br>';

// 寫入資料庫
require('conn_db.php');
$sql = $pdo->prepare('Select * from heart');
if($sql->execute())
    echo 'Select Success!' . '<br>';


// 更新資料
// 取得id
$id = $_REQUEST['id'];

$sql = $pdo->prepare('update heart set  sex=?, age=?, diastolic=?, systolic=?, 
anti-hypertensive=?, smoker=?, diabetes=?, tdl=?, hdl=?, score=?, risk=? where id=?');
if ($sql->execute([ $gender, $age, $blood_pressure1, $blood_pressure2, $high_blood, $smoke_score, $diabetes_score, $tdl, $hdl,   $total_score, $total_risk, $id])) 
    echo 'Update sucess ! ' . '<br>';
else
    echo 'Update failed  ! ' . '<br>';



?>
<hr><?php
if($username=="wanyirui"){
	echo "<a href='showManage.php'>Show data</a>";
}else{
  echo "<a href='showyourdata.php'>Show your data</a>";
}

?>

</div>
<div class="text-sm-center">
    <hr />
<?php
    require('footer.php');
?>
</div>
</body>

</html>