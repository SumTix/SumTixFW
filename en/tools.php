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
    <title>SumTixFW / Tools</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1 class="berlin">SumTixFW</h1>
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
                <h2 class="berlin">Flash Tools</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>Mi Flash Tool</h2>
                            <p>Mi Flash Tool is an official utility developed by Xiaomi for flashing firmware on Xiaomi and Redmi devices. It is primarily used to install stock ROMs, unbrick devices, and resolve software-related issues. The tool supports both Fastboot and EDL (Emergency Download) modes, offering flexibility in flashing. Mi Flash Tool is widely used by Xiaomi users and technicians for its simplicity, efficiency, and compatibility with most Xiaomi devices.</p>
                            <button><a href="https://mega.nz/file/D7ZQBDqD#n3m5HwuOkTxYFp5YRu2yq6krGP8c-km8mWQTEmbHE7M" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(1,"Mi Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Realme Flash Tool</h2>
                            <p>Realme Flash Tool is an official utility developed by Realme for flashing stock firmware on Realme devices. It is primarily used for tasks such as installing official ROMs, unbricking devices, and resolving software-related issues. The tool supports flashing in Fastboot mode and requires the correct firmware package for the specific device. Known for its simplicity and reliability, Realme Flash Tool is widely used by Realme users and technicians to restore or update Realme smartphones.</p>
                            <button><a href="https://mega.nz/file/SrRHDRRI#C7gBd136VtblPDBPmbSUY3y5dm9ydBUDuKNGM6RPtYM" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(2,"Realme Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>MTK Flash Tool</h2>
                            <p>MTK Flash Tool is a software utility designed for devices with MediaTek (MTK) chipsets. It enables users to flash stock firmware, unbrick devices, and resolve software issues. The tool supports scatter file-based flashing, making it easy to install firmware on a wide range of MTK-powered smartphones and tablets. MTK Flash Tool is commonly used by technicians and advanced users for tasks like firmware updates, recovery, and system repair.</p>
                            <button><a href="https://mega.nz/file/bzwxTCbY#SqvsDbhRnbiKRI9HB1qH6osOTn6VJYxO4ViDqlL7iNE" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(3,"MTK Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>SP Flash Tool</h2>
                            <p>SP Flash Tool (Smart Phone Flash Tool) is a utility designed for flashing firmware on Android devices with MediaTek chipsets. It allows users to install stock or custom ROMs, unbrick devices, test memory, manage partitions, and perform backups and restores. The tool works by using scatter files, which map the device's partitions, and requires MediaTek USB VCOM drivers to establish a connection between the device and a computer. Compatible with Windows and Linux, SP Flash Tool is widely used for troubleshooting and device maintenance, but improper use can lead to data loss or permanent damage, making it suitable for advanced users only.</p>
                            <button><a href="https://mega.nz/file/erB0UJqB#emWfG4IrXqolKIgIq62TcpW3ronf5emkFj6jInw5pAA" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(4,"SP Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Android SDK Platform Tools</h2>
                            <p>Android SDK Platform Tools is a set of command-line utilities provided by Google for developers to communicate with Android devices and emulators. It includes essential tools like ADB for debugging and managing devices, Fastboot for flashing and modifying device firmware, and other utilities for testing and deploying applications. It is widely used for tasks such as app development, device rooting, unlocking bootloaders, and recovering bricked devices. Regular updates ensure compatibility with the latest Android versions.</p>
                            <button><a href="https://mega.nz/file/PrgRQKRJ#-UpK4bjjo2MQFGV9I21eKwDzvXTGunOgprsJEq4dMGU" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(5,"Android SDK Platform Tools","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>MCT OFP Extractor</h2>
                            <p>MCT OFP Extractor is a tool designed for extracting firmware files from OFP packages, primarily used with Oppo and Realme devices. OFP files are proprietary firmware packages that contain system images, boot files, and other essential components required for flashing or repairing devices. The tool simplifies the process of unpacking these files, allowing users to access individual components like boot.img or system.img for advanced modifications, analysis, or manual flashing using tools like SP Flash Tool or Fastboot. MCT OFP Extractor is commonly used by technicians and advanced users and requires care to avoid mishandling firmware files.</p>
                            <button><a href="https://mega.nz/file/7q5lGLYB#hqVNOZDhH02iFyPe_P8wB6TdvB-l-WOe0FABE_VtmQk" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(6,"MCT OFP Extractor","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>".img" to ".tar.md5" Convert Tool</h2>
                            <p>When flashing a Samsung phone, the required file type is ".tar.md5". To flash an ".img" file, you can use this tool to convert the ".img" file into a ".tar.md5" file.</p>
                            <button><a href="https://mega.nz/file/Xn5VkIYY#b_fMJtAMx0ImTZkzOQHDKp5w0Db_rUGWHODwWh0cInQ" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(7,".img to .tar.md5 Convert Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">Unlock Tools</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>Mi Flash Unlock Tool</h2>
                            <p>Mi Flash Unlock Tool is an official utility developed by Xiaomi to unlock the bootloader of Xiaomi, Redmi, and Poco devices. It is essential for users who want to install custom ROMs, root their devices, or make advanced modifications. The tool requires users to log in with a Mi account and have proper authorization to unlock the bootloader. The process involves connecting the device to a computer via USB, ensuring USB debugging is enabled, and following the tool's instructions. Unlocking the bootloader with Mi Flash Unlock Tool may void the warranty, erase all device data, and increase security risks, so users should proceed with caution.</p>
                            <button><a href="https://mega.nz/file/emBR0CpK#NpErHPd_0kp966HbxppTMrtDwDxJnn2sXbrV8YavGA8" class="no-decoration" target="_blank">Download</a></button>
                            <br><br><?php doc(8,"Mi Flash Unlock Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">FRP (Factory Reset Protection) Bypass Tools</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>SamFW Tool</h2>
                            <p>SamFW Tool is a utility designed for Samsung devices, offering various features to simplify tasks like firmware flashing, unlocking, and device customization. It allows users to download and install official Samsung firmware, reset FRP (Factory Reset Protection), and perform maintenance operations. The tool is widely used by technicians and advanced users for troubleshooting and optimizing Samsung devices, providing a user-friendly interface and reliable performance.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/Gj4ARCaS#xUJm6hX687Zh9w84BoxcD9B1g1HN5iIeRkQEFszkx-o" target="_blank">Download</a></button>
                            <br><br><?php doc(9,"SamFW Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Samsung Calculator FRP Tool</h2>
                            <p>The Samsung Calculator FRP Tool is a specialized utility used to bypass Factory Reset Protection (FRP) on Samsung devices by exploiting a vulnerability in the Calculator app. It enables users to gain access to the device by entering specific codes or performing a sequence of steps through the calculator. This tool is primarily used by technicians for device recovery and unlocking but should always be used responsibly and in compliance with local laws and regulations.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/6mZ33CIS#sLeKnzUmPDDAhidpMUafP5NTRIhr7b9-pZlnuSSiepg" target="_blank">Download</a></button>
                            <br><br><?php doc(10,"Samsung Calculator FRP Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">Launchers</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>Nova Launcher</h2>
                            <p>Nova Launcher is a highly customizable and feature-rich home screen replacement for Android devices. It allows users to personalize their device’s appearance and functionality with custom app icons, themes, gestures, and layouts. Known for its speed and efficiency, Nova Launcher offers advanced features like backup/restore, app drawer customization, and widget integration, making it a favorite choice for users seeking enhanced control over their Android experience.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/WmhgXLAD#DexbCjBzqOR1NEgdc7HmaY5xNdN-o6RkYk2Zq6UQv9w" target="_blank">Download</a></button>
                            <br><br><?php doc(11,"Nova Launcher","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Apex Launcher</h2>
                            <p>Apex Launcher is a popular Android home screen replacement app that combines customization and performance. It allows users to personalize their device with custom app icons, themes, and grid layouts while offering advanced features like gesture controls, app drawer organization, and scrollable docks. Apex Launcher is lightweight, fast, and designed for users who want a sleek, efficient, and highly customizable Android experience.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/3yB11QDa#3Awnv2dWwfz97zc7rovdIW6tCWB3_2olZ2zGqM7wF9Q" target="_blank">Download</a></button>
                            <br><br><?php doc(12,"Apex Launcher","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">Paid Tools</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>DFT Pro</h2>
                            <p>DFT Pro Tool is a powerful software utility used primarily for servicing and repairing mobile devices. It supports a wide range of tasks, including flashing firmware, unlocking, repairing IMEI, and bypassing FRP locks on various smartphone brands. Known for its user-friendly interface and compatibility with multiple devices, DFT Pro Tool is commonly utilized by technicians and professionals in the mobile repair industry.</p>
                            <button><a class="no-decoration" href="https://www.dftpro.com/" target="_blank">Website</a></button>
                            <br><br><?php doc(13,"DFT Pro","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Chimera Tool</h2>
                            <p>Chimera Tool is a professional mobile repair software widely used for servicing smartphones and tablets. It provides features like firmware flashing, IMEI repair, network unlocking, FRP bypass, and device diagnostics for a variety of brands, including Samsung, Huawei, and LG. Known for its user-friendly interface and regular updates, Chimera Tool is a reliable solution for technicians and repair professionals in the mobile industry.</p>
                            <button><a class="no-decoration" href="https://chimeratool.com" target="_blank">Website</a></button>
                            <br><br><?php doc(14,"Chimera Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Samsung Tool Pro (Z3X)</h2>
                            <p>Samsung Tool Pro (Z3X) is a professional software designed for servicing Samsung mobile devices. It offers a wide range of features, including firmware flashing, unlocking, IMEI repair, FRP bypass, and device diagnostics. Widely used by technicians, it supports most Samsung models and provides regular updates to accommodate new devices and security patches. Samsung Tool Pro is known for its reliability and efficiency in mobile repair and maintenance tasks.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">Website</a></button>
                            <br><br><?php doc(15,"Samsung Tool Pro (Z3X)","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Easy JTAG (Z3X)</h2>
                            <p>Easy JTAG (Z3X) is a professional hardware and software tool used for advanced mobile device repair and data recovery. It specializes in repairing dead devices, recovering data from damaged storage chips (eMMC, UFS), and handling bootloader repair. Widely used by technicians, Easy JTAG supports various brands and models, offering high reliability and compatibility. It is an essential tool for complex repair tasks such as unbricking devices and restoring corrupted firmware.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">Website</a></button>
                            <br><br><?php doc(16,"Easy JTAG (Z3X)","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Pandora (Z3X)</h2>
                            <p>Pandora (Z3X) is an advanced mobile repair tool designed for repairing, unlocking, and flashing a wide range of Android devices. Developed by the Z3X team, it supports functions like bypassing FRP, IMEI repair, bootloader unlocking, and full device flashing. Pandora is known for its compatibility with various brands and its user-friendly interface, making it a popular choice among professional mobile repair technicians. It provides regular updates to stay compatible with the latest devices and security patches.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">Website</a></button>
                            <br><br><?php doc(17,"Pandora (Z3X)","tools"); ?>
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
        <p>&copy;2025 SumTixFW v0.4</p>
    </footer>
</body>
</html>