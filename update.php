<?php
session_start();

if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
if($_SESSION['category']=='admin'){
    $isdisabled="";
}
elseif($_SESSION['category']=='user'){
    $isdisabled="disabled";
}
echo "Logged in as ".$_SESSION['category'] . "<br>";


include 'db.php';
$id=$_GET['id'];
$sql ="select * from risk where id='$id'";
$rows=$db->query($sql);
$row = $rows->fetch_assoc();

// var_dump($row);
if(isset($_POST['edit'])){
    if(isset($_POST['risk_type'])) $risk_type=$_POST['risk_type']; else $risk_type=null;
    if(isset($_POST['risk_stand'])) $risk_stand=$_POST['risk_stand']; else $risk_stand=null;
    if(isset($_POST['risk_cause'])) $risk_cause=$_POST['risk_cause']; else $risk_cause=null;
    if(isset($_POST['impact_desc'])) $impact_desc=$_POST['impact_desc']; else $impact_desc=null;
    if(isset($_POST['likelyhood'])) $likelyhood=$_POST['likelyhood']; else $likelyhood=null;
    if(isset($_POST['likely_bg'])) $likely_bg=$_POST['likely_bg']; else $likely_bg=null;
    if(isset($_POST['impact'])) $impact=$_POST['impact']; else $impact=null;
    if(isset($_POST['impact_bg'])) $impact_bg=$_POST['impact_bg']; else $impact_bg=null;
    if(isset($_POST['risk_score'])) $risk_score=$_POST['risk_score']; else $risk_score=null;
    if(isset($_POST['unit_manager'])) $unit_manager=$_POST['unit_manager']; else $unit_manager=null;
    if(isset($_POST['action_plan'])) $action_plan=$_POST['action_plan']; else $action_plan=null;
    if(isset($_POST['control_score'])) $control_score=$_POST['control_score']; else $control_score=null;
    if(isset($_POST['cs_bg'])) $cs_bg=$_POST['cs_bg']; else $cs_bg=null;
    if(isset($_POST['res_score'])) $res_score=$_POST['res_score']; else $res_score=null;

	$sql2 ="update risk set risk_type='$risk_type',risk_stand='$risk_stand',risk_cause='$risk_cause',impact_desc='$impact_desc',likelyhood='$likelyhood',likely_bg='$likely_bg',impact='$impact',impact_bg='$impact_bg',risk_score='$risk_score',unit_manager='$unit_manager',action_plan='$action_plan',control_score='$control_score',cs_bg='$cs_bg',res_score='$res_score' where id ='$id'";
	$val=$db->query($sql2);
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
    <title>Edit Risk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form method="POST" action="">
                        <input type="hidden" name="_token" value="4HM4yiaS5Qzr3R2o8bs7kEF5agzpy8MTbd2lqfsN">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risk Type</label>
                            <div class="col-md-6">
                                <select name="risk_type" id="risk_type" class="form-control" value="AR" <?php echo $isdisabled?>>
                                <?php
                                $rsk=$row['risk_type']; 
                                switch($row['risk_type']){
                                    case 'AR': $rsk="Academic Risk"; break;
                                    case 'FR': $rsk="Financial Risk"; break;
                                    case 'SR': $rsk="Strategic Risk"; break;
                                    case 'OR': $rsk="Others Risk"; break;
                                    default : $rsk=" "; $row['risk_type']="df";
                                    }
                                ?>
                                    <option value="<?php echo $row['risk_type']; ?>" selected disabled hidden><?php echo $rsk; ?></option>
                                    <option value="AR" >Academic Risk</option>
                                    <option value="FR" >Financial Risk</option>
                                    <option value="SR" >Strategic Risk</option>
                                    <option value="OR" >Others Risk</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risk Standard</label>
                            <div class="col-md-6">
                                <textarea name="risk_stand" class="form-control" rows="5" id="risk_stand" <?php echo $isdisabled?> ><?php echo $row['risk_stand']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risk Cause</label>
                            <div class="col-md-6">
                                <textarea name="risk_cause" class="form-control" rows="5" id="risk_cause" <?php echo $isdisabled?> ><?php echo $row['risk_cause']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Impact Description</label>
                            <div class="col-md-6">
                                <textarea name="impact_desc" class="form-control" rows="5" id="impact_desc" <?php echo $isdisabled?> ><?php echo $row['impact_desc']; ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Likelyhood</label>
                            <div class="col-md-4">
                                <?php
                                $lkhood=0; 
                                switch($row['likelyhood']){
                                    case 3: $lkhood="High"; break;
                                    case 2: $lkhood="Medium"; break;
                                    case 1: $lkhood="Low"; break;
                                                                   }
                                ?>
                                <select name="likelyhood" id="likelyhood" class="form-control" >
                                    <option value="<?php echo $row['likelyhood']; ?>" selected disabled hidden><?php echo $lkhood; ?></option>
                                    <option value="3" >High</option>
                                    <option value="2" >Medium</option>
                                    <option value="1" >Low</option>
                                </select>
                            </div>
                            <div class="col-md-2"><input type="text" name="likely_bg" id="likely_bg" class="form-control" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Impact</label>
                            <div class="col-md-4">
                                <?php
                                $imp=0; 
                                switch($row['impact']){
                                    case 3: $imp="High"; break;
                                    case 2: $imp="Medium"; break;
                                    case 1: $imp="Low"; break;
                                }
                                ?>
                                <select name="impact" id="impact" class="form-control">
                                <option value="<?php echo $row['impact']; ?>" selected disabled hidden><?php echo $imp; ?></option>
                                <option value="3"  >High</option>
                                    <option value="2"  >Medium</option>
                                    <option value="1" >Low</option>
                                </select>
                        </div><div class="col-md-2">
                        <input type="text" name="impact_bg" id="impact_bg" class="form-control" disabled>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Overall Risk Score</label>
                            <div class="col-md-6">
                                <input id="risk_score" type="text" class="form-control" name="risk_score" value="<?php echo $row['risk_score']; ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Submitted By</label>

                            <div class="col-md-6">
                                <?php
                                $submitter=0; 
                                switch($row['unit_manager']){
                                    case 1: $submitter="Shoaib Aslam"; break;
                                    case 2: $submitter="Yasir Javed"; break;
                                    case 3: $submitter="Admin"; break;
                                    case 4: $submitter="Anwar Deen"; break;
                                }
                                ?>
                                <select name="unit_manager" id="unit_manager" class="form-control">
                                <option value="<?php echo $row['unit_manager']; ?>" selected disabled hidden><?php echo $submitter; ?></option>
                                    <option value="1"  >Shoaib Aslam</option>
                                    <option value="2" >Yasir Javed</option>
                                    <option value="3" >Admin</option>
                                    <option value="4" >Anwar Deen</option>
                                    </select>
                            </div>
                        </div>
                            <hr size="2">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Response Action Plan</label>
                            <div class="col-md-6">
                                <textarea name="action_plan" class="form-control" rows="5" id="action_plan" required ><?php echo $row['action_plan']; ?>
</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Control Score</label>
                            <div class="col-md-4">
                                <?php
                                $ctrl_score=0; 
                                switch($row['control_score']){
                                    case 1: $ctrl_score="High"; break;
                                    case 2: $ctrl_score="Medium"; break;
                                    case 3: $ctrl_score="Low"; break;
                                }

                                ?>
                                <select name="control_score" id="control_score" class="form-control"  required>
                                    <option value="<?php echo row['control_score'];?>" hidden selected disabled><?php echo $ctrl_score ?></option>
                                    <option value="3" >High</option>
                                    <option value="2" >Medium</option>
                                    <option value="1" >Low</option>
                                </select>
                            </div><div class="col-md-2"><input type="text" name="cs_bg" id="cs_bg" class="form-control" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Residual Risk Score</label>
                            <div class="col-md-6">
                                <input id="res_score" type="text" class="form-control" name="res_score" value="<?php echo $row['res_score']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="edit">
                                    Submit Risk
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    <!-- End PAge Content -->
</div>
<br>
<script src="http://yasirkiani.com/newrisk/assets/js/lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
        $('#control_score').on('change', function() {
            if ($(this).val() == "")
                $("#cs_bg").css({"background-color": ""});
            if ($(this).val() == 3)
                $("#cs_bg").css({"background-color": "#C60000"});
            if ($(this).val() == 2)
                $("#cs_bg").css({"background-color": "#FF8306"});
            if ($(this).val() == 1)
                $("#cs_bg").css({"background-color": "#006600"});
            ResidualScore();
        });
        function ResidualScore(){
            if($('#control_score').val()){
                var rscore = $('#risk_score').val() / $('#control_score').val();
                if(rscore >= 6)                var bg = '#C60000';
                if(rscore >= 3 && rscore <= 5) var bg = '#FF8306';
                if(rscore >= 1 && rscore <=2)  var bg = '#006600';
                $("#res_score").css({"background-color": bg});
                $("#res_score").css({ 'color': 'white' });
                $("#res_score").val(rscore);
            }
        }
        $('#likelyhood').on('change', function() {
            if ($(this).val() == "")
                $("#likely_bg").css({"background-color": ""});
            if ($(this).val() == 3)
                $("#likely_bg").css({"background-color": "#C60000"});
            if ($(this).val() == 2)
                $("#likely_bg").css({"background-color": "#FF8306"});
            if ($(this).val() == 1)
                $("#likely_bg").css({"background-color": "#006600"});
            OverAllRisk();
        });

        $('#impact').on('change', function() {
            if ($(this).val() == "")
                $("#impact_bg").css({"background-color": ""});
            if ($(this).val() == 3)
                $("#impact_bg").css({"background-color": "#C60000"});
            if ($(this).val() == 2)
                $("#impact_bg").css({"background-color": "#FF8306"});
            if ($(this).val() == 1)
                $("#impact_bg").css({"background-color": "#006600"});
            OverAllRisk();
        });
        function OverAllRisk () {
            if($('#likelyhood').val() && $('#impact').val()){
                var risk = $('#likelyhood').val() * $('#impact').val();
                if(risk >= 6)              var bg = '#C60000';
                if(risk >= 3 && risk <= 5) var bg = '#FF8306';
                if(risk >= 1 && risk <=2)  var bg = '#006600';
                $("#risk_score").css({"background-color": bg});
                $("#risk_score").css({ 'color': 'white' });
                $("#risk_score").val(risk);
            }
        }
        $(function () {
            if ($('#likelyhood').val() == "")
                $("#likely_bg").css({"background-color": ""});
            if ($('#likelyhood').val() == 3)
                $("#likely_bg").css({"background-color": "#C60000"});
            if ($('#likelyhood').val() == 2)
                $("#likely_bg").css({"background-color": "#FF8306"});
            if ($('#likelyhood').val() == 1)
                $("#likely_bg").css({"background-color": "#006600"});

            if ($('#impact').val() == "")
                $("#impact_bg").css({"background-color": ""});
            if ($('#impact').val() == 3)
                $("#impact_bg").css({"background-color": "#C60000"});
            if ($('#impact').val() == 2)
                $("#impact_bg").css({"background-color": "#FF8306"});
            if ($('#impact').val() == 1)
                $("#impact_bg").css({"background-color": "#006600"});
            OverAllRisk();
            ResidualScore();
        });
    </script>
</body>
</html>