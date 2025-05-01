<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../forum/';
$phpEx = 'php';
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin(); 
$auth->acl($user->data); 
$user->setup();

$user_id = $user->data['user_id'];
$item_id = $request->variable('item_id' , 0); 
$url = $request->variable('category', '');

include("config.php");
$stmt = $pdo->prepare("DELETE FROM user_favorites WHERE user_id = ? AND item_id = ?");
$stmt->execute([$user_id, $item_id]);

echo "Removed from Favorites!";
    redirect(append_sid("$url.php#$item_id"));
?>
