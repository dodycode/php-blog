<?php 
	include 'app/db.php';

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	if (!isset($_SESSION['admin'])) {
	 	header('Location: index.php');
	}

	include 'partials/header.php'; 
?>
 
 <!-- Page Index -->
<?php if(!isset($_GET['page']) || $_GET['page'] == 'index'): ?>

<?php 
	$query = "SELECT posts.id, posts.post_title, posts.post_cover, posts.post_content, posts.created_at, categories.name AS 'category_name'
	FROM posts
	LEFT JOIN categories ON posts.category_id = categories.id
	order by posts.created_at DESC";

	$posts = mysqli_query($conn, $query);
?>

<main class="min-h-screen w-full">
	<div class="max-w-6xl my-10 mx-auto">
		<div class="bg-white w-3/4 px-4 py-8 mx-auto">	
			<a class="bg-purple-500 text-white px-4 py-3 rounded" href="dashboard.php?page=add">Add New Post</a>
			<div class="block mt-5">
				<table class="text-left w-full border-collapse">
			      <thead>
			        <tr>
			          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Post Title</th>
			          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Category</th>
			          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
			        </tr>
			      </thead>
			      <tbody>
			      	<?php if(mysqli_num_rows($posts) > 0): ?>

			      	<?php while($post = mysqli_fetch_assoc($posts)): ?>
			        <tr class="hover:bg-grey-lighter">
			          <td class="py-4 px-6 border-b border-grey-light"><?php echo $post['post_title']; ?></td>
			          <td class="py-4 px-6 border-b border-grey-light"><?php echo $post['category_name']; ?></td>
			          <td class="py-4 px-6 border-b border-grey-light">
			            <a href="dashboard.php?page=edit&id=<?php echo $post['id']; ?>" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-purple-500 text-white">Edit</a>
			            <a href="index.php?page=post&id=<?php echo $post['id']; ?>" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-500 text-white" target="_blank">View</a>
			            <a href="#" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-red-500 text-white">Delete</a>
			          </td>
			        </tr>
			    	<?php endwhile; ?>

			    	<?php else: ?>
			    		<tr class="hover:bg-grey-lighter">
				      		<td colspan="3" class="text-center py-4">There's no posts</td>
				      	</tr>
			    	<?php endif; ?>
			      </tbody>
			    </table>
			</div>
		</div>
	</div>
</main>
<?php endif; ?>

<?php if(isset($_GET['page'])): ?>

	<?php switch ($_GET['page']) {
		case 'add':
			include('pages/dashboard/add-post.php');
			break;
		
		case 'edit':
			include('pages/dashboard/edit-post.php');
			break;
		default:
			#none
			break;
	} ?>

<?php endif; ?>

<?php include('partials/footer.php') ?>

<?php mysqli_close($conn); ?>