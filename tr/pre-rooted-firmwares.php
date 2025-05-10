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
include_once "config.php";
if ($user->data['user_id'] != ANONYMOUS) {
    $login_message = "Hoş geldiniz , " . htmlspecialchars($user->data['username']) . "! , ";
    $logout_link = "<a href='logout.php'>Çıkış Yap</a>";
} else {
    $login_message = "";
    $logout_link = "<a href='../forum/ucp.php?mode=register'>Kayıt Ol</a> ya da <a href='../forum/ucp.php?mode=login'>Giriş Yap</a>";
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SumTixFW / Root'lu Firmware'ler</title>
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
                <h2 class="berlin">Samsung Firmware'leri</h2>
                <div class="cards-container">
                    <div class="card" id="22">
                        <div class="card-content">
                            <h2>A415FXXU1BUC3 / A41 (Tam Firmware)</h2>
                            <button><a href="https://mega.nz/file/XuJnFIrL#4EiFdIjbquoo2ycl9KwYak6QDF8u9T9yk3ioJUUHkyE" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(22,"A415FXXU1BUC3 / A41 (Full Firmware)","pre-rooted-firmwares"); ?>
                        </div>
                    </div>
                    <div class="card" id="23">
                        <div class="card-content">
                            <h2>G610FDDU1APHD / J7 Prime (Boot imajı)</h2>
                            <button><a href="https://mega.nz/file/G7gxXJaa#8wo1HL5kgqkFFY4uKCflFfw4OKPEOWcmv_6hBo0oY_A" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(23,"G610FDDU1APHD / J7 Prime (Boot image)","pre-rooted-firmwares"); ?>
                        </div>
                    </div>
                    <div class="card" id="24">
                        <div class="card-content">
                            <h2>G611FXXU1BRI6 / On7 Prime (Boot imajı)</h2>
                            <button><a href="https://mega.nz/file/O7BzgBzC#FZk9smbvYmNORg8_Mq9lXfcu_Q3ZKLxotTYZr3ezYWc" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(24,"G611FXXU1BRI6 / On7 Prime (Boot image)","pre-rooted-firmwares"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>A705FXXU3ASI3 / A70 (Boot imajı)</h2>
                            <button><a href="https://mega.nz/file/325inTxb#34zlncf-cUumgLX6UlehPlyg_6TQiwSk0zL7hK-3W0s" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(25,"A705FXXU3ASI3 / A70 (Boot image)","pre-rooted-firmwares"); ?>
                        </div>
                    </div>
                    <div class="card" id="25">
                        <div class="card-content">
                            <h2>A205FXXU2ASJ1 / A20 (Boot imajı)</h2>
                            <button><a href="https://mega.nz/file/GmIi3IJD#Wfie999jaTJkcIlcXSTfI4CWwuHiHkwxoAaDk6dNgTg" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(26,"A205FXXU2ASJ1 / A20 (Boot image)","pre-rooted-firmwares"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>S918USQS3CXE3 / S23 Ultra (Boot imajı)</h2>
                            <button><a href="https://mega.nz/file/G2xHiTJK#lWWjARq6WOzxS2-jduzEQqKlPbN2wupulnPIAksCZ68" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(27,"S918USQS3CXE3 / S23 Ultra (Boot image)","pre-rooted-firmwares"); ?>
                        </div>
                    </div>
                </div>
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