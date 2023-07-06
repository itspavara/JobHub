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
    <link rel="stylesheet" href="./src/styles/upload_cv.css">
</head>


<body>
    <div class="hero">
        <form action="upload_cv.php" method="POST" enctype="multipart/form-data" class="form-box">
            <input type="file" name="file">
            <input type="submit" name="upload" value="Upload CV">
        </form>

    </div>
</body>


</html>


<?php

$userid = $_SESSION['User_ID'];
$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if (isset($_POST["upload"]) && !empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('pdf', 'doc', 'docx');

    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (isset($_FILES["file"]) && $_FILES["file"]["error"] === 0 && move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $insertQuery = "INSERT INTO cv (file_data, user_id, upload_date) VALUES ('$fileName', '$userid', NOW())";

            $insert = $con->query($insertQuery);

            if ($insert) {
                $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
echo "<script>
        window.history.back();
    </script>";
?>