<?php
function rootNum($num,$rootdegree)
{
    return $num**(1/$rootdegree);
}
if($_POST)
{
    $num=$_POST['num'];
    $rootdegree=$_POST['rd'];
    $result="<sup>$rootdegree</sup>".'<strong>&radic;</strong>'.$num." = ".rootNum($num,$rootdegree);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Root Task</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
          <div class="col-12">
          <div class="col-4 text-danger text-center bg-success my-4 h1 offset-4">Root of Numbers </div>
          </div>
          <div class="col-4 offset-4">
              <form action="" method="post">
                  <div class="form-group">
                    <label for="num">Number</label>
                    <input type="text" name="num" id="num" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="rd">Root Degree</label>
                    <input type="text" name="rd" id="rd" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for=""></label>
                    <input type="submit" class="btn btn-primary col-12" value="Root"></input>
                  </div>
              </form>

              </div>
          </div>
          <div class="col-4 offset-4 bg-secondary text-center  text-white h3"><?php if(isset($result)){echo $result;}?></div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>