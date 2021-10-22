<?php
$title="Change Password";
include_once("views/layouts/header.php");
include_once("app/request/registerRequest.php");
include_once("app/database/models/User.php");

if(isset($_POST['change-password']))
{
    $registerValidation = new registerRequest;
    $registerValidation->setPassword($_POST['password']);
    $registerValidation->setConfirmpassword($_POST['confirmpassword']);
    $passwordValidationResult = $registerValidation->passwordValidation();
    if (empty($passwordValidationResult))
    {
        $userUpassword=new User;
        $userUpassword->setEmail($_SESSION['email']);
        $userUpassword->setPassword($_POST['password']);
        $userUpdatePasswordResult=$userUpassword->updatePassword();
        if($userUpdatePasswordResult)
        {
            unset($_SESSION['email']);
            header("location:login.php");die;
        }
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h1 class="text-success text-center"><?=$title?></h1>
        </div>
    </div>
    <form method="post">
        <div class="form-group ">
            <label for="code" class="col-12 col-form-label">Password</label>
            <div class="col-sm-12">
                <input type="password" class="form-control" name="password" id="code" placeholder="">
            </div>
            <?php
                                            if (isset($passwordValidationResult['password-required'])) {
                                                echo $passwordValidationResult['password-required'];
                                            }
                                            if (isset($passwordValidationResult['password-pattern'])) {
                                                echo $passwordValidationResult['password-pattern'];
                                            }
                                            ?>
            <label for="code" class="col-12 col-form-label">Confirmpassword</label>
            <div class="col-sm-12">
                <input type="password" class="form-control" name="confirmpassword" id="code" placeholder="">
            </div>
            <?php
                                            if (isset($passwordValidationResult['confirmpassword-required'])) {
                                                echo $passwordValidationResult['confirmpassword-required'];
                                            }
                                            if (isset($passwordValidationResult['password-confirm'])) {
                                                echo $passwordValidationResult['password-confirm'];
                                            }
                                            if(isset($userUpdatePasswordResult))
                                            {
                                                if(empty($userUpdatePasswordResult))
                                                {
                                                    echo "<div class='alert alert-danger'>Some Thing Went Wrong.</div>";
                                                }
                                            }
                                            ?>
        </div>
        <div class="form-group ">
            <div class="offset-2 col-8">
                <button type="submit" class="btn btn-primary form-control" name="change-password"><?=$title?></button>
            </div>
        </div>
    </form>
</div>
<?php
include_once("views/layouts/footer.php");
?>