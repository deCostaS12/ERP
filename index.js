let customerForm = document.getElementById("customerForm");
let itemForm = document.getElementById("itemForm");


function showCustomerList(){

    let customerList = document.getElementById("customer_list");

    if(customerList.style.display == "none"){

        customerList.style.display = "block";

    }else{

        customerList.style.display = "none";
    }



}

function showItemList(){

    let itemList = document.getElementById("item_list");

    if(itemList.style.display == "none"){

        itemList.style.display = "block";

    }else{

        itemList.style.display = "none";
    }
}


function showCustomerForm(){

    itemForm.style.display = "none";
    customerForm.style.display = "block";
}


function showItemForm(){

    customerForm.style.display = "none";
    itemForm.style.display = "block";

}    