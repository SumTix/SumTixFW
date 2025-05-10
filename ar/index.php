<?php
define('IN_PHPBB', true);
$phpbb_root_path = '../forum/';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_user.' . $phpEx);
include($phpbb_root_path . 'config.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if ($user->data['user_id'] != ANONYMOUS) {
    $login_message = "أهلاً , " . htmlspecialchars($user->data['username']) . "! , ";
    $logout_link = "<a href='logout.php'>تسجيل الخروج</a>";
} else {
    $login_message = "";
    $logout_link = "<a href='../forum/ucp.php?mode=register'>أنشئ حساب</a> أو قم بـ <a href='../forum/ucp.php?mode=login'>تسجيل الدخول</a>";
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SumTixFW</title>
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
            <option value="ar"> العربية 🇸🇦</option>
            <option dir="rtl" value="en">🇬🇧 English</option>
            <option dir="rtl" value="tr">🇹🇷 Türkçe</option>
            
        </select>
    </div>
                <h3>أهلاً بكم في <span class="berlin">SumTixFW</span></h3>
                <p>موقعنا يهدف إلى جمع جميع أدوات البرامج الثابتة (Firmware) والبرامج الثابتة المخصصة في مكان واحد. وهو يشمل الهواتف، و Raspberry Pi، وبطاقات المعالجات الدقيقة الأخرى. كما يتضمن تحديثات البرامج الثابتة، والـRecoveries المخصصة، وخطوات تنفيذها.</p>
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
        <p>&copy;2025 SumTixFW </p>
    </footer>
</body>
</html>