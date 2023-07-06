<?php

//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>

<?php

if (isset($_POST['submit'])) {

    //Declaring varibales and assign empty values
    $fullname = "";
    $address = "";
    $mobile = "";
    $email = "";
    $username = "";
    $password = "";

    $fullname = input_varify($_POST['fullname']); //verify variables using function and assign checked values to variables
    $address = input_varify($_POST['address']);
    $mobile = input_varify($_POST['mobile']);
    $email = input_varify($_POST['email']);
    $username = input_varify($_POST['username']);
    $password = input_varify($_POST['password']);


    $query1 = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND email = '{$email}'";

    $ShowResult = mysqli_query($con, $query1);

    if ($ShowResult) {    //check query runs correctly

        if (mysqli_num_rows($ShowResult) == 1) {

            echo '<script type="text/javascript">
                       window.onload = function () {alert("Sorry! This user already have in this system"); }
                </script>';
        } else {
            $query = "INSERT INTO tbl_user(first_name,address,mobile,email,user_name,password,reg_date) VALUES(
                    '{$fullname}','{$address}','{$mobile}','{$email}','{$username}','{$password}', NOW())";

            $result = mysqli_query($con, $query);

            if ($result) {
                echo '<script type="text/javascript">
                          window.onload = function () {alert("Registration Successfully"); }
                    </script>';
            } else {
                echo mysqli_error($conn);
            }
        }
    }
}

function input_varify($data)
{
    //Remove empty space from user input
    $data = trim($data);
    //Remove back slash from user input
    $data = stripslashes($data);
    //conver special chars to html entities
    $data = htmlspecialchars($data);

    return $data;
}

?>
<?php
include('log.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="./src/styles/sign.css">
    <link rel="stylesheet" href="./src/styles/header.css">
    <link rel="stylesheet" href="./src/styles/footer.css">

    <title>Sign up</title>
</head>
<?php require_once("./header.php") ?>

<body>
    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <div class="social-icons">
                <img src="./src/images/fb.png">
                <img src="./src/images/tw.png">
                <img src="./src/images/gp.png">
            </div>
            <form id="login" class="input-group" action="log.php" method="POST">
                <input type="text" name="username" class="input-field" placeholder="User Name" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span> Remember Password </span>
                <button type="submit" name="login" class="submit-btn"> Log In </button>
            </form>


            <form id="register" class="input-group" action="sign_up.php" method="POST">
                <input type="text" name="fullname" class="input-field" placeholder="Full Name" required>
                <input type="text" name="address" class="input-field" placeholder="Address" required>
                <input type="text" name="mobile" class="input-field" placeholder="Mobile Number" required>
                <input type="email" name="email" class="input-field" placeholder="Email Address" required>
                <input type="text" name="username" class="input-field" placeholder="User Name" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box" required><span> I agree to the terms & conditions </span>
                <button type="submit" name="submit" class="submit-btn"> Register </button>
            </form>
        </div>

    </div>



    <script src="./src/js/sign_up.js"></script>
</body>
<?php require_once("./footer.php") ?>

</html>