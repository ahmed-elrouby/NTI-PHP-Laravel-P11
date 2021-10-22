<?php
$title = "Check-code";
include_once("views/layouts/header.php");
include_once("app/request/checkCodeRequest.php");
include_once("app/database/models/User.php");

if($_GET)
{
    if(!isset($_GET['page']))
    {
        header("location:views/errors/404.php");die;
    }
    else
    {
        if(!in_array($_GET['page'],['login','verify','register','profile']))
        {
            header("location:views/errors/404.php");
            die;
        }
    }
}

if (isset($_POST['check-code'])) {
    // code validation
    $checkCode = new checkCodeRequest;
    $checkCode->setCode($_POST['code']);
    $codeValidationResult = $checkCode->codeValidation();
    if(isset($_SESSION['email']))
    {
        echo $_SESSION['email'];
    }
    else
    {
        echo "nyyy";    
    }

    if (empty($codeValidationResult)) {
        $userObject = new User;
        $userObject->setCode($_POST['code']);
        $userObject->setEmail($_SESSION['email']);
        $checkCodeResult = $userObject->checkCode();
        if ($checkCodeResult) {
            //update status ,change email verfied at 
            $userObject->setStatus(1);
            $userObject->setVerified_at(date("Y-m-d H:i:s"));
            $verifyUseResult = $userObject->verifyUser();
            if ($verifyUseResult) {
                switch($_GET['page'])
                {
                    case 'login':
                        $_SESSION['user']=$checkCodeResult->fetch_object();
                        unset($_SESSION['email']);
                        header("location:index.php");
                        die;
                    case 'register':
                        unset($_SESSION['email']);
                        header("location:login.php");
                        die;
                    case 'verify':
                        header("location:new-password.php");
                        die;
                    case 'profile':
                        $_SESSION['user']=$checkCodeResult->fetch_object();
                        unset($_SESSION['email']);
                        header("location:profile.php");
                        die;
                    default:
                        header("location:views/errors/404.php");
                        die;
                    
                }
            }
        }
    }
}
include_once("views/layouts/header.php");
// include_once("views/layouts/nav.php");
?>
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h1 class="text-success text-center">Check Code</h1>
        </div>
    </div>
    <form method="post">
        <div class="form-group ">
            <label for="code" class="col-12 col-form-label">Code</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" name="code" id="code" placeholder="">
            </div>
            <?php
            if (isset($codeValidationResult)) {
                if (!empty($codeValidationResult)) {
                    foreach ($codeValidationResult as $k => $v) {
                        echo $v;
                    }
                }
            }
            if (isset($checkCodeResult)) {
                if (empty($checkCodeResult)) {
                    echo "<div class='alert alert-danger'>Invalid Code</div>";
                }
            }

            if (isset($verifyUseResult)) {
                if (empty($verifyUseResult)) {
                echo "<div class='alert alert-danger'>Code is not Correct.</div>";
                }
            }
            ?>
        </div>
        <div class="form-group ">
            <div class="offset-2 col-8">
                <button type="submit" class="btn btn-primary form-control" name="check-code">Check</button>
            </div>
        </div>
    </form>
</div>
<?php
include_once("views/layouts/footer.php");
?>