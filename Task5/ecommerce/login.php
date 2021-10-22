<?php
$title = "Login";
include_once("views/layouts/header.php");
include_once('app/middlewares/guest.php');
include_once("views/layouts/nav.php");
include_once("views/layouts/breadcrumb.php");
include_once("app/request/registerRequest.php");
include_once("app/request/loginRequest.php");
include_once("app/database/models/User.php");
include_once("app/mail/mail.php");

if (isset($_POST['login'])) {
    //email validation
    $emailValidation = new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult = $emailValidation->emailValidation();
    //email validation
    $passwordValidation = new loginRequest;
    $passwordValidation->setPassword($_POST['password']);
    $passwordValidationResult = $passwordValidation->passwordValidation();
    if (empty($emailValidationResult) && empty($passwordValidationResult)) {
        $userlogin = new User;
        $userlogin->setEmail($_POST['email']);
        $userlogin->setPassword($_POST['password']);
        $loginResult = $userlogin->login();
        if ($loginResult) {
            $user = $loginResult->fetch_object();
            if ($user->status != 1) {
                // send mail
                $subject = "Ecommerce-Verification-Code";
                $body = "<p>Hello {$user->first_name}</p><p> Your Verification Code is:<b>$user->code</b></p><p>Thank You.</p>";
                $newMail = new mail($_POST['email'], $subject, $body);
                $mailResult = $newMail->sendMail();
                if($mailResult)
                {
                    $_SESSION['email'] = $_POST['email'];
                    header("location:check-code.php?page=login");
                    die;
                }
                else
                {
                    $errors['failed-email'] = "<div class='alert alert-danger'>Some thing went Wrong</div>";
                }
            }
            else {
                $_SESSION['user'] = $user;
                header("location:index.php");
                die;
            }
        }
        else
        {
            $errors['worng-attempet'] = "<div class='alert alert-danger'>Failed Attempt.</div>";
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
                            <h4> login </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <input type="email" name="email" placeholder="Email" value="<?php
                                                                                                    if (isset($_POST['email'])) {
                                                                                                        echo $_POST['email'];
                                                                                                    }
                                                                                                    ?>">
                                        <?php
                                        if (isset($emailValidationResult)) {
                                            if (!empty($emailValidationResult)) {
                                                foreach ($emailValidationResult as $k => $v) {
                                                    echo $v;
                                                }
                                            }
                                        }
                                        ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?php
                                        if (isset($passwordValidationResult)) {
                                            if (!empty($passwordValidationResult)) {
                                                foreach ($passwordValidationResult as $k => $v) {
                                                    echo $v;
                                                }
                                            }
                                        }
                                        if(isset($errors)){
                                            if(!empty($errors))
                                        {
                                            foreach ($errors as $key => $value) {
                                                echo $value;
                                            }
                                        }
                                        }
                                        ?>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <!-- <input type="checkbox">
                                                <label>Remember me</label> -->
                                                <a href="verify-email.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit" name="login"><span>Login</span></button>
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