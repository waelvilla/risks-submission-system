<?php session_start();
  
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}

include 'db.php';
$sql='select * from risk';
$rows=$db->query($sql);
?>
<!DOCTYPE html>
<html>
<head>

    <title>Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<br>
<div class="container-fluid">
        <!-- Start Page Content -->

            <div class="row">
            <div class="container">
                <!-- Editable table -->
                <div class="card">
                    <div class="card-body">
                        <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-md table-striped text-center">
                                <tr>
                                    <th class="text-center">Risk Code</th>
                                    <th class="text-center">Risk Type</th>
                                    <th class="text-center">Risk Statement</th>
                                    <th class="text-center">Likelyhood</th>
                                    <th class="text-center">Impact</th>
                                    <th class="text-center">Risk Score</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Edit</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                                <?php while($row =$rows->fetch_assoc()) :
								?>
                                <tr>
                                    <td class="pt-3-half" ><?php echo $row['id']?></td>
                                    <td class="pt-3-half" ><?php echo $row['risk_type']?></td>
                                    <td class="pt-3-half" ><?php echo $row['risk_stand']?></td>
                                    <td class="pt-3-half" ><?php echo $row['likelyhood']?></td>
                                    <td class="pt-3-half" ><?php echo $row['impact']?></td>
                                    <td class="pt-3-half" ><?php echo $row['risk_score']?></td>
                                    <td class="pt-3-half" >Open</td>
                                    <td>
                                        <span class="table-remove"><button type="button" class="btn btn-info btn-rounded btn-sm my-0" onclick="window.location.href='update.php?id=<?php echo $row['id'];?>'">&nbsp;Edit&nbsp;</button></span>
                                    </td>
                                    <td>
                                        <span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0" onclick="window.location.href='delete.php?id=<?php echo $row['id'];?>'">&nbsp;Remove&nbsp;</button></span>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                

                            </table>
                        </div>
                    </div>
                </div>
                <!-- Editable table -->
            </div>

        </div>
        <button type="button"  class="add btn btn-success btn-rounded btn-sm my-0" onclick="window.location.href='addRisk.php'">&nbsp;Add Record&nbsp;</button>
        <!-- End PAge Content -->
    </div>
</body>
</html>