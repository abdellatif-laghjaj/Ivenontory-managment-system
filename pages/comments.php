<?php
include "../db/connection.php";
session_start();
$comment_body = "";
$customer_id = "";
$product_id = "";


if (isset($_SESSION['customerID'])) {
    $comment_body = $_GET['comment_body'];
    $customer_id = $_SESSION['customerID'];
    $product_id = $_GET['productID'];
    $customer_id = $_SESSION['customerID'];
} else {
    header("Location: index.php");
    echo ' <script>alert("Please login first!");</script> ';
}

//check if the comment is empty
if (empty($comment_body)) {
    echo ' <script>
 if(confirm("Comment is empty!...Please enter your comment!")){
    window.location.href="view_product.php?id=' . $product_id . '";
 }else{
    window.location.href="view_product.php?id=' . $product_id . '";
 }
</script > ';
} else {
    //insert comment
    $sql = "INSERT INTO comment (comment_body, customer_id, product_id) VALUES ('$comment_body', '$customer_id' , '$product_id')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header("Location: view_product.php?id=$product_id");
    } else {
        echo ' <script>
        window.location.href = "view_product.php?id=$product_id";
        alert("Error" + mysqli_error($con));
    </script > ';
    }
}
