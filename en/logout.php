<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);

$user->session_kill();
$user->session_begin();

header("Location: index.php"); // Çıkış sonrası yönlendirme
exit;
?>
