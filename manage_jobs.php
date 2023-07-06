<?php
session_start();
include_once('./config/config.php');


$userid = $_SESSION['User_ID'];

$query = "SELECT * FROM job_vacancy WHERE user_id = '$userid'";

$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage Jobs</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="./src/styles/manage_jobs.css">
</head>

<body>
    <h1 class="manage-title">Manage Jobs</h1>
    <div class="hero">
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo '<table>
                        <tr>
                            <th>Job ID</th>
                            <th>company</th>
                            <th>Job Title</th>
                            <th>discription</th>
                            <th>Job Type</th>
                            <th>Job Location</th>
                            <th>Action</th>
                        </tr>';

            while ($row = mysqli_fetch_assoc($result)) {
                $jobid = $row['job_id'];
                $company = $row['company'];
                $jobtitle = $row['job_title'];
                $description = $row['job_description'];
                $jobtype = $row['job_type'];
                $location = $row['job_location'];

                echo '<tr>';
                echo '<td>' . $jobid . '</td>';
                echo '<td>' . $company . '</td>';
                echo '<td>' . $jobtitle . '</td>';
                echo '<td>' . $description . '</td>';
                echo '<td>' . $jobtype . '</td>';
                echo '<td>' . $location . '</td>';
                echo '<td><a class="btn btn-delete" name="delete" href="manage_jobs.php?id=' . $jobid . '">Delete</a></td>';
                echo '<td><a class="btn btn-update" name="update" href="showjobdetailsdash.php?id=' . $jobid . '">Update</a></td>';
                echo '</tr>';

                // echo "<tr>
                //          <form action='manage_job.php' method='get'>
                //             <td>$jobid.</td>
                //             <td>$company</td>
                //             <td>$jobtitle</td>
                //             <td>$description</td>
                //             <td>$jobtype</td>
                //             <td>$location</td>

                //             <td><button type='submit' name='delete'><a class='btn btn-delete' name='delete' href='manage_jobs.php?id=' $jobid  '>Delete</a></button></td>
                //             <td><button type='submit' name ='update'><a class='btn btn-delete' name='update' href='update_job.php?id=' $jobid  '>update</a></button></td>
                //         </form>
                //     </tr>";
            }

            echo '</table>';
        } else {
            echo '<p>No posted jobs found.</p>';
        }
        ?>
        <!-- delete job vacancy -->
        <?PHP

        if (isset($_GET['id'])) {

            $job_id = $_GET['id'];
            $user_id = $_SESSION['User_ID'];

            $sql_save = "DELETE FROM job_vacancy WHERE job_id = '$job_id' ";
            $result = $con->query($sql_save);

            if ($result) {
                $message = "Delete job successfully";
                goBack();
                echo "<script>
                      alert('$message');
                     </script>";
            } else {
                echo mysqli_error($con);
            }
        }

        ?>



        <?php
        function goBack()
        {
            echo "<script>
            window.history.back();
          </script>";
        }
        ?>


    </div>
</body>

</html>