<?Php
session_start();
$subscribecost=10000;
$membercost=2500;
if ($_POST) {
    if (empty($_POST['membername'])) {
        $error['membername'] = "<div class='alert alert-warning'>Member Name is required</div>";
    }
    if (empty($_POST['countfamily'])) {
        $error['countfamily'] = "<div class='alert alert-warning'>Count of Family Members is required</div>";
    }
    if (empty($error)) {
        $_SESSION['subscribecost']=$subscribecost;
        $_SESSION['membercost']=$membercost;
        $_SESSION['membername']=$_POST['membername'];
        $_SESSION['countfamily']=$_POST['countfamily'];
        $_SESSION['games']=['Football'=>300,'Swimming'=>250,'Volley-ball'=>150,'Others'=>100];
        header("location:subscribe.php");
        die();
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Club Subscribe</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container bg-primary text-info">
      <div class="row">
          <div class="col-6 mt-5 text-center offset-3">
          <h1><span class="text-dark display-1">CLUB</span> <span class="text-white display-4">Subscribe</span></h1>
          <form method="post" class="mt-5">
          <div class="form-group">
              <label for="membername" class="h2 text-white-50">
              Member Name
              </label>
              <input type="text" name="membername" id="membername" class="form-control">
              <div class="alet alert-info">Subscription cost <span class="text-danger"> <?=$subscribecost?> L.E</span></div>
              <?=$error['membername'];?>
          </div>
          <div class="form-group">
              <label for="countfamily" class="h2 text-white-50">
              Count of Family Members
              </label>
              <input type="number" name="countfamily" id="countfamily" class="form-control">
              <div class="alet alert-info">Cost for each member is<span class="text-danger"> <?=$membercost?> L.E</span></div>
              <?= $error['countfamily'];?>
          </div>
          <button type="submit" class="btn btn-light" class="form-control">Subscribe <i class="fas fa-sign-in-alt text-danger"></i></button>
          </form>
          <?= $result;?>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>