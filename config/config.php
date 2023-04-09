<?php

$conn = mysqli_connect('localhost', 'root', '', 'shop_database') or die('connection failed');
function create_unique_id()
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $characters_lenght = strlen($characters);
   $random_string = '';
   for ($i = 0; $i < 10; $i++) {
      $random_string .= $characters[mt_rand(0, $characters_lenght - 1)];
   }
   return $random_string;
}
if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
}
?>