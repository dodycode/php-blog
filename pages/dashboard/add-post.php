<?php
	$categories = mysqli_query($conn, "SELECT * FROM categories");
?>
<main class="w-full">
	<div class="max-w-6xl my-10 mx-auto">
		<div class="bg-white w-2/3 px-4 pt-8 pb-5 mx-auto">	
			<form method="post" action="app/dashboard/add-post.php" enctype="multipart/form-data">
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Title
			      </label>
			      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="post_title" name="post_title" type="text" required>
			    </div>
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Thumbnails
			      </label>
			      <input type='file' id="post_cover" name="post_cover" accept="image/*" required />
			    </div>
			    <div class="mb-4">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Category
			      </label>
			      <select class="cursor-pointer bg-white shadow border rounded w-full py-2 px-3 leading-tight" id="post_category" name="post_category" required>
			      	<option value="" hidden="" selected>Post Category</option>
			      	<?php while($category = mysqli_fetch_assoc($categories)): ?>
			      	<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
			      	<?php endwhile; ?>
			      </select>
			    </div>
			    <div class="mb-6">
			      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
			        Post Content
			      </label>
			      <textarea rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Post Content" id="post_content" name="post_content" required></textarea>
			    </div>
			    <button type="submit" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
			        Publish Post
			    </button>
	  		</form>
		</div>
	</div>
</main>