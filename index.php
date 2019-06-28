<?php 
	include 'app/db.php';

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	include 'partials/header.php'; 
?>
 
 <!-- Page Index -->
<?php if(!isset($_GET['page']) || $_GET['page'] == 'index'): ?>

<?php 
	if (!isset($_GET['filter']) || $_GET['filter'] == 'all') {
		$query = "SELECT posts.id, posts.post_title, posts.post_cover, posts.post_content, posts.created_at, categories.name AS 'category_name'
		FROM posts
		LEFT JOIN categories ON posts.category_id = categories.id
		order by posts.created_at DESC";
	}elseif ($_GET['filter'] == 'courses') {
		$query = "SELECT posts.id, posts.post_title, posts.post_cover, posts.post_content, posts.created_at, categories.name AS 'category_name'
		FROM posts
		LEFT JOIN categories ON posts.category_id = categories.id
		WHERE categories.name = 'Courses'
		order by posts.created_at DESC";
	}elseif ($_GET['filter'] == 'tips') {
		$query = "SELECT posts.id, posts.post_title, posts.post_cover, posts.post_content, posts.created_at, categories.name AS 'category_name'
		FROM posts
		LEFT JOIN categories ON posts.category_id = categories.id
		WHERE categories.name = 'Tips'
		order by posts.created_at DESC";
	}elseif ($_GET['filter'] == 'daily-life') {
		$query = "SELECT posts.id, posts.post_title, posts.post_cover, posts.post_content, posts.created_at, categories.name AS 'category_name'
		FROM posts
		LEFT JOIN categories ON posts.category_id = categories.id
		WHERE categories.name = 'Daily Life'
		order by posts.created_at DESC";
	}

	$posts = mysqli_query($conn, $query);
?>

<main style="min-height: calc(100vh - 196px);" class="w-full mt-10">
	<div class="max-w-6xl flex justify-between mx-auto">

		<?php if (mysqli_num_rows($posts) > 0):	?>

		<div class="w-2/3">
			<?php while ($post = mysqli_fetch_assoc($posts)) : ?>
			<a class="block mb-5 shadow" href="index.php?page=post&id=<?php echo $post['id']; ?>">
				<div style="max-height: 500px;overflow:hidden;" class="w-full bg-purple-500 overflow-hidden">
					<img class="w-full rounded-t-sm" src="<?php echo $post['post_cover']; ?>">
				</div>
				<div class="py-5 px-5 bg-white rounded-b-sm">
					<div class="mb-4">
						<span class="text-purple-700 text-md"><?php echo $post['category_name']; ?></span> 
						<span class="text-grey text-sm">/</span> 
						<span class="text-grey text-sm"><?php echo date('F d, Y', strtotime($post['created_at'])); ?></span>
					</div>
					<h2 class="text-2xl md:text-4xl text-purple-700 leading-tight mx-0"><?php echo $post['post_title']; ?></h2>
					<p class="mt-4 leading-relaxed"><?php echo substr($post['post_content'], 0, 250) . '...'; ?></p>
					<button class="bg-purple-700 hover:bg-purple-800 text-white px-4 py-2 rounded-sm mt-4">Read More</button>
				</div>
			</a>
			<?php endwhile; ?>
		</div>
		
		<?php else: ?>

		<div class="w-2/3">
			<div class="py-5 px-4 bg-white rounded-b-sm">
				<p class="leading-relaxed">There's no posts</p>
			</div>
		</div>

		<?php endif; ?>

		<?php include('partials/sidebar.php') ?>
	</div>
</main>

<?php endif; ?>

<?php if(isset($_GET['page'])): ?>

	<?php switch ($_GET['page']) {
		case 'post':
			include('pages/post.php');
			break;
		
		case 'login':
			include('pages/login.php');
			break;

		default:
			#none
			break;
	} ?>

<?php endif; ?>

<?php include('partials/footer.php') ?>

<?php mysqli_close(); ?>