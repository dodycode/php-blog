<?php
include('../db.php');

if (isset($_POST['post_title']) 
	&& isset($_FILES['post_cover']) 
	&& isset($_POST['post_category'])
	&& isset($_POST['post_content'])) {

	$postTitle = $_POST['post_title'];
	$postCategory = $_POST['post_category'];
	$postContent = mysqli_real_escape_string($conn, $_POST['post_content']);
	$createdAt = date('Y-m-d');

	//move uploaded files
	$currentLoc = $_FILES['post_cover']['tmp_name'];
	$destination = "assets/img/".$_FILES['post_cover']['name'];

	$moveFile = move_uploaded_file($currentLoc, "../../".$destination);

	if ($moveFile) {
		$query = "INSERT INTO posts(post_title, post_cover, post_content, category_id, created_at)
		VALUES('$postTitle', '$destination', "$postContent", '$postCategory', '$createdAt')";

		$execute = mysqli_query($conn, $query);

		if ($execute) {
			echo "
		        <script type='text/javascript'>
		            alert('Post successfully published!');

		            window.location.href = '/dashboard.php';
		        </script>
		    ";
		}else{
			echo "
		        <script type='text/javascript'>
		            alert(`".mysqli_error($conn)."`);

		            window.location.href = '/dashboard.php?page=add';
		        </script>
		    ";
		}
	}
}else{
	echo "
        <script type='text/javascript'>
            alert('Please fill all data before insert new post');

            window.location.href = '/dashboard.php?page=add';
        </script>
    ";
}

mysqli_close($conn);