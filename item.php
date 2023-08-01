<?php

    include_once'config.php';

    $item_name = $_POST["item_name"];
    $item_code = $_POST["item_code"];
    $item_category = $_POST["item_category"];
    $item_subcategory = $_POST["item_subcategory"];
    $item_qty = $_POST["item_qty"];
    $item_price = $_POST["item_price"];

    $sql = "INSERT INTO item(item_code,item_category,item_subcategory,item_name,quantity,unit_price) values ('$item_code','$item_name','$item_category','$item_subcategory','$item_qty','$item_price')";

    //executing the query

    if($conn->query($sql)){
       
       echo "inserted Succesfully";
        
        sleep(5);
        header('Location:index.php');
        
    }
    else {
        echo "Error:".$conn->error;
    }

    $conn->close();
?>