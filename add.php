<?php
include 'db.php';
if(isset($_POST['submit'])){
	$risk_type=$_POST['risk_type'];
    $risk_stand=$_POST['risk_stand'];
    $risk_cause=$_POST['risk_cause'];
    $impact_desc=$_POST['impact_desc'];
    $likelyhood=$_POST['likelyhood'];
    $likely_bg=$_POST['likely_bg'];
    $impact=$_POST['impact'];
    $impact_bg=$_POST['impact_bg'];
    $risk_score=$_POST['risk_score'];
    $unit_manager=$_POST['unit_manager'];
    $action_plan=$_POST['action_plan'];
    $control_score=$_POST['control_score'];
    $cs_bg=$_POST['cs_bg'];
    $res_score=$_POST['res_score'];


	$sql= "INSERT INTO risk (risk_type,risk_stand,risk_cause,impact_desc,likelyhood,likely_bg,impact,impact_bg,risk_score,unit_manager,action_plan,control_score,cs_bg,res_score) VALUES ('$risk_type','$risk_stand','$risk_cause','$impact_desc','$likelyhood','$likely_bg','$impact','$impact_bg','$risk_score','$unit_manager','$action_plan','$control_score','$cs_bg','$res_score')";
	$val= $db -> query($sql);
	if($val){
		echo "<h1> Record inserted successfully $name </h1>";
		header('location: index.php');
		// die();
	}	
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>