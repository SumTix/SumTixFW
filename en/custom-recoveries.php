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
    $login_message = "Welcome , " . htmlspecialchars($user->data['username']) . "! , ";
    $logout_link = "<a href='logout.php'>Logout</a>";
} else {
    $login_message = "";
    $logout_link = "<a href='../forum/ucp.php?mode=register'>Register</a> or <a href='../forum/ucp.php?mode=login'>Login</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SumTixFW / Custom Recoveries</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>SumTixFW</h1>
        <h3>Everything About Firmware</h3>
    </header>
    <nav>
        <div class="menu-toggle" id="menu-toggle">☰</div>
        <div class="menu-links" id="menu-links">
            <a href="index.php">Main Menu</a>
            <a href="tools.php">Tools</a>
            <a href="custom-recoveries.php">Custom Recoveries</a>
            <a href="pre-rooted-firmwares.php">Pre-rooted Firmwares</a>
            <a href="about-us.php">About Us</a>
            <a href="favorites.php">Favorites</a>
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
                <option value="en">🇬🇧 English</option>
                <option value="tr">🇹🇷 Türkçe</option>
                <option value="ar">🇸🇦 العربية</option>
            </select>
        </div>
                <h2 class="berlin">Xiaomi Custom Recoveries</h2>
                <div class="cards-container">
                    <div class="card" id="18">
                        <div class="card-content">
                            <h2>Redmi Note 10 5G / Poco M3 Pro 5G (Camellia)</h2>
                            <button class="twrp"><a href="https://mega.nz/file/zzRXHCBZ#R03IeDtiVxdGpunRxBpb9EpGeqRJaEjp6oyDHuSiRu4" class="no-decoration" target="_blank">TWRP</a></button><br><br>
                            <?php doc(18,"Redmi Note 10 5G / Poco M3 Pro 5G (Camellia)","custom-recoveries"); ?>
                        </div>
                    </div>
                    <div class="card" id="19">
                        <div class="card-content">
                            <h2>Redmi Note 9S (Curtana)</h2>
                                <button class="twrp"><a href="https://mega.nz/file/yzxyUK6a#i3l6zT5nTF-sFSIK-0bK_DdMoIhH9ONUrwZHNy81JSw" class="no-decoration" target="_blank">TWRP</a></button>
                                <br><br>
                            <?php doc(19,"Redmi Note 9S (Curtana)","custom-recoveries"); ?>
                        </div>
                    </div>
                    <div class="card" id="20">
                        <div class="card-content">
                            <h2>Redmi Note 11S (Fleur)</h2>
                            <button class="twrp"><a href="https://mega.nz/file/DroiGIRR#K9LpGewXTGr3Fv47g_YbUPLcyc8iaDJ6Encss2I0yho" class="no-decoration" target="_blank">TWRP</a></button><br><br>
                            <?php doc(20,"Redmi Note 11S (Fleur)","custom-recoveries"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">Samsung Custom Recoveries</h2>
                <div class="cards-container">
                    <div class="card" id="21" >
                        <div class="card-content">
                            <h2>Galaxy S20+</h2>
                            <button class="twrp"><a href="https://mega.nz/file/KyRCyRiT#8AV0rbEav3txEJXm_dI2HpR8JWuOXgiNgOcJq7MW0xM" class="no-decoration" target="_blank">TWRP</a></button>
                            <br><br>
                            <?php doc(21,"Galaxy S20+","custom-recoveries"); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <h3>New Updates</h3>
                <ul>
                    <li>Added Comments System.</li><br>
                    <li>Added Favorites System.</li><br>
                    <li>Added Forum.</li><br>
                    <li>Added <a href="custom-recoveries.html" class="link">Custom Recoveries</a> Page.</li><br>
                    <li>Uploaded 4 Pre-rooted Firmwares.</li><br>
                    <li>Added Pre-rooted Firmwares Section. <a href="pre-rooted-firmwares.html" class="link">Check it out!</a></li><br>
                    <li>Added New Tools (Flash Tools , Unlock Tools , FRP Tools , Paid Tools) , You can take a look at the <a class="link" href="tools.html">tools page.</a></li>
                    
                    
                </ul>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </article>
    <footer>
        <p>&copy;2025 SumTixFW v1</p>
    </footer>
</body>
</html>