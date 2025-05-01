<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../forum/';
$phpEx = 'php';
include($phpbb_root_path . 'common.' . $phpEx);
include("config.php");
$user->session_begin(); 
$auth->acl($user->data); 
$user->setup();
$item_id = $request->variable('item_id', 0);
$comment_id = $request->variable('comment_id', 0);
$category = $request->variable('category', '');
$cmd2 = $pdo->prepare("DELETE FROM comments WHERE id = ?");
$cmd2->execute([$comment_id]);
header("Location: " . "{$category}.php#{$item_id}");
exit;

?>