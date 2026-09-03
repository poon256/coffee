<?php
session_start();
include 'connect';

$name = trim($_POST['name']);
$typ = trim($_POST['typ']);
$category = trim($_POST['category']);
$buy = trim($_POST['buy']);
$sale = trim($_POST['sale']);
$cp = trim($_POST['cp']);
$img = $_FILES($_POST['img']);

$image_tmp = $_FILES['img'];
$folder = 'img';
$image_location = $folder . $img;

$query = mysqli_query($conn, "INSERT INTO stock (name,type,category,buy,sale,cp,img) VALUE ('{$name}','{$typ}','{$category}','{$buy}','{$sale}','{$img}')") or die('query failed');

if(query){
    move_uploaded_file($image_tmp,$image_location);

    $_SESSION['message'] = 'product saved success';
    header('location: ' . $base_url . '/index.php')

}
else{
    $_SESSION['message'] = 'product could not be saved';
    header('location: ' . $base_url . '/index.php');
}