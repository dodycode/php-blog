<?php 
	$query = "SELECT posts.id, posts.post_title, posts.post_cover, posts.post_content
	FROM posts
	order by posts.created_at DESC";

	$posts = mysqli_query($conn, $query);
?>

<div class="w-1/3 pl-4">
	<div class="bg-white py-5 px-4 mb-4 shadow rounded-sm">
		<form class="flex" method="get" action="/search" autocomplete="off">
			<input type="search" name="q" placeholder="Cari Sesuatu..." class="w-full py-2 px-2 border focus:outline-none rounded rounded-r-none text-sm">
			<button class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded rounded-l-none" type="submit">Cari</button>
		</form>
	</div>
	<div class="bg-white py-5 px-4 mb-4 shadow rounded-sm">
		<h1 class="text-lg mb-5">Latest Posts</h1>
		<?php if(mysqli_num_rows($posts) > 0): ?>

		<?php while ($sidebarPost = mysqli_fetch_assoc($posts)) : ?>
		<a href="index.php?page=post&id=<?php echo $sidebarPost['id']; ?>">
			<div class="flex mb-4">
				<div class="mr-5 w-24">
					<img src="<?php echo $sidebarPost['post_cover']; ?>">
				</div>
				<div>
					<h2 class="text-sm"><?php echo substr($sidebarPost['post_content'], 0, 50) . '...'; ?></h2>
					<span class="text-sm">Read More</span>
				</div>
			</div>
		</a>
		<?php endwhile; ?>

		<?php else: ?>

		<p class="text-sm">There's no posts</p>

		<?php endif; ?>
	</div>
</div>