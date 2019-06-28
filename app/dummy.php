<?php
include 'db.php';

$username = 'bobo';
$password = md5('tester123');

//create table users
$query = "create table users(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    username varchar(255) NOT NULL,
    password text NOT NULL
);";

$execute = mysqli_query($conn, $query);

//create table categories
$query = "create table categories(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) NOT NULL
);";

$execute = mysqli_query($conn, $query);

//create table todo
$query = "create table posts(
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    post_title varchar(255) NOT NULL,
    post_cover varchar(255) NOT NULL,
    post_content text NOT NULL,
    category_id int(11) NOT NULL,
    created_at DATE NOT NULL
);";

$execute = mysqli_query($conn, $query);

//insert dummy users
$query = "insert into users(username,password) values('$username','$password');";

$execute = mysqli_query($conn, $query);

//insert dummy categories
$query = "insert into categories(name) values
('Courses'),
('Tips'),
('Daily Life');";

$execute = mysqli_query($conn, $query);

if($execute){
    echo "
        <script type='text/javascript'>
            alert('Table successfully created and seeded!');

            window.location.href = '/';
        </script>
    ";
}