<?php session_start();
?>

<?php

//Including Database Connection From config.php file to avoid rewriting in all files
require_once("./config/config.php");
?>
<?php

if (isset($_POST['login'])) {


    $username = ($_POST['username']);
    $password = ($_POST['password']);

    $query = "SELECT * FROM tbl_user WHERE user_name = '{$username}' AND password = '{$password}' LIMIT 1";

    $ShowResult = mysqli_query($con, $query);

    if ($ShowResult) {

        if (mysqli_num_rows($ShowResult) == 1) {

            $user = mysqli_fetch_assoc($ShowResult);
            $_SESSION['User_ID'] = $user['id'];
            $_SESSION['User_Name'] = $user['first_name'];
            header("Location: dashboard.php");          //redirect to dashboard page after the log

        } else {

            echo '<script type="text/javascript">
                      window.onload = function () {alert("Please Check your email or password");
                      window.history.back();    
                    }
                </script>';
        }
    }
}

?>