<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ERP System</title>
</head>
<body>
    <!-- Header -->
    <div class="header">

    <div id="title">ERP System</div>

    <div id="navigation">
        <button class="navBtn" id="customerBtn" onclick="showCustomerForm()">Customer</button>
        <button class="navBtn" id="itemBtn"onclick="showItemForm()">Item</button>
        <button class="navBtn" id="reportsBtn">Reports</button>
    </div>

    </div>


    <!-- Forms that change according to button press -->

    <div id="customerForm" style="display:none">
        <form id="customerFormTitle" action = "customer.php" method="post" targert="_blank">
            <label >1. Select Title:</label>
            <br>
            <input class="formElement"  type="radio" name="title" value="Mr" checked>
            <label> Mr</label>
            <input class="formElement"  type="radio" name="title" value="Mrs" >
            <label> Mrs</label>
            <input class="formElement" type="radio" name="title" value="Miss">
            <label> Miss</label>
            <input class="formElement" type="radio" name="title" value="Dr">
            <label> Dr</label>
            <br>

            <label> 2. Enter First Name:</label><br>
            <input class="formElement"  type="text" minlength="2" maxlength="15" name="fName" required>
            <br>

            <label>3. Enter Middle Name:</label><br>
            <input class="formElement"  type="text"  name="mName">
            <br>

            <label>4. Enter Last Name:</label><br>
            <input class="formElement"  type="text" minlength="2" maxlength="15" name="lName" required>
            <br>

            <label>5. Enter Contact Number:</label><br>
            <input class="formElement" type="tel" pattern="0[0-9]{9}" name="telNo" placeholder="Ex:- 0770625874" required>
            <br>

            <label>6. Select your district:</label><br>
             <select  class="formElement" id="district_dd" name="district" required>
                
                <!-- Reading the list of distrcts from the district table in the DB and displaying it as a drop down list -->
                <?php

                require_once('config.php');

                $sql = "SELECT district,id from district";
                $result = $conn->query($sql);

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){

                        $id = $row["id"];
                        $district = $row["district"];

                        echo "<option value='". $id ."'>".$district."</option> ";
                        

                    }


                }else{

                }


                ?>
            
            </select><br>

            <input class="formElement" type="submit" name="regCustomer" value="Add Customer">

        </form>

        <button class="formElement"  onclick="showCustomerList()">Show/Hide Customer List</button>

        <div id="customer_list" style="display:none">

        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Name</th>
                <th>Contact No.</th>
                <th>District No.</th>
            </tr>
            <?php
            require_once('config.php');
            $sql4 = "SELECT * FROM customer";
            $result4 = $conn->query($sql4); 

            if($result4->num_rows>0){
                while($row4 = $result4->fetch_assoc()){
                    $id4 = $row4["id"];
                    $title = $row4["title"];
                    $fname = $row4["first_name"];
                    $mname = $row4["middle_name"];
                    $lname = $row4["last_name"];
                    $tel_no = $row4["contact_no"];
                    $district = $row4["district"];

                    echo "<tr><td>".$id4."</td>";
                    echo "<td>".$title."</td>";
                    echo "<td>".$fname." ".$mname." ".$lname." </td>";
                    echo "<td>".$tel_no."</td>";
                    echo "<td>".$district."</td> </tr>";

                }
            }

            ?>
        </table>
        </div>


    </div>


    <div id="itemForm" style="display:none">
        <form id="itemFormTitle" action = "item.php" method="post" targert="_blank"> 
            <label>1. Enter Item Code</label>   
            <input class="formElement" type="text" minlength="3" maxlength="6" name="item_code" pattern="[A-Z]{2}[0-9]{4}" required><br>


            <label>2.. Enter Item Name</label>   
            <input class="formElement" type="text" minlength="3" name="item_name" required><br>


            <label>3. Select Item Category</label>    
            <select  class="formElement" id="item_category_dd" name="item_category" required>
                    <!-- Reading the item Categories from the DB to populate the drop down -->
                    <?php

                    require_once('config.php');

                    $sql2 = "SELECT id,category from item_category";
                    $result2 = $conn->query($sql2);

                    if($result2->num_rows>0){
                        while($row2 = $result2->fetch_assoc()){

                            $id2 = $row2["id"];
                            $category2 = $row2["category"];

                            echo "<option value='". $id2 ."'>".$category2."</option> ";
                        }
                    }else{}
                    ?>
                </select><br>

            <label>4. Select Item Sub Category</label>    
            <select class="formElement" id="item_subcategory_dd" name="item_subcategory" required>
                    <!-- Reading the item Categories from the DB to populate the drop down -->
                    <?php

                    require_once('config.php');

                    $sql3 = "SELECT id,sub_category from item_subcategory";
                    $result3 = $conn->query($sql3);

                    if($result3->num_rows>0){
                        while($row3 = $result3->fetch_assoc()){

                            $id3 = $row3["id"];
                            $category3 = $row3["sub_category"];

                            echo "<option value='". $id3 ."'>".$category3."</option> ";
                        }
                    }else{}
                    ?>
                </select><br>
                
                
            <label>5. Enter Quantity</label>
            <input class="formElement" type="number" name="item_qty" id="" min="1" required><br>

            <label>6. Enter Unit Price</label>
            <input class="formElement" type="number" name="item_price" id="" min="0.01" step="0.01" required><br>

            <input class="formElement" type="submit" name="regItem" value="Add Item to Inventory">

                </form>

                <button class="formElement" onclick="showItemList()">Show/Hide Item List</button>   
                
                <div id="item_list" style="display:none">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Name</th>
                        <th>Contact No.</th>
                        <th>District No.</th>
                    </tr>
                    <?php
                    require_once('config.php');
                    $sql5 = "SELECT * FROM item";
                    $result5 = $conn->query($sql5); 

                    if($result5->num_rows>0){
                        while($row5 = $result5->fetch_assoc()){
                            $id5 = $row5["id"];
                            $item_code = $row5["item_code"];
                            $item_category = $row5["item_category"];
                            $item_subcategory = $row5["item_subcategory"];
                            $item_name = $row5["item_name"];
                            $quantity = $row5["quantity"];
                            $unit_price = $row5["unit_price"];

                            echo "<tr><td>".$id5."</td>";
                            echo "<td>".$item_code."</td>";
                            echo "<td>".$item_category." </td>";
                            echo "<td>".$item_subcategory."</td>";
                            echo "<td>".$item_name."</td>";
                            echo "<td>".$quantity."</td>";
                            echo "<td>".$unit_price."</td></tr>";

                        }
                    }

                    ?>
                </table>
                </div>

    </div>

    <div id="reportsForm">


    
    </div>

    <script src="index.js"></script>
</body>
</html>