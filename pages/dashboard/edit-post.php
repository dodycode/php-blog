<?php
	if (!isset($_GET['id'])) {
		header('Location: dashboard.php');
	}

	$id = $_GET['id'];

	$categories = mysqli_query($conn, "SELECT * FROM categories");
	$posts = mysqli_query($conn, "SELECT * FROM posts where id = $id");

	$selectedPost = mysqli_fetch_assoc($posts);
?>
<main class="w-full">
	<div class="max-w-6xl my-10 mx-auto">
		<div class="bg-white w-2/3 px-4 pt-8 pb-5 mx-auto">	
			<form method="POST" action="app/dashboard/edit-post.php?id=<?php echo $selectedPost['id']; ?>" enctype="multipart/form-data">
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Title
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="post_title" type="text" value="<?php echo $selectedPost['post_title']; ?>" required>
			    </div>
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Thumbnails
			      </label>
			      <input type='file' id="post_cover" name="post_cover" accept="image/*" />
			      <small class="block"><b>Note:</b> Lewatkan saja bagian ini jika tidak ada perubahan pada cover!</small>
			    </div>
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Category
			      </label>
			      <select class="cursor-pointer bg-white shadow border rounded w-full py-2 px-3 leading-tight" id="post_category" name="post_category" required>
			      	<option value="" hidden="" selected>Post Category</option>
			      	<?php while($category = mysqli_fetch_assoc($categories)): ?>
			      	<option value="<?php echo $category['id']; ?>" <?php echo $selectedPost['category_id'] === $category['id'] ? 'selected' : ''; ?>><?php echo $category['name']; ?></option>
			      	<?php endwhile; ?>
			      </select>
			    </div>
			    <div class="mb-6">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Content
			      </label>
			      <textarea rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Post Content" id="post_content" name="post_content" required><?php echo $selectedPost['post_content'] ?></textarea>
			    </div>
			    <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
			        Save Edit
			    </button>
	  		</form>
		</div>
	</div>
</main>