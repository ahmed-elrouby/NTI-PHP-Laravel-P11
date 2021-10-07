<?php
function Calc_elctricity($uc)
{
    if($uc>=0&&$uc<50)
    {
        return $uc*0.5;
    }
    else if($uc>=50 && $uc < 150)
    {
        return $uc*0.75;
    }
    else if($uc>=150 && $uc < 250)
    {
        return $uc*1.20;
    }
    else if($uc >= 250)
    {
        return $uc*1.50;
    }
    else
    {
        return 'Negative Value Not Accepted';
    }
}
    function addtionSharge($cbill)
    {
        return $cbill*0.2;
    }
if($_POST)
{
    $unitcharge = $_POST['unitcharge'];
    $calcBill = Calc_elctricity($unitcharge);
    $totalBill = addtionSharge($calcBill)+$calcBill;
    // $result=$num.posative_negative($num);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Calculate Total Electricity Bill Task</title>
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
          <div class="col-4 text-danger text-center bg-success my-4 h1 offset-4">Calculate Total Electricity Bill</div>
          </div>
          <div class="col-4 offset-4">
              <form action="" method="post">
                  <div class="form-group">
                    <label for="n">Unit Charge</label>
                    <input type="text" name="unitcharge" id="n" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for=""></label>
                    <input type="submit" class="btn btn-primary col-12" value="Calculate"></input>
                  </div>
              </form>

              </div>
          </div>
          <div class="col-4 offset-4 bg-dark text-white h3"><?php if(isset($calcBill)){echo "unit charge: $unitcharge<br>Bill Before Add Charge: $calcBill<br>Additional Charge: ".addtionSharge($calcBill);}?></div>
          <div class="col-4 offset-4 bg-secondary text-center  text-white h3"><?php if(isset($totalBill)){echo "Total Bill: $totalBill";}?></div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>