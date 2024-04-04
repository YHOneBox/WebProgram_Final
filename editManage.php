<?php
session_start();  
$username=$_SESSION["username"];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Framingham心血管疾病風險預測</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</head>

<body style="background-color: lightblue">
<?php
              require('navbar.php');
              ?>
<div class="text-center">
           
</div>
<div class="text-center">
            <h2 class="font-weight-bold text-center text-dark" >心血管疾病風險預測</h2><br>
</div>
<div class="container">
            <div class="row justify-content-center">
            
            <div class="col-md-auto">



[ Edit ]
<?php
echo 'ID = ' . $_REQUEST['id'];
//修改資料
require('conn_db.php');
	$sql=$pdo->prepare('select * from heart where id=?');
	if ($sql->execute([$_REQUEST['id']])) {
	  echo '查詢成功 ! ' . '<br>'; }
	else {
	  echo '查詢失敗 !'  . '<br>';
	}

  //取出資料
	foreach ($sql->fetchAll() as $row) {}
?>

<form id="form1" name="form1" action="updateManage.php" method="post">
  <input type="hidden" name="id" value=<?php echo $row['id']; ?>> 
  <table class="table-bordered table-sm shadow p-3 mb-5 bg-light rounded" width="700" border="1">
    <tbody>
      <tr>
      <td class="bg-dark text-light" style="width: 215px">危險因子 Risk Factors</td>
                      <td class="bg-dark text-light" style="width: 189px">單位 Unit</td>
                      <td class="bg-dark text-light" style="width: 177px">資料 Data</td>
      </tr>
      <tr>
        <td style="width: 215px">性別 (Sex)</td>
        <td style="width: 189px">&nbsp;</td>
        <td style="width: 177px">
		<input checked="true" name="SexGroup" type="radio" value ="1" <?php if ($row['sex'] == 'Male') echo 'checked'; ?>>Male
		<input name="SexGroup" type="radio" value ="2" <?php if ($row['sex'] == 'Female') echo 'checked'; ?>>Female</td>
      </tr>
      <tr>
      <td class = "bg-secondary text-light" style="width: 215px">年齡 (Age)</td>
        <td style="width: 189px">歲</td>
        <td style="width: 177px">
        <select name="age">
		<?php
			for ($i=10; $i<=99; $i++) {
				echo '<option value="' . $i . '">' . $i . '</option>';
			}
			//<option value="10">10</option>
		?>
		
		
		</select></td>
		
      </tr>
      <tr>
        <td style="width: 215px">血壓 (Blood pressure)</td>
        <td style="width: 189px">舒張壓Diastolic</td>
        <td style="width: 177px">
        <select name="blood_pressure1">
        <?php
        	$blood_range1=['<80'=>79, '80-84'=>82, '85-89'=>88,'90-99'=>95,'>100'=>101];
         		foreach($blood_range1 as $key=>$value) {
         	  echo '<option value="', $value , '">', $key , '</option>';
         }
        ?>
		</select></td>
      </tr>
      <tr>
        <td style="width: 215px">&nbsp;</td>
        <td style="width: 189px">收縮壓Systolic</td>
        <td style="width: 177px">
        <select name="blood_pressure2">
        <?php
        	$blood_range2=['<120'=>110, '120-129'=>125, '130-139'=>135,'140-159'=>145,'>160'=>165];
         		foreach($blood_range2 as $key=>$value) {
         	  echo '<option value="', $value , '">', $key , '</option>';
         }
        ?>

		
		</select></td>
      </tr>
      <tr>
      <td class="bg-danger text-light" style="width: 215px">使用高血壓藥物<br>(Anti-hypertensives)</td>
        <td style="width: 189px">&nbsp;</td>
        <td style="width: 177px"><input name="high_blood" type="checkbox">Yes</td>
      </tr>
      <tr>
        <td style="width: 215px">抽煙 (Smoker)</td>
        <td style="width: 189px">&nbsp;</td>
        <td style="width: 177px"><input name="smoke" type="checkbox">Yes</td>
      </tr>
      <tr>
      <td class = "bg-warning text-info" style="width: 215px">糖尿病 (Diabetes)</td>
        <td style="width: 189px">&nbsp;</td>
        <td style="width: 177px"><input name="diabetes" type="checkbox">Yes</td>
      </tr>
      <tr>
        <td style="width: 215px">高密度膽固醇 (HDL)</td>
        <td style="width: 189px">mg/dl</td>
        <td style="width: 177px">
         <select name="hdl">
        <?php
        	$hdl=['<35'=>20, '35-44'=>40, '45-49'=>48,'50-59'=>55,'>60'=>70];
         		foreach($hdl as $key=>$value) {
         	  echo '<option value="', $value , '">', $key , '</option>';
         }
        ?>
		</select>
		</td>
      </tr>
      <tr>
        <td style="width: 215px">總膽固醇 (TDL)</td>
        <td style="width: 189px">mg/dl</td>
        <td style="width: 177px">
           <select name="tdl">
        <?php
        	$tdl=['<160'=>150, '160-199'=>170, '200-239'=>220,'240-279'=>250,'>279'=>280];
         		foreach($tdl as $key=>$value) {
         	  echo '<option value="', $value , '">', $key , '</option>';
         }
        ?>
		</select>

        </td>
      </tr>
    </tbody>
  </table>
  <p>
  <input class="btn btn-success " type="submit" name="submit" id="submit" value="送出">
                  <input class="btn btn-danger" type="reset" name="reset" id="reset" value="重設">
  </p>
</form>
<p>&nbsp;</p>
</div>
        </div>
</div>
             
              <div class="col col-lg-2">
      </div>

        <div class="text-sm-center">
        <hr/>
            

        </div>
</body>
</html>