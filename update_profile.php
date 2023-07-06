<?php
//To Handle Session Variables on This Page
session_start();
//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>
<?php

$userid = $_SESSION['User_ID'];

if (isset($_POST['Update'])) {

    //Declaring varibales and assign empty values
    $fullname = "";
    $address = "";
    $mobile = "";
    $email = "";
    $password = "";

    $fullname = input_varify($_POST['fullname']); //verify variables using function and assign checked values to variables
    $address = input_varify($_POST['address']);
    $mobile = input_varify($_POST['mobile']);
    $email = input_varify($_POST['email']);
    $username = input_varify($_POST['username']);
    $password = input_varify($_POST['password']);

    $query1 = "SELECT * FROM tbl_user WHERE id = '$userid'";

    $ShowResult = mysqli_query($con, $query1);

    if ($ShowResult) {    //check query runs correctly

        if (mysqli_num_rows($ShowResult) == 1) {

            $query = "UPDATE tbl_user 
                      SET first_name = '$fullname',address = '$address',mobile = '$mobile',email = '$email',user_name = '$username',password = '$password' 
                      WHERE id = '$userid'";

            $result = $con->query($query);
            echo $result;
            if ($result) {
                // echo '<script type="text/javascript">
                //       window.onload = function () {alert("Successfully Updated"); }
                // </script>';
                $successMessage = "Successfully Updated";
            } else {
                echo mysqli_error($con);
            }
        } else {
            echo '<script type="text/javascript">
                       window.onload = function () {alert("Update Error Cannot Updated... Try Again"); }
                </script>';
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
<?php if (isset($successMessage)) : ?>
    <script type="text/javascript">
        window.onload = function() {
            alert("<?php echo $successMessage; ?>");
            // Redirect to dashboard.php after showing the message
            window.location.href = "dashboard.php";
        }
    </script>
<?php endif; ?>