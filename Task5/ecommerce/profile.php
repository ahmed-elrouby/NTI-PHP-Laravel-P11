<?php
$title = "My Account";
include_once "views/layouts/header.php";
include_once "app/middlewares/auth.php";
include_once "app/database/models/User.php";
include_once "app/request/loginRequest.php";
include_once "app/request/registerRequest.php";
include_once "app/mail/mail.php";
include_once "app/services/UploadImage.php";
define('notverfiyed', 0);
$userData = new User;
$userData->setEmail($_SESSION['user']->email);
if (isset($_POST['update-profile'])) {
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['phone']) && !empty($_POST['gender'])) {

        $userData->setFirst_name($_POST['fname']);
        $userData->setLast_name($_POST['lname']);
        $userData->setPhone($_POST['phone']);
        $userData->setGender($_POST['gender']);
        if ($_FILES['image']['error'] == 0) {
            $uploadImage = new UploadImage($_FILES['image'], "assets/img/users/");
            $uploadImage->setUserId($_SESSION['user']->id);
            $uploadImageSizeErrors = $uploadImage->ValidationSize();
            $uploadImageExtensionErrors = $uploadImage->ValidationExtention();

            if (empty($uploadImageExtensionErrors) && empty($uploadImageSizeErrors)) {
                $uploadImageResult = $uploadImage->UploadNewImage();
                if ($uploadImageResult['status']) {
                    echo $uploadImageResult['name'];
                    $_SESSION['user']->image = $uploadImageResult['name'];
                    $userData->setImage($uploadImageResult['name']);
                }
            }
        }
        if (empty($uploadImageExtensionErrors) && empty($uploadImageSizeErrors)) {
            $updateResult = $userData->update();
            if ($updateResult) {
                $_SESSION['user']->first_name = $_POST['fname'];
                $_SESSION['user']->last_name = $_POST['lname'];
                $_SESSION['user']->phone = $_POST['phone'];
                $_SESSION['user']->gender = $_POST['gender'];
                $success['update-profile']['success'] = "<div class='alert alert-success'>Update Successfuly.</div>";
            } else {
                $errors['update-profile']['wrong'] = "<div class='alert alert-danger'>Some Thing Went Wrong.</div>";
            }
        }
    } else {
        $errors['update-profile']['all-fields'] = "<div class='alert alert-danger'>All Fields Are Required</div>";
    }
}
if (isset($_POST['change-password'])) {
    // print_r($_POST);
    $oldPassword = new loginRequest;
    $oldPassword->setPassword($_POST['old-password']);
    $oldPasswordResult = $oldPassword->passwordValidation();
    if ($_POST['new-password'] == $_POST['old-password']) {
        $errors['old-equal-new'] = "<div class='alert alert-danger text-center'>The New password Are the Same Old Password!</div>";
    }
    // if(!empty($oldPsaawordObjectRsult)||!empty($errors))
    // {
    //     $errors['old-wrong']="<div class='alert alert-danger'>Wrong Password!.</div>";
    // }

    $userData->setPassword($_POST['old-password']);
    if ($userData->getPassword() != $_SESSION['user']->password) {
        $errors['old-wrong'] = "<div class='alert alert-danger'>The Old Password Are Wrong...!</div>";
    }
    $newPassword = new registerRequest;
    $newPassword->setPassword($_POST['new-password']);
    $newPassword->setConfirmpassword($_POST['confirmpassword']);
    $newPasswordResult = $newPassword->passwordValidation();
    if (empty($newPasswordResult) && empty($oldPasswordResult) && empty($errors)) {
        $userData->setPassword($_POST['new-password']);
        $result = $userData->updatePassword();
        if ($result) {
            $success['data'] = "<div class='alert alert-success'>Password Has been Updated.</div>";
        } else {
            $errors['wrong'] = "<div class='alert alert-danger'>Some Thing Went Wrong.</div>";
        }
    }
}
if (isset($_POST['change-email'])) {
    $emailValidation = new registerRequest;
    $emailValidation->setEmail($_POST['email']);
    $emailValidationResult = $emailValidation->emailValidation();
    if (empty($emailValidationResult)) {
        if ($_POST['email'] == $_SESSION['user']->email) {
            $errors['old-email'] = "<div class='alert alert-danger'>Email not Changed.</div>";
        } else {
            $userData->setEmail($_POST['email']);
            $emailExistResult = $userData->chekIfEmailExists();
            if ($emailExistResult) {
                $errors['email-unique'] = "<div class='alert alert-warning'>Email Already Has Been Taken!</div>";
            } else {
                $code = rand(10000, 99999);
                $userData->setStatus(0);
                $userData->setCode($code);
                $userData->setVerified_at('NULL');
                $userData->setId($_SESSION['user']->id);
                // echo $_SESSION['email']."<br";
                $updateEmailResult = $userData->updateEmail();
                if ($updateEmailResult) {
                    //email
                    $subject = "Ecommerce-Verfication-Code-email";
                    $body = "<p>Hello " . $_SESSION['user']->first_name . "</p>
                        <p>Your Verfication Code:<b> $code</b></p>
                        <p>Thank You</p>";
                    $newmail = new mail($_POST['email'], $subject, $body);
                    $mailResult = $newmail->sendMail();
                    if ($mailResult) {
                        unset($_SESSION['user']);
                        $_SESSION['email'] = $_POST['email'];
                        header("location:check-code.php?page=profile");
                        die;
                    } else {
                        $errors['send-wrong'] = "<div class='alert alert-danger'>Try to Verify in another time.</div>";
                    }
                } else {
                    $errors['wrong'] = "<div class='alert alert-warning'>Some Thing Went Wrong.</div>";
                }
            }
        }
    }
}
$userDataResult = $userData->chekIfEmailExists();
$user = $userDataResult->fetch_object();
include_once "views/layouts/nav.php";
include_once "views/layouts/breadcrumb.php";
?>
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse <?php if (isset($_POST['update-profile'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>My Account Information</h4>
                                            <h5>Your Personal Details</h5>
                                        </div>
                                        <?php
                                        if(isset($success['update-profile']['success']))
                                        {
                                            if(!empty($success['update-profile']['success']))
                                            {
                                                echo $success['update-profile']['success'];
                                            }
                                        }

                                        if(isset($success['update-profile']['wrong']))
                                        {
                                            if(!empty($success['update-profile']['wrong']))
                                            {
                                                echo $success['update-profile']['wrong'];
                                            }
                                        }
                                        ?>
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-12">
                                                    <?php
                                                    if (isset($errors['update-profile']['all-fields'])) {
                                                        if (!empty($errors['update-profile']['all-fields'])) {
                                                            echo $errors['update-profile']['all-fields'];
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-12">
                                                    <div class="billing-info text-center ">
                                                        <img src="assets/img/users/<?php echo $user->image; ?>" alt="user image" class="col-6 rounded rounded-circle">

                                                    </div>
                                                    <div class="billing-info">
                                                        <input type="file" name="image">
                                                    </div>
                                                    <?php
                                                    if (isset($uploadImageSizeErrors)) {
                                                        if (!empty($uploadImageSizeErrors)) {
                                                            echo $uploadImageSizeErrors['size'];
                                                        }
                                                    }
                                                    if (isset($uploadImageExtensionErrors)) {
                                                        if (!empty($uploadImageExtensionErrors)) {
                                                            echo $uploadImageExtensionErrors['extension'];
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label for="fname">First Name</label>
                                                        <input type="text" name="fname" id="fname" value="<?php echo $user->first_name; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label for="lname">Last Name</label>
                                                        <input type="text" name="lname" id="lname" value="<?php echo $user->last_name; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label for="phone">phone</label>
                                                        <input type="phone" name="phone" id="phone" value="<?php echo $user->phone; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="billing-info">
                                                        <label for="gender">Gender</label>
                                                        <select name="gender" id="gender">
                                                            <option value="m" <?php echo ($user->gender == 'm') ? "selected" : " ";  ?>>Male</option>
                                                            <option value="f" <?php echo ($user->gender == 'f') ? "selected" : " ";  ?>>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="update-profile">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <?php
                            if (isset($success['data'])) {
                                if (!empty($success['data'])) {
                                    echo $success['data'];
                                }
                            }
                            if (isset($errors['wrong'])) {
                                if (!empty($errors['wrong'])) {
                                    echo $errors['wrong'];
                                }
                            }

                            ?>
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                            </div>
                            <div id="my-account-2" class="panel-collapse collapse <?php if (isset($_POST['change-password'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Password</h4>
                                            <h5>Your Password</h5>
                                        </div>
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <?php
                                                    if(isset($errors['old-equal-new']))
                                                    {
                                                        if(!empty($errors['old-equal-new']))
                                                        {
                                                            echo $errors['old-equal-new'];
                                                        }
                                                    }
                                                     ?>
                                                    <div class="billing-info">
                                                        <label for="old-password">Old Password</label>
                                                        <input type="password" name="old-password" id="old-password">
                                                    </div>
                                                    <?php
                                                    if (!empty($oldPasswordResult)) {
                                                        foreach ($oldPasswordResult as $k => $v) {
                                                            echo $v;
                                                        }
                                                    }
                                                    if (isset($errors['old-wrong'])) {
                                                        if(!empty($errors['old-wrong']))
                                                        {
                                                            echo $errors['old-wrong'];
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label for="new-password">New Password</label>
                                                        <input type="password" name="new-password" id="new-password">
                                                    </div>
                                                    <?php
                                                    if (isset($newPasswordResult['password-required'])) {
                                                        echo $newPasswordResult['password-required'];
                                                    }
                                                    if (isset($newPasswordResult['password-pattern'])) {
                                                        echo $newPasswordResult['password-pattern'];
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label for="confirmpassword">Password Confirm</label>
                                                        <input type="password" name="confirmpassword" id="confirmpassword">
                                                    </div>
                                                    <?php
                                                    if (isset($newPasswordResult['confirmpassword-required'])) {
                                                        echo $newPasswordResult['confirmpassword-required'];
                                                    }
                                                    if (isset($newPasswordResult['password-confirm'])) {
                                                        echo $newPasswordResult['password-confirm'];
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-password">change password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Modify your Email Address </a></h5>
                            </div>
                            <div id="my-account-3" class="panel-collapse collapse <?php if (isset($_POST['change-email'])) {
                                                                                        echo "show";
                                                                                    } ?>">
                                <div class="panel-body">
                                    <div class="billing-information-wrapper">
                                        <div class="account-info-wrapper">
                                            <h4>Change Email</h4>
                                        </div>
                                        <form method="post">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="billing-info">
                                                        <label for="email">Email</label>
                                                        <input type="email" name="email" id="email" value="<?php echo $user->email; ?>">
                                                    </div>
                                                    <?php
                                                    if (isset($emailValidationResult)) {
                                                        if (!empty($emailValidationResult)) {
                                                            foreach ($emailValidationResult as $k => $v) {
                                                                echo $v;
                                                            }
                                                        }
                                                    }
                                                    if (isset($errors)) {
                                                        if (!empty($errors)) {
                                                            foreach ($errors as $k => $v) {
                                                                echo $v;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class=" billing-back-btn">
                                                <div class="billing-btn">
                                                    <button type="submit" name="change-email">change Email</button>
                                                </div>
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
</div>
<?php
include_once "views/layouts/footer.php";
?>