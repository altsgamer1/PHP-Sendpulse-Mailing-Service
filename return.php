<?php 
include('classes/Model.php');
include('classes/Post.php');

use Mailing\Post;

$bot = new Post();
$bot->setNewPostAfterNineMonths();