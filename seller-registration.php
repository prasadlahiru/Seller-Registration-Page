<?php

@include 'config.php';

if (isset($_POST['submit'])) {


    $name = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = "SELECT * FROM user_form WHERE email='$email'";

    $result = mysqli_query($connection, $select);


    if (mysqli_num_rows($result) > 0) {
        $error1 = '* Email already in use!';
    } else {
        if ($pass != $cpass) {
            $error2 = '* Password not matching! ';
        } else {
            $insert = "INSERT INTO user_form(Name,Email,Password) VALUES ('$name','$email','$pass')";
            mysqli_query($connection, $insert);
            header('location:login.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles/footer.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/seller-registration.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Seller registration - HOPEE</title>
</head>

<body>
    <div class="form-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h3>Register Now</h3>

            <div class="form-field fname-field">
                <div class="input-field">
                    <input type="text" name="fname" required placeholder="First Name" />
                </div>
            </div>

            <div class="form-field lname-field">
                <div class="input-field">
                    <input type="text" name="lname" required placeholder="Last Name" />
                </div>
            </div>

            <div class="form-field">
                <div class="input-field username-field">
                    <input type="text" name="username" required placeholder="Enter your username" />
                </div>
            </div>

            <div class="form-field email-field">
                <div class="input-field">
                    <input type="email" class="email" name="email" required placeholder="Enter your email" />
                </div>
                <span class="error email-error">
                    <i class='bx bx-error-circle error-icon'></i>
                    <p class="error-text">Enter a valid email address</p>
                </span>
                <?php
                if (isset($error1)) { {
                        echo '<span class="error-msg">' . $error1 . '</span>';
                    };
                };
                ?>
            </div>
            <h3 class="store-details">Tell us about your business</h3>

            <div class="form-field">
                <div class="input-field sname-field">
                    <input type="text" name="store-name" id="store-name" required placeholder="Enter your store name" oninput="storeName()" />
                </div>
                <h5 id="storeName"></h5>
            </div>

            <div class="form-field">
                <div class="input-field address-field">
                    <input type="text" name="address" required placeholder="Enter your address" />
                </div>
            </div>
            <div class="form-field">
                <div class="input-field state-field">
                    <input type="text" name="state" required placeholder="State" />
                </div>
            </div>

            <div class="form-field">
                <div class="input-field postcode-field">
                    <input type="text" pattern="[0-9]{5}" name="postcode" required placeholder="Postcode/Zip" />
                </div>
            </div>

            <div class="form-field">
                <div class="input-field mobile-field">
                    <input type="tel" name="mobile" required placeholder="Enter your mobile number" />
                </div>
            </div>

            <div class="form-field">
                <div class="input-field product-field">
                    <input type="text" name="productF" required placeholder="What do you want to sell" />
                </div>
            </div>

            <div class="form-field password-field">
                <div class="input-field">
                    <input type="password" class="password" id="passShow" name="password" required placeholder="Enter your password" />
                    <!--<button class="showPass" onclick="showPass()">Show Password</button>-->
                    <i class='bx bx-hide show-hide'></i>
                </div>
                <span class="error email-error">
                    <i class='bx bx-error-circle error-icon'></i>
                    <p class="error-text">Password must contain at least one number,one uppercase and lowercase letter, one special character and at least 8 or more characters</p>
                </span>
            </div>

            <div class="form-field cpassword-field">
                <div class="input-field">
                    <input type="password" class="cpassword" id="cpassShow" name="cpassword" required placeholder="Confirm your password" />
                    <i class='bx bx-hide show-hide'></i>
                    <i class='bx bxs-check-circle check-ok'></i>
                </div>
                <span class="error cPassword-error">
                    <i class='bx bx-error-circle error-icon'></i>
                    <p class="error-text">Password don't match</p>
                </span>
            </div>

            <div class="privacy-text">
                <input type="checkbox" class="privacy" name="privacyF" required />
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            </div>

            <div class="input-field button">
                <input type="submit" name="submit" value="Register Now" class="form-btn">
            </div>

            <div class="form-footer">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </form>
    </div>

    <script src="scripts/registration.js"></script>
</body>

</html>