<?php
include('../includes/connect.php');
if (isset($_POST['insert_cat'])) {

    // select data from database
    $select_query = "SELECT * FROM categories where categories_title = '$_POST[cat_title]'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('Category already exist, please try another one!')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";
    } else {
        // insert data into database
        $categories_title = $_POST['cat_title'];
        $inser_query = "INSERT INTO categories (categories_title) VALUES ('$categories_title')";
        $result = mysqli_query($con, $inser_query);
        if ($result) {
            echo "<script>alert('Category has been inserted!')</script>";
            echo "<script>window.open('index.php?insert_category', '_self')</script>";
        }
    }
}
?>

<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class=" bg-info border-0 p-2 mg-3" name="insert_cat" value="Insert Categories">

    </div>
</form>