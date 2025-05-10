<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../forum/';
$phpEx = 'php';
include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin(); 
$auth->acl($user->data); 
$user->setup(); 
if ($user->data['user_id'] == ANONYMOUS) {
    exit("<!DOCTYPE html>
<html lang='tr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Hata!</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
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
    <h1>Favoriler Görüntülenemiyor!</h1>
    <h3>İşleme Devam Edebilmek Için Giriş Yapınız</h3>
    <a href ='index.php' style='color: #6d28d9;text-decoration: none;font-weight: 500;'>Ana Sayfaya Geri Dönmek İçin Tıklayın</a>
</body>
</html>");
}
else {
    $login_message = "Hoş geldiniz , " . htmlspecialchars($user->data['username']) . "! , ";
    $logout_link = "<a href='logout.php'>Çıkış Yap</a>";
}
$user_id = $user->data['user_id']; 
include("config.php");
$stmt = $pdo->prepare("SELECT item_id,item_name,category FROM user_favorites WHERE user_id = ?");
$stmt->execute([$user_id]);
$favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($favorites) > 0) {
    $message = "<h3>Favorileriniz:</h3>";
    $message = $message . "<ul>";
    foreach ($favorites as $favorite) {
        $item_id = $favorite['item_id'];
        $item_name = $favorite['item_name'];
        $category = $favorite['category'];
        $message = $message . "<li><div class='cards-container'> <a class='link' style='color: #6d28d9;text-decoration: none;font-weight: 500;' href='$category.php#$item_id'>$item_name</a>";
        $message = $message . "<form action='remove_favorite.php' method='POST'>
    <input type='hidden' name='item_id' value='$item_id'>
    <input type='hidden' name='category' value='favorites'>
    <input type='hidden' name='item_name' value='$item_name'>
    <input style='
                                    background-color: #6d28d9;
                                    color: white;
                                    border: none;
                                    padding: 10px 15px;
                                    border-radius: 5px;
                                    cursor: pointer;
                                    transition: background-color 0.3s ease;
                                    font-weight: 500;' type='submit' value='⭐ Favorilerden Çıkar'>
                                    </form></div></li><br>";
    }
    $message = $message . "</ul>";
} else {
    $message = "Henüz favorilere eklediğiniz bir öğe yok.";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SumTixFW / Favoriler</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>SumTixFW</h1>
        <h3>Firmware Hakkındaki Herşey</h3>
    </header>
    <nav>
        <div class="menu-toggle" id="menu-toggle">☰</div>
        <div class="menu-links" id="menu-links">
            <a href="index.php">Anasayfa</a>
            <a href="tools.php">Araçlar</a>
            <a href="custom-recoveries.php">Özel Recovery'ler</a>
            <a href="pre-rooted-firmwares.php">Root'lu Firmware'ler</a>
            <a href="about-us.php">Hakkımızda</a>
            <a href="favorites.php">Favoriler</a>
            <a href="../forum">Forum</a>
        </div>
        <script>
            function changeLanguage() {
                var selectedLanguage = document.getElementById("language-select").value;
                var currentUrl = window.location.href;
                if (currentUrl.includes('/en/')) {
                    currentUrl = currentUrl.replace('/en/', '/' + selectedLanguage + '/');
                } else if (currentUrl.includes('/tr/')) {
                    currentUrl = currentUrl.replace('/tr/', '/' + selectedLanguage + '/');
                } else if (currentUrl.includes('/ar/')) {
                    currentUrl = currentUrl.replace('/ar/' , '/' + selectedLanguage + '/');
                } else {
                    currentUrl = currentUrl.replace(window.location.pathname, '/' + selectedLanguage + window.location.pathname);
                }
                window.location.href = currentUrl;
            }
        </script>
    <div class="loginmessage" style=" color:white">
        <?php echo $login_message ." ". $logout_link ?>
        </div>
    </nav>
    <script src="script.js"></script>
    <article>
        <div class="content">
            <div class="main">
                <div class="custom-select">
            <select id="language-select" onchange="changeLanguage()">
                <option value="tr">🇹🇷 Türkçe</option>
                <option value="en">🇬🇧 English</option>
                <option value="ar">🇸🇦 العربية</option>
            </select>
        </div>
                <br><br><?php echo $message ?>
            </div>
            <div class="sidebar">
                <h3>Yenilikler</h3>
                <ul>
                    <li>Yorumlar Sistemi Eklendi.</li><br>
                    <li>Favoriler Sistemi Eklendi.</li><br>
                    <li>Forum Eklendi.</li><br>
                    <li><a href="custom-recoveries.html" class="link">Özel Recovery'ler</a> Sayfası Eklendi.</li><br>
                    <li>4 Adet Root'lu Firmware Yüklendi.</li><br>
                    <li><a href="pre-rooted-firmwares.html" class="link">Root'lu Firmware'ler</a> Kategorisi Eklendi.</li><br>
                    <li>Yeni Araçlar Eklendi (Flash Araçları , FRP Araçları , Ücretli Araçlar) , <a href="tools.html" class="link">Araçlar Sayfasına</a> Bakabilirsiniz!</li>
                    
                    
                </ul>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </article>
    <footer>
        <p>&copy;2025 SumTixFW </p>
    </footer>
</body>
</html>