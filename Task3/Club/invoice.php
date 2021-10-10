<?php
function GamesInvoiceTotal($x)
{
    $sum=0;
    foreach($x as $i=>$v)
    {
        $sum+=$v;
    }
    return $sum;
}
session_start();
$curenccy="LE";
$gamesselection=[];
$result="<thead><tr><th>Subscriber</th><th colspan='5' class='text-right'>".$_SESSION['membername']."</th></tr></thead>";
for($i=0;$i < $_SESSION['countfamily'];$i++)
{
    $result.="<tbody><tr><td>".$_POST["membername-".($i+1)]."</td>";
    $membersumgames=0;
    foreach($_SESSION['games'] as $key=> $value)
    {
        if(isset($_POST[$key."-".($i+1)]))
        {
            $result.="<td>".$_POST[$key."-".($i+1)]."</td>";
            $membersumgames+=$value;
        }
        else
        {
            $result.="<td> - </td>";
        }   
    }
    $gamesselection[$i]=$membersumgames;
    $result.="<td>$membersumgames $curenccy</td></tr>";
}
$result.="<thead><tr><th>Total Games invoice</th><th colspan='5' class='text-right'>".GamesInvoiceTotal($gamesselection)."</th></tr></thead>";
foreach($_SESSION['games'] as $key=> $value)
{
    $result.="<td>$key Invoice</td>";
    $gamesum=0;
    for($i=0;$i< $_SESSION['countfamily'];$i++)
    {
        if(isset($_POST[$key."-".($i+1)]))
        {
            $gamesum +=$_SESSION['games'][$_POST[$key."-".($i+1)]];
        }
    }
    $result.="<td colspan='5' class='text-right'>$gamesum</td></tr>";
}
$result.="<thead><tr><th>Club subscription</th><th colspan='5' class='text-right'>".($_SESSION['subscribecost']+($_SESSION['countfamily']*$_SESSION['membercost']))."</th></tr></thead>";
$result.="<thead><tr><th>Final total Invoice</th><th colspan='5' class='text-right'>".($_SESSION['subscribecost']+GamesInvoiceTotal($gamesselection)+($_SESSION['countfamily']*$_SESSION['membercost']))."</th></tr></thead></tbody> ";
unset($_SESSION['subscribecost']);
unset($_SESSION['membername']);
unset($_SESSION['countfamily']);
unset($_SESSION['membercost']);
unset($_SESSION['games']);
session_destroy();
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Invoice Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="bg-danger">
  <div class="row">
          
          <div class="col-8 offset-2">
          <h1 class="text-center my-5 text-dark">
          Inovice For Member
          </h1>
              <table class="table table-primary table-striped text-center">
                  <?=$result?>
              </table>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>