<?php
if (isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;

    move_uploaded_file($post_image_temp,"images/$post_image" );

//
//    $query ="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status) ";
//    $query .="VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}',{$post_comment_count},'{$post_status}' ";


    $query = "INSERT INTO posts(post_category_id,post_author,post_title,post_date,post_status,post_tags,post_content,post_comment_count,post_image) ";
    $query .= "VALUE ({$post_category_id},'{$post_author}','{$post_title}',now(),'{$post_status}','{$post_tags}','{$post_content}',{$post_comment_count},'{$post_image}')";

    $create_post_query = mysqli_query($connection,$query) ;

    if (!$create_post_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }



}



?>









<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post title</label>
        <input type="text" class="form-control" name="post_title">
    </div>


    <div class="form-group">
        <select name="post_category" id="">
            <?php

            $query = "SELECT * FROM categories";
            $result_categories_admin = mysqli_query($connection,$query);

            while ($row = mysqli_fetch_assoc($result_categories_admin)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }




            ?>

        </select>

    </div>


    <div class="form-group">
        <label for="post_author">Post author</label>
        <input type="text" class="form-control" name="post_author">
    </div>


    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" class="form-control" name="post_status">
    </div>


    <div class="form-group">
        <label for="post_image">Post image</label>
        <input type="file"  name="post_image">
    </div>


    <div class="form-group">
        <label for="post_tags">Post tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>


    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10">
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Create Post">
    </div>

</form>
