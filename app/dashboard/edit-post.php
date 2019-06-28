<?php

include('../db.php');

if (isset($_POST['post_title']) 
	&& isset($_POST['post_category'])
	&& isset($_POST['post_content'])
	&& isset($_GET['id'])) {

	$id = $_GET['id'];
	$postTitle = $_POST['post_title'];
	$postCategory = $_POST['post_category'];
	$postContent = mysqli_real_escape_string($conn, $_POST['post_content']);
	$createdAt = date('Y-m-d');

	if ($_FILES['post_cover']['size'] > 0) {
		//move uploaded files
		$currentLoc = $_FILES['post_cover']['tmp_name'];
		$destination = "assets/img/".$_FILES['post_cover']['name'];

		$moveFile = move_uploaded_file($currentLoc, "../../".$destination);
	}else{
		//get current cover
		$queryGetCurrPost = mysqli_query($conn, "SELECT post_cover FROM posts where id='$id'");
		$post_cover = mysqli_fetch_assoc($queryGetCurrPost);
		$destination = $post_cover;
	}

	$queryUpdate = "UPDATE posts SET post_title='$postTitle', post_cover='$destination', category_id='$postCategory', post_content='$postContent' WHERE id='$id'";

	$execute = mysqli_query($conn, $queryUpdate);

	if ($execute) {
		echo "
	        <script type='text/javascript'>
	            alert('Post successfully edited!');

	            window.location.href = '/dashboard.php';
	        </script>
	    ";
	}else{
		echo "
	        <script type='text/javascript'>
	            alert('".mysqli_error($conn)."');

	            window.location.href = '/dashboard.php?page=edit&id=$id';
	        </script>
	    ";
	}
}else{
	echo "
        <script type='text/javascript'>
            alert('Please fill all data before insert new post');
        </script>
    ";
}

mysqli_close($conn);