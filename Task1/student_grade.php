<?php
function Subject_sum($s1,$s2,$s3,$s4,$s5)
{
    return $s1+$s2+$s3+$s4+$s5;
}
function Subject_precentage($t,$n)
{
    return $t/($n);
}
function Student_grade($p)
{
    if($p<=100 && $p>=90)
    {
        return "A";
    }
    else if($p<90 && $p>=80)
    {
        return "B";
    }
    else if($p<80 && $p>=70)
    {
        return "C";
    }
    else if($p<70 && $p>=60)
    {
        return "D";
    }
    else if($p<60 && $p>=40)
    {
        return "E";
    }
    else
    {
        return "F";
    }
}
if($_POST)
{
  $s1=$_POST['sub1'];
  $s2=$_POST['sub2'];
  $s3=$_POST['sub3'];
  $s4=$_POST['sub4'];
  $s5=$_POST['sub5'];
  $total=Subject_sum($s1,$s2,$s3,$s4,$s5);
  $pre=Subject_precentage($total,5);
  $grade=Student_grade($pre);

}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Student Grade and Precentage</title>
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
          <div class="col-4 text-danger text-center bg-success my-4 h1 offset-4">Student Grade and Precentage</div>
          </div>
          <div class="col-4 offset-4">
              <form action="" method="post">
                  <div class="form-group">
                    <label for="s1">Physics</label>
                    <input type="text" name="sub1" id="s1" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="s2">Chemistry</label>
                    <input type="text" name="sub2" id="s2" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="s3">Biology</label>
                    <input type="text" name="sub3" id="s3" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="s4">Mathematics</label>
                    <input type="text" name="sub4" id="s4" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for="s5">Computer</label>
                    <input type="text" name="sub5" id="s5" class="form-control" placeholder="" aria-describedby="helpId">
                    <label for=""></label>
                    <input type="submit" class="btn btn-primary col-12" value="Grade"></input>
                  </div>
              </form>

              </div>
          </div>
          <div class="col-4 offset-4 bg-dark text-white h3"><?php if(isset($s1)){echo "Physics: $s1 <br>Chemistry: $s2 <br>Biology: $s3 <br>Mathematics: $s4 <br>Computer: $s5<br>Subjet Total Sum: $total<br>Subjet Precentage: $pre %";}?></div>
          <div class="col-4 offset-4 bg-secondary text-center text-white h3"><?php if(isset($grade)){echo "Grade $grade";}?></div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>