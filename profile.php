<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./src/styles/header.css">
    <link rel="stylesheet" href="./src/styles/footer.css">
    <link rel="stylesheet" href="./src/styles/profile.css">
</head>

<body>
    <?php
    $userid = $_SESSION['User_ID'];

    $fullname = "";
    $address = "";
    $mobile = "";
    $email = "";
    $username = "";
    $password = "";

    $query1 = "SELECT * FROM tbl_user WHERE id = '{$userid}' LIMIT 1";

    $ShowResult = mysqli_query($con, $query1);

    if ($ShowResult) {
        if (mysqli_num_rows($ShowResult) == 1) {
            $user = mysqli_fetch_assoc($ShowResult);

            $fullname = $user['first_name'];
            $address = $user['address'];
            $mobile = $user['mobile'];
            $email = $user['email'];
            $username = $user['user_name'];
            $password = $user['password'];

            echo '    <div class="hero">
                                <form action="update_profile.php" method="POST" class="form-box">
                                    <label> Full Name      </label><input type="text" name="fullname" value="' . $fullname . '" ><br>
                                    <label> Address        </label><input type="text" name="address" value="' . $address . '" ><br>
                                    <label> Contact Number </label><input type="text" name="mobile" value="' . $mobile . '" ><br>
                                    <label> Email Address  </label><input type="text" name="email" value="' . $email . '" ><br>
                                    <label> User Name      </label><input type="text" name="username" value="' . $username . '" ><br>
                                    <label> Password       </label><input type="text" name="password" value="' . $password . '" ><br>
                                    <input type="submit" name= "Update" value="Update">
                                </form>
                            </div> ';
        } else {

            echo '<script type="text/javascript">
                              window.onload = function () {alert("Error No Record"); }
                  </script>';
        }
    }
    ?>
</body>

</html>