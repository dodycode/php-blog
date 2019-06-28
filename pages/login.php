<main class="flex justify-center items-center" style="height: 510px;">
	<div class="w-full max-w-xs">
	  <form method="post" action="../app/login.php" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
	    <div class="mb-4">
	      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
	        Username
	      </label>
	      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" name="username" required />
	    </div>
	    <div class="mb-6">
	      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
	        Password
	      </label>
	      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="x x x x x x" name="password" required />
	    </div>
	    <div class="flex items-center justify-between">
	      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">
	        Login
	      </button>
	    </div>
	  </form>
	</div>
</main>