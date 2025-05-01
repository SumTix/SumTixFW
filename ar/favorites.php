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
    <h1>لا يمكن عرض المفضلة!</h1>
    <h3>يجب تسجيل الدخول قبل عرض هذه الصفحة</h3>
    <a href ='index.php' style='color: #6d28d9;text-decoration: none;font-weight: 500;'>العودة للصفحة الرئيسية</a>
</body>
</html>");
}
else {
    $login_message = "أهلاً , " . htmlspecialchars($user->data['username']) . "! , ";
    $logout_link = "<a href='logout.php'>تسجيل الخروج</a>";
}
$user_id = $user->data['user_id']; 
include("config.php");
$stmt = $pdo->prepare("SELECT item_id,item_name,category FROM user_favorites WHERE user_id = ?");
$stmt->execute([$user_id]);
$favorites = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($favorites) > 0) {
    $message = "<h3>مفضلاتك:</h3>";
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
                                    font-weight: 500;' type='submit' value='⭐ إزالة من المفضلة'>
                                    </form></div></li><br>";
    }
    $message = $message . "</ul>";
} else {
    $message = "المفضلة لا تزال فارغة.";
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SumTixFW / المفضلة</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>SumTixFW</h1>
        <h3>كل ما يتعلق بالــFirmware</h3>
    </header>
    <nav>
    <div class="menu-toggle" id="menu-toggle">☰</div>
        <div class="menu-links" id="menu-links">
            <a href="index.php">الصفحة الرئيسية</a>
            <a href="tools.php">الأدوات</a>
            <a href="custom-recoveries.php">Recoveries معدلة</a>
            <a href="pre-rooted-firmwares.php">برامج ثابتة مع Root مسبق</a>
            <a href="about-us.php">من نحن</a>
            <a href="favorites.php">المفضلة</a>
            <a href="../forum">المنتدى</a>
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
                <option value="ar">🇸🇦 العربية</option>
                <option value="en">🇬🇧 English</option>
                <option value="tr">🇹🇷 Türkçe</option>
            </select>
        </div>
                <br><br><?php echo $message ?>
            </div>
            <div class="sidebar">
                <h3>آخر التحديثات</h3>
                <ul>
                    <li>تمت إضافة نظام تعليقات</li><br>
                    <li>تمت إضافة نظام مفضلة</li><br>
                    <li>تمت إضافة منتدى</li><br>
                    <li>تمت إضافة صفحة <a href="custom-recoveries.html" class="link">Recoveries معدلة</a>.</li><br>
                    <li>تم رفع 4 برامج ثابتة مع Root مسبق.</li><br>
                    <li>تمت إضافة قسم البرامج الثابتة مع Root مسبق. <a href="pre-rooted-firmwares.html" class="link">إطلع عليه الآن!</a></li><br>
                    <li>تمت إضافة أدوات جديدة (أدوات الفلاش , أدوات FRP , محاكيات و أدوات مدفوعة) في صفحة <a href="tools.html" class="link">الأدوات</a>.</li>
                    
                    
                </ul>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </article>
    <footer>
        <p>&copy;2025 SumTixFW v0.4</p>
    </footer>
</body>
</html>