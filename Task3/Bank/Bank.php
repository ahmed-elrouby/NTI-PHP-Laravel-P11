<?Php
function CalcInterestRate($Year,$amount)
{
    if($Year<3)
    {
        return .1*$amount*$Year;
    }
    else
    {
        return .15*$amount*$Year;
    }
    
}
if ($_POST) {
    if (empty($_POST['name'])) {
        $error['name'] = "<div class='alert alert-warning'>Name is Required</div>";
    }
    if (empty($_POST['lamount'])) {
        $error['lamount'] = "<div class='alert alert-warning'>Loan amount is Required</div>";
    }
    if (empty($_POST['lyear'])) {
        $error['lyear'] = "<div class='alert alert-warning'>Loan Year is Required</div>";
    }

    if (empty($error)) {
        $br="<br>";
        $name=$_POST['name'];
        $year=$_POST['lyear'];
        $amount=$_POST['lamount'];
        $interest_rate=CalcInterestRate($year,$amount);
        $total_amount=$interest_rate+$amount;
        $monthly_payment=$total_amount/(12*$year);
        $result="<h4 class='mt-5 mb-3'>Loan Details</h4>
        <table class='table table-striped table-dark'>
        <thead>
          <tr>
            <th scope='col'>Interest Rate</th>
            <th scope='col'>Loan Year</th>
            <th scope='col'>Loan After interest</th>
            <th scope='col'>Payment Monthly</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>$interest_rate</td>
            <td>$year</td>
            <td>$total_amount</td>
            <td>$monthly_payment</td>
          </tr>
        </tbody>
      </table>";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Loan</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class="container bg-dark text-info">
      <div class="row">
          <div calss="col">
              <img src="bank.jfif" alt="Bank image" class="rounded  m-5" width="100%" height="100%">
          </div>
          <div class="col ml-5 mt-5 text-center">
          <h1><span class="text-muted display-4">B</span>ank Loa<span class="text-muted display-4">n</span></h1>
          <form method="post">
          <div class="form-group">
              <label for="name">
                  Name
              </label>
              <input type="text" name="name" id="name" class="form-control" value=<?=$name?>>
              <?=$error['name'];?>
          </div>
          <div class="form-group">
              <label for="amount">
                  Loan amount
              </label>
              <input type="number" name="lamount" id="amount" class="form-control" value=<?=$amount?>>
              <?= $error['lamount'];?>
          </div>
          <div class="form-group">
              <label for="year">
                  Loan year
              </label>
              <input type="number" name="lyear" id="year" class="form-control" value=<?=$year?>>
              <?= $error['lyear'];?>
          </div>
          <button type="submit" class="btn btn-primary" class="form-control">Calculate Loan <i class="fas fa-sign-in-alt text-dark"></i></button>
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