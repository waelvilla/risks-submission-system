<?php 
session_start();
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Risk</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <form method="POST" action="add.php">
                        <input type="hidden" name="_token" value="4HM4yiaS5Qzr3R2o8bs7kEF5agzpy8MTbd2lqfsN">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risk Type</label>
                            <div class="col-md-6">
                                <select name="risk_type" id="risk_type" class="form-control">
                                    <option value="" selected>Select Risk Type</option>
                                    <option value="AR"  >Academic Risk</option>
                                    <option value="FR" >Financial Risk</option>
                                    <option value="SR" >Strategic Risk</option>
                                    <option value="OR" >Others Risk</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risk Standard</label>
                            <div class="col-md-6">
                                <textarea name="risk_stand" class="form-control" rows="5" id="risk_stand" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Risk Cause</label>
                            <div class="col-md-6">
                                <textarea name="risk_cause" class="form-control" rows="5" id="risk_cause"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Impact Description</label>
                            <div class="col-md-6">
                                <textarea name="impact_desc" class="form-control" rows="5" id="impact_desc" ></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Likelyhood</label>
                            <div class="col-md-4">
                                <select name="likelyhood" id="likelyhood" class="form-control"  >
                                    <option value="" selected>Select Likelyhood</option>
                                    <option value="3"   >High</option>
                                    <option value="2" >Medium</option>
                                    <option value="1" >Low</option>
                                </select>
                            </div>
                            <div class="col-md-2"><input type="text" name="likely_bg" id="likely_bg" class="form-control" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Impact</label>
                            <div class="col-md-4">
                                <select name="impact" id="impact" class="form-control">
                                    <option value="" selected>Select Impact</option>
                                    <option value="3"    >High</option>
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
                                <input id="risk_score" type="text" class="form-control" name="risk_score" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Submitted By</label>

                            <div class="col-md-6">
                                <select name="unit_manager" id="unit_manager" class="form-control">
                                    <option value="" selected>Select Unit Manager</option>
                                    <option value="1"   >Shoaib Aslam</option>
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
                                <textarea name="action_plan" class="form-control" rows="5" id="action_plan" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Control Score</label>
                            <div class="col-md-4">
                                <select name="control_score" id="control_score" class="form-control"  required>
                                    <option value="">Select Control Score</option>
                                    <option value="3" >High</option>
                                    <option value="2" >Medium</option>
                                    <option value="1" >Low</option>
                                </select>
                            </div><div class="col-md-2"><input type="text" name="cs_bg" id="cs_bg" class="form-control" disabled></div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Residual Risk Score</label>
                            <div class="col-md-6">
                                <input id="res_score" type="text" class="form-control" name="res_score"  required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="submit">
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