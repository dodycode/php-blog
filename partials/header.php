<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="assets/css/app.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,700&display=swap" rel="stylesheet">
    <title>Dodycode's Blog</title>
    <style type="text/css">
    	body{
            font-family: 'Roboto Mono', monospace;
            color: #484848;
    	}
    </style>
</head>
<body class="bg-gray-200">
    <div class="flex flex-col w-full" id="app">
        <nav class="bg-white py-2 shadow-md">
            <div class="max-w-6xl mx-auto">
                <div class="flex justify-between">
                    <a class="mr-2" href="/">
                        <img class="w-16 mr-2" src="assets/img/navbanner.svg">
                    </a>
                    <ul class="flex items-center">
                       <li class="mx-4">
                           <a href="index.php?filter=all">All</a>
                       </li>
                       <li class="mx-4">
                           <a href="index.php?filter=courses">Courses</a>
                       </li> 
                       <li class="mx-4">
                           <a href="index.php?filter=tips">Tips</a>
                       </li>
                       <li class="<?php echo isset($_SESSION['admin']) ? 'mx-4' : 'ml-4'; ?>">
                           <a href="index.php?filter=daily-life">Daily Life</a>
                       </li>
                       <?php if(isset($_SESSION['admin'])): ?>
                        <li class="mx-4">
                          <a href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="ml-4">
                           <a href="app/logout.php">Logout</a>
                        </li>
                       <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        