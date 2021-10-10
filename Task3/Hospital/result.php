<?php
session_start();
function Convet_PointtoDegrees($p)
{
    if($p >= 0 && $p < 3)
    {
        return 'Bad';
    }
    if($p >= 3 && $p < 5)
    {
        return 'Good';
    }
    if($p >= 5 && $p < 10)
    {
        return 'Very Good';
    }
    if($p==10)
    {
        return 'Excellent';
    }
}
function checkResult($result,$phone)
{
    if($result < 25)
    {
        return "<div class='alert alert-danger text-center mb-5'>Please Contact the patient to Know the reason of Bad evaluation in Phone Number: +  $phone</div>";
    }
    else
    {
        return "<div class='alert alert-success text-center mb-5'>Thank you for your Evaluate our Hospital with Posiatve Result</div>";
    }
}

$result=$_SESSION['result'];
$phone=$_SESSION['phone'];
$FinalResult=checkResult($result,$phone);
$totalPreview=Convet_PointtoDegrees($result/5);
$selections=$_SESSION['selection'];
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Result Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-dark container">
  <div class="row p-5">
          <h1 class="col-12 text-center text-white"><span class="display-1 text-danger">Hospital</span> preview</h1>
    </div>
  <table class="table table-secondary table-striped ">
          <thead class="text-center">
              <tr>
                  <th>Survey Questions ?</th>
                  <th>preview</th>
              </tr>
          </thead>
          <tbody class="text-center">
              <tr>
                  <td >1- Do you Satisfiy with the Degree of Cleanliness ?</td>
                  <td><?php echo Convet_PointtoDegrees($selections[0])?></td>
              </tr>
              <tr>
                  <td>2- Do you Satisfiy with the Price of Services ?</td>
                  <td><?php echo Convet_PointtoDegrees($selections[1])?></td>
              </tr>
              <tr>
                  <td>3- Do you Satisfiy with the Nursing service ?</td>
                  <td><?php echo Convet_PointtoDegrees($selections[2])?></td>
              </tr>
              <tr>
                  <td>4- Do you Satisfiy with the Level of Doctors ?</td>
                  <td><?php echo Convet_PointtoDegrees($selections[3])?></td>
              </tr>
              <tr>
                  <td>5- Do you Satisfiy with the Quietness in Hospital ?</td>
                  <td><?php echo Convet_PointtoDegrees($selections[4])?></td>
              </tr>
              <tr class="bg-danger text-white h3 ">
                  <td>Total preview</td>
                  <td><?=$totalPreview; ?></td>
              </tr>
          </tbody>
      </table>
      <?=$FinalResult;?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>