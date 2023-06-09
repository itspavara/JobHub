<?php

//Create New Database Connection
$con = new mysqli("localhost", "root", "", "jobportal");

//Check Connection
if ($con->connect_error) {
  die("Connection failed" . $con->connect_error);
}
