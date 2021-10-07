<?php
// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female


// collection => laravel => array of objects
//function
function changeGender($g)
{
    if($g->gender=="m")
    {
        return (object)["Male"];
    }
    else
    {
        return (object)["Female"];
    }
}
function array_Check($ao)
{
    if(is_array($ao))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function objet_Check($ao)
{
    if(is_object($ao))
    {
        return true;
    }
    else
    {
        return false;
    }
}

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        'home'=>'1234'
        
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'home'=>'1234'
    ],
    (object)[
        'id' => 3,
        'name' => 'mena',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'home'=>'1234'
        ],
    (object)[
        'id' => 4,
        'name' => 'Soka',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
        'home'=>'1234'
    ]
];


$TableHeader="";
foreach($users[0] as $userKey=>$userValue)
{
    $TableHeader.="<th>$userKey</th>";
}

$TableBody='';
foreach($users as $index=>$user)
{
    $TableBody.="<tr>";
    foreach($user as $Userkey=>$Uservalue)
    {
        if($Userkey=="gender")
        {
            
            $Uservalue=changeGender($Uservalue);
            
        }
        if(!array_Check($Uservalue)&&!objet_Check($Uservalue))
        {
            $TableBody.="<td>$Uservalue</td>";
        }
        else
        {
            $count=0;
            $TableBody.="<td>";
            foreach($Uservalue as $atrr=>$val)
            {
                $count++;
                if($count < count($Uservalue))
                {
                    $TableBody.=$val.", ";
                }
                else
                {
                    $TableBody.=$val;
                }

            }
            $TableBody.="</td>";
        }
        
            
    }
    $TableBody.="</tr>";
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Table Task</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      <div class="container">
          <div class="row">
              <div class="col-12 m-5 text-center h3 text-primary">
                  Parsing Data To Table
              </div>
              <div class="col-12">
              <table class="table">
                    <thead class="text-light bg-secondary">
                        <tr>
                            <?php if(isset($TableHeader)){echo $TableHeader;} ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($TableBody)){echo $TableBody;} ?>
                    </tbody>
      </table>                  
              </div>
          </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>