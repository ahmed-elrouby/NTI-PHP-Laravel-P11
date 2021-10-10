<?php
session_start();
if($_POST) {
    if (empty($_POST['phone'])) {
        $error['phone'] = "<div class='alert alert-warning'>Phone Number is Required</div>";
        
    }
    if (empty($error)) {
        $_SESSION['phone']=$_POST['phone'];
        header("location:question.php");
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Phone Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body class="bg-dark container">
      <div class="row p-5">
          <h1 class="col-12 text-center"><span class="display-1 text-danger">Hospital</span> Survey</h1>
      </div>
      <div class="row">
          <div class="col-4 offset-4 bg-secondary text-center text-danger p-5 rounded rounded-circle ">
          <form method="post">
          <div class="form-group text-dark">
              <label for="phone" class="h1">
              Phone Number
              </label>
              <input type="phone" name="phone" id="phone" class="form-control">
              <?=$error['phone'];?>
          </div>
          <button type="submit" class="btn btn-danger" class="form-control">Go To Survey <i class="fas fa-sign-in-alt text-dark"></i></button>
          </form>
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