<?php 
include('vendor/autoload.php');
include('classes/Bot.php');
include('classes/AmoCrmProvider.php');
include('classes/SendpulseProvider.php');
include('classes/Model.php');
include('classes/Post.php');

use Mailing\Bot;

$bot = new Bot();
$bot->uploadContactsFromAmoCrmToSendpulse();
$bot->sendPostsToSendpulseProvider();