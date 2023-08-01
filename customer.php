<?php

    include_once'config.php';

    $title = $_POST["title"];
    $first_name = $_POST["fName"];
    $middle_name = $_POST["mName"];
    $last_name = $_POST["lName"];
    $contact_no = $_POST["telNo"];
    $district = $_POST["district"];

    $sql = "INSERT INTO customer(title,first_name,middle_name,last_name,contact_no,district) values ('$title','$first_name','$middle_name','$last_name','$contact_no','$district')";

    //executing the query

    if($conn->query($sql)){
       
        echo "inserted Succesfully";
    }
    else {
        echo "Error:".$conn->error;
    }

    $conn->close();
?>