<?php

function insert_category(){
    global $connection;
    if(isset($_POST["submit"])){
        $cat_title = $_POST["cat_title"];

        if($cat_title =="" || empty($cat_title)){
            echo "<h1> This feild should not be empty </h1>";
        }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}') ";

            $create_category = mysqli_query($connection,$query);
            if(!$create_category) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
    }
}


function findAllCategories() {
    global $connection;
    $query = "SELECT * FROM categories";
    $result_categories_admin = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($result_categories_admin)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>" . $cat_id . "</td>";
        echo "<td>" . $cat_title . "</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "<tr>";

    }
}

function deleteCategories() {
    global $connection;
    if (isset($_GET["delete"])) {
        $the_cat_id = $_GET["delete"];
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection,$query);
        header("Location: categories.php");
    }


}



