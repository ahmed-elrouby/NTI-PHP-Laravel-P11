<?php
function Min_num($n1,$n2,$n3)
{
  if($n1<$n2&& $n1<$n3)
  {
    $max=$n1;
  }
  else if($n2<$n1 && $n2<$n3)
  {
    $max=$n2;
  }
  else
  {
    $max=$n3;
  }
  return $max;
}
if($_POST)
{
    $n1=$_POST['num1'];
    $n2=$_POST['num2'];
    $n3=$_POST['num3'];
  $result="The Minimun Value is ".Min_num($n1,$n2,$n3);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Minimun Task</title>
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
          <div class="col-4 text-danger text-center bg-success my-4 h1 offset-4">Minimum Number </div>
          </div>
          <div class="col-4 offset-4">
              <form action="" method="post">
                  <div class="form-group">
                    <label for="fn">First Number</label>
                    <input type="text" name="num1" id="fn" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="sn">Second Number</label>
                    <input type="text" name="num2" id="sn" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="tn">Third Number</label>
                    <input type="text" name="num3" id="tn" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for=""></label>
                    <input type="submit" class="btn btn-primary col-12" value="Min"></input>
                  </div>
              </form>

              </div>
          </div>
          <div class="col-4 offset-4 bg-dark text-center  text-white h3"><?php if(isset($n1)){echo "[$n1,$n2,$n3]";}?></div>
          <div class="col-4 offset-4 bg-secondary   text-white h3"><?php if(isset($result)){echo $result;}?></div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>