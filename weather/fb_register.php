<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');


include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
require __DIR__ . '/vendor/autoload.php';


$fb = new Facebook\Facebook([
  'app_id' => '1688543628082268', // Replace {app-id} with your app id
  'app_secret' => '3ec6b0d0f7a566ebdd081634ac08748a',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://ec2-52-32-68-207.us-west-2.compute.amazonaws.com/weather/fb_callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>