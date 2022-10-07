<?php

$servername = "localhost";
$username = $_SERVER['HTTP_HOST'] == "localhost" ? "root" : "anjali_user";
$password = $_SERVER['HTTP_HOST'] == "localhost" ? "" : "POu0tX@efc.5";
$database = $_SERVER['HTTP_HOST'] == "localhost" ? "school" : "anjali_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

/*
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully"; */
