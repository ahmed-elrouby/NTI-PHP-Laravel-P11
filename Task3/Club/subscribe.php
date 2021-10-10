<?php
session_start();
$curenccy="LE";
$result="";
for($i=0;$i < $_SESSION['countfamily'];$i++)
{
    $result.="<div class='form-group'>
    <label for='membername-".($i+1)."' class='h2 text-dark'>Member-".($i+1)." Name</label>
    <input type='text' name='membername-".($i+1)."' id='membername-".($i+1)."' class='form-control'>
    </div>";
    foreach($_SESSION['games'] as $key=> $value)
    {
        $result.="<div class='form-group custom-control custom-checkbox'><input type='checkbox' id='".$key.($i+1)."' name='".$key."-".($i+1)."' value=".$key." class='custom-control-input'>
        <label class='custom-control-label' for='".$key.($i+1)."'>".$key." ".($value)." $curenccy"."</label></div>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Member Dtails</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body class="bg-success">
      <div class="row">
          
          <div class="col-8 offset-2">
          <h1 class="text-center my-5 text-white-50">
          Select Games For Members
          </h1>
              <form action="invoice.php" method="post">
                  <?=$result?>
                  <div class="text-center my-5"><button type="submit" class="btn btn-light" class="form-control">Show invoice  <i class="fas fa-sign-in-alt text-danger"></i></button></div>
              </form>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>