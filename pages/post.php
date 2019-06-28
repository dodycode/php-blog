<?php 
	if(!isset($_GET['id'])){
		header('Location: index.php');
	}
	$id = $_GET['id'];
	$query = "SELECT posts.post_title, posts.post_cover, posts.post_content, posts.created_at, categories.name AS 'category_name'
	FROM posts
	LEFT JOIN categories ON posts.category_id = categories.id
	WHERE posts.id = '$id';";

	$queryPost = mysqli_query($conn, $query);

	$post = mysqli_fetch_assoc($queryPost);
?>
<main class="w-full mt-10">
	<div class="max-w-6xl flex justify-between mx-auto">
		<div class="w-2/3">
			<div class="block mb-5 shadow">
				<div class="py-5 px-5 bg-white rounded-b-sm">
					<div class="mb-4">
						<span class="text-purple-700 text-md"><?php echo $post['category_name']; ?></span> 
						<span class="text-grey text-sm">/</span> 
						<span class="text-grey text-sm"><?php echo date('F d, Y', strtotime($post['created_at'])); ?></span>
					</div>
					<h2 class="text-2xl md:text-4xl text-purple-700 leading-tight my-5 mx-0"><?php echo $post['post_title']; ?></h2>
					<div style="max-height: 500px;overflow:hidden;" class="w-full bg-purple-500 overflow-hidden my-4">
						<img class="w-full rounded-t-sm" src="<?php echo $post['post_cover']; ?>">
					</div>
					<p class="mt-4 leading-relaxed"><?php echo $post['post_content']; ?></p>
				</div>
			</div>
		</div>
		<?php include('partials/sidebar.php') ?>
	</div>
</main>