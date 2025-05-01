<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../forum/';
$phpEx = 'php';
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin(); 
$auth->acl($user->data); 
$user->setup();  

$item_id = $request->variable('item_id', 0);
$item_name = $request->raw_variable('item_name', '');
$category =$request->raw_variable('category', '');
if ($user->data['user_id'] == ANONYMOUS) {
    exit("<!DOCTYPE html>
<html lang='ar' dir='rtl'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Hata!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Noto+Sans+Arabic:wght@100..900&display=swap');
        
        body {
            font-family: 'Cairo', sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;     
            height: 100vh;            
            margin: 0;   
            background: linear-gradient(45deg, #6d28d9, #8b5cf6, #a78bfa, #c4b5fd);
            background-size: 400% 400%;
            animation: gradientAnimation 10s ease infinite;
            color: white;
            text-align: center;
            padding: 60px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);      
        }
        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body>
    <h1>فشلت الإضافة للمفضلات!</h1>
    <h3>يجب تسجيل الدخول لإتمام العملية</h3>
    <a href ='$category.php#$item_id' style='color: #6d28d9;text-decoration: none;font-weight: 500;'>العودة للوراء</a>
</body>
</html>
");
}
if ($item_id > 0) {
    $user_id = $user->data['user_id'];
    include("config.php");
    $cmd = $pdo->prepare("SELECT * FROM user_favorites  WHERE user_id = $user_id and item_id = $item_id");
    $cmd->execute();
    $favorites = $cmd->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($favorites))
    {
        echo "Favoriye eklenemedi";
        exit;
    }
    else {
        $stmt = $pdo->prepare("INSERT INTO user_favorites (user_id, item_id, item_name, category) VALUES (?, ?, ?, ?)");
        $stmt->execute([$user_id, $item_id, $item_name, $category]);
    }
    echo "Favoriye eklendi!";
    redirect(append_sid("$category.php#$item_id"));
} else {
    echo "Geçersiz istek.";
    
}
?>