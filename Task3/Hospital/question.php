<?php
session_start();
function survey_result($s1,$s2,$s3,$s4,$s5)
{
    return $s1+$s2+$s3+$s4+$s5;
}
if($_POST) {
        if (!isset($_POST["Q1s"])) {
            echo $_POST["Q1s"];
            $error["Q1s"] = "<tr><td class='alert alert-warning text-center' colspan='5'>Question-1 selection is Required</td></tr>";
        }
        if (!isset($_POST["Q2s"])) {
            $error["Q2s"] = "<tr><td class='alert alert-warning text-center' colspan='5'>Question-2 selection is Required</td></tr>";
        }
        if (!isset($_POST["Q3s"])) {
            $error["Q3s"] = "<tr><td class='alert alert-warning text-center' colspan='5'>Question-3 selection is Required</td></tr>";
        }
        if (!isset($_POST["Q4s"])) {
            $error["Q4s"] = "<tr><td class='alert alert-warning text-center' colspan='5'>Question-4 selection is Required</td></tr>";
        }
        if (!isset($_POST["Q5s"])) {
            $error["Q5s"] = "<tr><td class='alert alert-warning text-center' colspan='5'>Question-5 selection is Required</td></tr>";
        }
    if (empty($error)) {
        
        $result=survey_result($_POST['Q1s'],$_POST['Q2s'],$_POST['Q3s'],$_POST['Q4s'],$_POST['Q5s']);
        $question_selection=[$_POST['Q1s'],$_POST['Q2s'],$_POST['Q3s'],$_POST['Q4s'],$_POST['Q5s']];
        $_SESSION['selection']=$question_selection; 
        $_SESSION['result']=$result;
        header("location:result.php");
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Survey Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-dark container">
  <div class="row p-5">
          <h1 class="col-12 text-center rounded rounded-circle bg-primary p-4"><span class="display-1 text-danger">Hospital</span> <span class="rounded bg-secondary rounded-circle p-4">Survey</span></h1>
      </div>
      <form method="post">
      <table class="table table-success">
          <thead>
              <tr>
                  <th>Survey Questions ?</th>
                  <th>Bad</th>
                  <th>Good</th>
                  <th>Very Good</th>
                  <th>Excellent</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td >1- Do you Satisfiy with the Degree of Cleanliness ?</td>
                  <td><input type="radio" value='0' name="Q1s" class="form-control" <?php if(isset($_POST['Q1s'])){if($_POST['Q1s']==0){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='3' name="Q1s" class="form-control" <?php if(isset($_POST['Q1s'])){if($_POST['Q1s']==3){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='5' name="Q1s" class="form-control" <?php if(isset($_POST['Q1s'])){if($_POST['Q1s']==5){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='10' name="Q1s" class="form-control" <?php if(isset($_POST['Q1s'])){if($_POST['Q1s']==10){?>checked=<?php echo"checked";}}?>></td>
              </tr>
              <?=$error["Q1s"];?>
              <tr>
                  <td>2- Do you Satisfiy with the Price of Services ?</td>
                  <td><input type="radio" value='0' name="Q2s" class="form-control" <?php if(isset($_POST['Q2s'])){if($_POST['Q2s']==0){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='3' name="Q2s" class="form-control" <?php if(isset($_POST['Q2s'])){if($_POST['Q2s']==3){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='5' name="Q2s" class="form-control" <?php if(isset($_POST['Q2s'])){if($_POST['Q2s']==5){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='10' name="Q2s" class="form-control" <?php if(isset($_POST['Q2s'])){if($_POST['Q2s']==10){?>checked=<?php echo"checked";}}?>></td>
              </tr>
              <?=$error["Q2s"];?>
              <tr>
                  <td>3- Do you Satisfiy with the Nursing service ?</td>
                  <td><input type="radio" value='0' name="Q3s" class="form-control" <?php if(isset($_POST['Q3s'])){if($_POST['Q3s']==0){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='3' name="Q3s" class="form-control" <?php if(isset($_POST['Q3s'])){if($_POST['Q3s']==3){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='5' name="Q3s" class="form-control" <?php if(isset($_POST['Q3s'])){if($_POST['Q3s']==5){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='10' name="Q3s" class="form-control" <?php if(isset($_POST['Q3s'])){if($_POST['Q3s']==10){?>checked=<?php echo"checked";}}?>></td>
              </tr>
              <?=$error["Q3s"];?>
              <tr>
                  <td>4- Do you Satisfiy with the Level of Doctors ?</td>
                  <td><input type="radio" value='0' name="Q4s" class="form-control" <?php if(isset($_POST['Q4s'])){if($_POST['Q4s']==0){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='3' name="Q4s" class="form-control" <?php if(isset($_POST['Q4s'])){if($_POST['Q4s']==3){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='5' name="Q4s" class="form-control" <?php if(isset($_POST['Q4s'])){if($_POST['Q4s']==5){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='10' name="Q4s" class="form-control" <?php if(isset($_POST['Q4s'])){if($_POST['Q4s']==10){?>checked=<?php echo"checked";}}?>></td>
              </tr>
              <?=$error["Q4s"];?>
              <tr>
                  <td>5- Do you Satisfiy with the Quietness in Hospital ?</td>
                  <td><input type="radio" value='0' name="Q5s" class="form-control" <?php if(isset($_POST['Q5s'])){if($_POST['Q5s']==0){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='3' name="Q5s" class="form-control" <?php if(isset($_POST['Q5s'])){if($_POST['Q5s']==3){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='5' name="Q5s" class="form-control" <?php if(isset($_POST['Q5s'])){if($_POST['Q5s']==5){?>checked=<?php echo"checked";}}?>></td>
                  <td><input type="radio" value='10' name="Q5s" class="form-control" <?php if(isset($_POST['Q5s'])){if($_POST['Q5s']==10){?>checked=<?php echo"checked";}}?>></td>
              </tr>
              <?=$error["Q5s"];?>
          </tbody>
      </table>
      <button type="submit" class="btn btn-danger form-control mb-5">Results<i class="fas fa-sign-in-alt text-dark"></i></button>
      </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>