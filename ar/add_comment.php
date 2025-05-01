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
$comment = $request->raw_variable('comment', '');
$category = $request->raw_variable('category', '');
$user_id = $user->data['user_id'];
if (!empty($comment)) {
    $cmd = $pdo->prepare("INSERT INTO comments (item_id, user_id, comment) VALUES (:item_id, :user_id, :comment)");
    $cmd->execute(['item_id' => $item_id, 'user_id' => $user_id, 'comment' => $comment]);
}

header("Location: {$category}.php#{$item_id}");
exit;