<?php
$title = "Register";
include_once("views/layouts/header.php");
include_once('app/middlewares/guest.php');
include_once("views/layouts/nav.php");
include_once("views/layouts/breadcrumb.php");
include_once("app/request/registerRequest.php");
include_once("app/database/models/User.php");
include_once("app/mail/mail.php");
if (isset($_POST['register'])) {
    $registerValidation = new registerRequest;
    $registerValidation->setEmail($_POST['email']);
    $emailValidationResult = $registerValidation->emailValidation();
    $registerValidation->setPassword($_POST['password']);
    $registerValidation->setConfirmpassword($_POST['confirmpassword']);
    $passwordValidationResult = $registerValidation->passwordValidation();
    if (empty($emailValidationResult) && empty($passwordValidationResult)) {

        //validation on mail unique
        $EmailExistResult = $registerValidation->emailExists();
        //validation on phone uniqe
        $registerValidation->setPhone($_POST['phone']);
        $PhoneExistResult = $registerValidation->phoneExists();
        //inser
        if (empty($PhoneExistResult) && empty($EmailExistResult)) {
            $code = rand(10000, 99999);
            $userobject = new User;
            $userobject->setFirst_name($_POST['fname']);
            $userobject->setLast_name($_POST['lname']);
            $userobject->setEmail($_POST['email']);
            $userobject->setPassword($_POST['password']);
            $userobject->setPhone($_POST['phone']);
            $userobject->setGender($_POST['gender']);
            $userobject->setCode($code);
            $createResult = $userobject->create();
        }
        if ($createResult) {
            //email
            $subject = "Ecommerce-Verfication-Code";
            $body = "<p>Hello " . $_POST['fname'] . "</p>
            <p>Your Verfication Code:<b> $code</b></p>
            <p>Thank You</p>";
            $newmail = new mail($_POST['email'], $subject, $body);
            $mailResult = $newmail->sendMail();
            if ($mailResult) {
                $_SESSION['email']=$_POST['email'];
                header("location:check-code.php?page=register");
                die;
            } else {
                $emailError = "<div class='alert alert-danger'>Try to Verify in another time.</div>";
            }
            // mail($_POST['email'],"verfication codes","the code is: $code",);
            // header check-code

            // die;
        } else {
            $wrong = "<div class='alert alert-danger'>Some Thing Went Wrong.</div>";
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
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                            <?php
                            if (isset($emailError)) {
                                echo $emailError;
                            }
                            ?>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?php
                                    if (isset($wrong)) {
                                        echo $wrong;
                                    }
                                    ?>
                                    <form method="post">
                                        <div class="form-group">
                                            <label for="fname">
                                                First Name
                                            </label>
                                            <input type="text" name="fname" placeholder="" class='control-form' id='fname' value="<?php
                                                                                                                                    if (isset($_POST['fname'])) {
                                                                                                                                        echo $_POST['fname'];
                                                                                                                                    }
                                                                                                                                    ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">
                                                Last Name
                                            </label>
                                            <input type="text" name="lname" placeholder="" class='control-form' id='lname' value="<?php
                                                                                                                                    if (isset($_POST['lname'])) {
                                                                                                                                        echo $_POST['lname'];
                                                                                                                                    }
                                                                                                                                    ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Email
                                            </label>
                                            <input type="email" name="email" placeholder="" class='control-form' id='email' value="<?php
                                                                                                                                    if (isset($_POST['email'])) {
                                                                                                                                        echo $_POST['email'];
                                                                                                                                    }
                                                                                                                                    ?>">
                                            <?php
                                            if (!empty($emailValidationResult)) {
                                                foreach ($emailValidationResult as $key => $value) {
                                                    echo $value;
                                                }
                                            }
                                            if (!empty($EmailExistResult)) {
                                                echo $EmailExistResult['email-unique'];
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">
                                                Password
                                            </label>
                                            <input type="password" name="password" placeholder="" class='control-form' id='password'>
                                            <?php
                                            if (isset($passwordValidationResult['password-required'])) {
                                                echo $passwordValidationResult['password-required'];
                                            }
                                            if (isset($passwordValidationResult['password-pattern'])) {
                                                echo $passwordValidationResult['password-pattern'];
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirmpassword">
                                                Confirm Password
                                            </label>
                                            <input type="password" name="confirmpassword" placeholder="" class='control-form' id='confirmpassword'>
                                            <?php
                                            if (isset($passwordValidationResult['confirmpassword-required'])) {
                                                echo $passwordValidationResult['confirmpassword-required'];
                                            }
                                            if (isset($passwordValidationResult['password-confirm'])) {
                                                echo $passwordValidationResult['password-confirm'];
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">
                                                Phone
                                            </label>
                                            <input type="tel" name="phone" placeholder="" class='control-form' id='phone' value="<?php
                                                                                                                                    if (isset($_POST['phone'])) {
                                                                                                                                        echo $_POST['phone'];
                                                                                                                                    }
                                                                                                                                    ?>">
                                            <?php
                                            if (!empty($PhoneExistResult)) {
                                                echo $PhoneExistResult['phone-unique'];
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">
                                                Gender
                                            </label>
                                            <select name="gender" id="gender">
                                                <option value="m" <?php
                                                                    if (isset($_POST['gender']) && $_POST['gender'] == "m") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Male</option>
                                                <option value="f" <?php
                                                                    if (isset($_POST['gender']) && $_POST['gender'] == "f") {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>Female</option>
                                            </select>
                                        </div>
                                        <div class="button-box">
                                            <button type="submit" name="register" class='btn btn-primary'><span>Register</span></button>
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