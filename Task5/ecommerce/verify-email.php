<?php
include_once("views/layouts/header.php");
include_once("app/request/registerRequest.php");
include_once("app/database/models/User.php");
include_once("app/mail/mail.php");

if(isset($_POST['verify-email']))
{
    $emailValidation=new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult=$emailValidation->emailValidation();
    if(empty($emailValidationResult))
    {

        $emailExistsResult=$emailValidation->emailExists();
        if(!empty($emailExistsResult))
        {
            $code=rand(10000,99999);
            $userData=new User;
            $userData->setEmail($_POST['email']);
            $userData->setCode($code);
            $udateCodeResult=$userData->updateCode();
            if($udateCodeResult)
            {
                $chekIfEmailExistsResult=$userData->chekIfEmailExists();
                $user=$chekIfEmailExistsResult->fetch_object();
                $subject="Ecommerce-Verfication-Code-forget-Password";
                $body="<p>Hello {$user->first_name}</p>
                <p>Your Verfication Code:<b> $user->code</b></p>
                <p>Thank You</p>";
                $newmail= new mail($_POST['email'], $subject , $body);
                $mailResult=$newmail->sendMail();
                if($mailResult)
                {
                    $_SESSION['email']=$_POST['email'];
                    header("location:check-code.php?page=verify");die;
                }
                else
                {
                    $errors['failed-email']  = "<div class='alert alert-danger'>Try to Verify in another time.</div>";
                }
            }
            else
            {
                $errors['wrong'] = "<div> something went wrong </div>";
            }

        }
    }
}


?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4>Verify Email</h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="email" name="email" placeholder="Email">
                                        <?php
                                        if(isset($emailValidationResult) and !empty($emailValidationResult))
                                        {
                                            foreach($emailValidationResult as $k=> $v)
                                            {
                                                echo $v;
                                            }
                                        }
                                        if(isset($errors) && !empty($errors)){
                                            foreach ($errors as $k => $v) {
                                                echo $v;
                                            }
                                        }
                                        if(isset($emailExistsResult)and empty($emailExistsResult))
                                        {
                                            echo "<div class='alert alert-warning'>Email not Found</div>";
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="verify-email"><span>Verify Email</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("views/layouts/footer.php");
?>