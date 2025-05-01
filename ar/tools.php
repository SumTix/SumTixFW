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
    <title>SumTixFW / الأدوات</title>
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
                <h2>أدوات الفلاش</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>Mi Flash Tool</h2>
                            <p>Mi Flash Tool هو أداة رسمية طورتها Xiaomi لتفليش (Flashing) البرامج الثابتة على أجهزة Xiaomi و Redmi. تُستخدم الأداة بشكل أساسي لتثبيت ROM الرسمي، وإصلاح الأجهزة المعطلة (Unbrick)، وحل المشكلات المتعلقة بالبرمجيات. تدعم الأداة وضعي Fastboot وEDL (Emergency Download)، مما يوفر مرونة في عملية التفليش. يُستخدم Mi Flash Tool على نطاق واسع من قبل مستخدمي Xiaomi والفنيين نظرًا لبساطته وكفاءته وتوافقه مع معظم أجهزة Xiaomi.</p>
                            <button><a href="https://mega.nz/file/D7ZQBDqD#n3m5HwuOkTxYFp5YRu2yq6krGP8c-km8mWQTEmbHE7M" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br> <?php doc(1,"Mi Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Realme Flash Tool</h2>
                            <p>Realme Flash Tool هو أداة رسمية طورتها Realme لتفليش (Flashing) البرامج الثابتة الرسمية على أجهزة Realme. تُستخدم الأداة بشكل أساسي في مهام مثل تثبيت ROM الرسمي، وإصلاح الأجهزة المعطلة (Unbrick)، وحل المشكلات المتعلقة بالبرمجيات. تدعم الأداة التفليش في وضع Fastboot، وتتطلب حزمة البرنامج الثابت الصحيحة الخاصة بالجهاز المحدد. بفضل بساطته وموثوقيته، يُستخدم Realme Flash Tool على نطاق واسع من قبل مستخدمي Realme والفنيين لاستعادة أو تحديث هواتف Realme الذكية.</p>
                            <button><a href="https://mega.nz/file/SrRHDRRI#C7gBd136VtblPDBPmbSUY3y5dm9ydBUDuKNGM6RPtYM" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(2,"Realme Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>MTK Flash Tool</h2>
                            <p>MTK Flash Tool هو أداة برمجية مصممة للأجهزة التي تعمل بمعالجات MediaTek (MTK). تتيح للمستخدمين تفليش (Flashing) البرامج الثابتة الرسمية، وإصلاح الأجهزة المعطلة (Unbrick)، وحل المشكلات المتعلقة بالبرمجيات. تدعم الأداة التفليش المستند إلى ملف Scatter، مما يسهل تثبيت البرامج الثابتة على مجموعة واسعة من الهواتف الذكية والأجهزة اللوحية المزودة بمعالجات MTK. يُستخدم MTK Flash Tool بشكل شائع من قبل الفنيين والمستخدمين المتقدمين لمهام مثل تحديث البرامج الثابتة، واستعادة النظام، وإصلاح الأعطال البرمجية.</p>
                            <button><a href="https://mega.nz/file/bzwxTCbY#SqvsDbhRnbiKRI9HB1qH6osOTn6VJYxO4ViDqlL7iNE" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(3,"MTK Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>SP Flash Tool</h2>
                            <p>SP Flash Tool (Smart Phone Flash Tool) هو أداة مخصصة لتفليش (Flashing) البرامج الثابتة على الأجهزة التي تعمل بمعالجات MediaTek. تتيح للمستخدمين تثبيت ROM الرسمي أو المخصص، وإصلاح الأجهزة المعطلة (Unbrick)، واختبار الذاكرة، وإدارة الأقسام، وإجراء النسخ الاحتياطي والاستعادة. تعمل الأداة باستخدام ملفات Scatter التي تحدد تقسيمات الجهاز، وتتطلب MediaTek USB VCOM Drivers لإنشاء اتصال بين الجهاز والكمبيوتر.  

                                متوافقة مع Windows وLinux، وتُستخدم SP Flash Tool على نطاق واسع لاستكشاف الأخطاء وإصلاحها وصيانة الأجهزة، ولكن الاستخدام غير الصحيح قد يؤدي إلى فقدان البيانات أو تلف دائم، مما يجعلها مناسبة فقط للمستخدمين المتقدمين.</p>
                            <button><a href="https://mega.nz/file/erB0UJqB#emWfG4IrXqolKIgIq62TcpW3ronf5emkFj6jInw5pAA" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(4,"SP Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Android SDK Platform Tools</h2>
                            <p>Android SDK Platform Tools هي مجموعة من أدوات سطر الأوامر التي توفرها Google للمطورين للتواصل مع أجهزة Android والمحاكيات. تتضمن الأدوات الأساسية مثل ADB لتصحيح الأخطاء وإدارة الأجهزة، وFastboot لتفليش البرامج الثابتة وتعديلها، بالإضافة إلى أدوات أخرى لاختبار التطبيقات ونشرها.  

                                تُستخدم على نطاق واسع في مهام مثل تطوير التطبيقات، وعمل الروت للأجهزة، وفتح البوت لودر، واستعادة الأجهزة المعطلة (Bricked Devices). يتم تحديثها بانتظام لضمان التوافق مع أحدث إصدارات Android.</p>
                            <button><a href="https://mega.nz/file/PrgRQKRJ#-UpK4bjjo2MQFGV9I21eKwDzvXTGunOgprsJEq4dMGU" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(5,"Android SDK Platform Tools","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>MCT OFP Extractor</h2>
                            <p>MCT OFP Extractor هو أداة مخصصة لاستخراج ملفات البرامج الثابتة من حزم OFP، والتي تُستخدم بشكل أساسي مع أجهزة Oppo وRealme. تحتوي ملفات OFP على حزم برامج ثابتة خاصة تتضمن صور النظام (System Images)، وملفات الإقلاع (Boot Files)، والمكونات الأساسية الأخرى اللازمة للتفليش أو إصلاح الأجهزة.  

                                تعمل الأداة على تبسيط عملية فك هذه الملفات، مما يسمح للمستخدمين بالوصول إلى المكونات الفردية مثل boot.img أو system.img لإجراء تعديلات متقدمة، أو التحليل، أو التفليش اليدوي باستخدام أدوات مثل SP Flash Tool أو Fastboot. تُستخدم MCT OFP Extractor بشكل شائع من قبل الفنيين والمستخدمين المتقدمين، وتتطلب الحذر لتجنب أي أخطاء قد تؤدي إلى تلف ملفات البرامج الثابتة.</p>
                            <button><a href="https://mega.nz/file/7q5lGLYB#hqVNOZDhH02iFyPe_P8wB6TdvB-l-WOe0FABE_VtmQk" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(6,"MCT OFP Extractor","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>".img" to ".tar.md5" Convert Tool</h2>
                            <p>عند تفليش هاتف Samsung، يكون نوع الملف المطلوب هو ".tar.md5". إذا كنت بحاجة إلى تفليش ملف ".img"، يمكنك استخدام هذه الأداة لتحويل ملف ".img" إلى ".tar.md5"، مما يجعله متوافقًا مع أدوات التفليش الخاصة بأجهزة Samsung، مثل Odin.</p>
                            <button><a href="https://mega.nz/file/Xn5VkIYY#b_fMJtAMx0ImTZkzOQHDKp5w0Db_rUGWHODwWh0cInQ" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(7,".img to .tar.md5 Convert Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2>أدوات إلغاء قفل (Unlock)</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>Mi Flash Unlock Tool</h2>
                            <p>Mi Flash Unlock Tool هو أداة رسمية طورتها Xiaomi لفتح البوت لودر (Bootloader) لأجهزة Xiaomi وRedmi وPoco. تُعد هذه الأداة ضرورية للمستخدمين الذين يرغبون في تثبيت ROM مخصص، أو عمل روت لأجهزتهم، أو إجراء تعديلات متقدمة.  

                                يتطلب استخدام الأداة تسجيل الدخول بحساب Mi Account والحصول على التفويض اللازم لفتح البوت لودر. تتضمن العملية توصيل الجهاز بالكمبيوتر عبر USB، والتأكد من تفعيل تصحيح أخطاء USB (USB Debugging)، ثم اتباع التعليمات المرفقة بالأداة.  
                                
                                يُرجى ملاحظة أن فتح البوت لودر باستخدام Mi Flash Unlock Tool قد يؤدي إلى إلغاء الضمان، ومسح جميع بيانات الجهاز، وزيادة مخاطر الأمان، لذا يجب على المستخدمين توخي الحذر قبل المتابعة.</p>
                            <button><a href="https://mega.nz/file/emBR0CpK#NpErHPd_0kp966HbxppTMrtDwDxJnn2sXbrV8YavGA8" class="no-decoration" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(8,"Mi Flash Unlock Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2>أدوات تخطي الحماية (FRP)</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>SamFW Tool</h2>
                            <p>SamFW Tool هو أداة مخصصة لأجهزة Samsung، توفر مجموعة من الميزات لتبسيط مهام مثل تفليش (Flashing) البرامج الثابتة، وفتح القفل، وتخصيص الجهاز. تتيح الأداة للمستخدمين تحميل وتثبيت البرامج الثابتة الرسمية من Samsung، وإعادة تعيين قفل FRP (Factory Reset Protection)، وتنفيذ عمليات الصيانة المختلفة.  

                                تُستخدم SamFW Tool على نطاق واسع من قبل الفنيين والمستخدمين المتقدمين لاستكشاف الأخطاء وإصلاحها وتحسين أداء أجهزة Samsung، حيث تتميز بواجهة سهلة الاستخدام وأداء موثوق.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/Gj4ARCaS#xUJm6hX687Zh9w84BoxcD9B1g1HN5iIeRkQEFszkx-o" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(9,"SamFW Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Samsung Calculator FRP Tool</h2>
                            <p>Samsung Calculator FRP Tool هو أداة متخصصة تُستخدم لتخطي حماية إعادة ضبط المصنع (FRP) على أجهزة Samsung من خلال استغلال ثغرة في تطبيق الحاسبة (Calculator). تتيح هذه الأداة للمستخدمين الوصول إلى الجهاز عبر إدخال أكواد محددة أو تنفيذ خطوات معينة داخل تطبيق الحاسبة.  

                                يُستخدم Samsung Calculator FRP Tool بشكل أساسي من قبل الفنيين لاستعادة الأجهزة وفتحها، ولكن يجب استخدامه بمسؤولية وبما يتوافق مع القوانين واللوائح المحلية.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/6mZ33CIS#sLeKnzUmPDDAhidpMUafP5NTRIhr7b9-pZlnuSSiepg" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(10,"Samsung Calculator FRP Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2>محاكيات</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>Nova Launcher</h2>
                            <p>يُعد Nova Launcher بديلاً غنيًا بالمميزات وقابلًا للتخصيص بدرجة عالية لشاشة الرئيسية على أجهزة Android. يتيح للمستخدمين تخصيص مظهر وأداء أجهزتهم من خلال أيقونات التطبيقات المخصصة، والثيمات، والإيماءات، والتخطيطات. يُعرف بسرعته وكفاءته، حيث يوفر ميزات متقدمة مثل النسخ الاحتياطي والاستعادة، وتخصيص درج التطبيقات، ودمج الويدجت، مما يجعله خيارًا مفضلًا للمستخدمين الذين يبحثون عن تحكم محسّن في تجربة Android الخاصة بهم.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/WmhgXLAD#DexbCjBzqOR1NEgdc7HmaY5xNdN-o6RkYk2Zq6UQv9w" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(11,"Nova Launcher","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Apex Launcher</h2>
                            <p>Apex Launcher هو تطبيق شائع لاستبدال الشاشة الرئيسية على أجهزة Android، يجمع بين التخصيص والأداء. يتيح للمستخدمين تخصيص أجهزتهم من خلال أيقونات تطبيقات مخصصة، وثيمات، وتخطيطات شبكية، مع تقديم ميزات متقدمة مثل عناصر التحكم بالإيماءات، وتنظيم درج التطبيقات، والأرصفة القابلة للتمرير. يتميز Apex Launcher بخفة وزنه وسرعته، وهو مصمم للمستخدمين الذين يبحثون عن تجربة Android أنيقة، فعالة، وقابلة للتخصيص بدرجة عالية.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/3yB11QDa#3Awnv2dWwfz97zc7rovdIW6tCWB3_2olZ2zGqM7wF9Q" target="_blank">تنزيل</a></button>
                            <br><br><?php doc(12,"Apex Launcher","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2>الأدوات المدفوعة</h2>
                <div class="cards-container">
                    <div class="card">
                        <div class="card-content">
                            <h2>DFT Pro</h2>
                            <p>DFT Pro Tool هو أداة برمجية قوية تُستخدم بشكل أساسي في صيانة وإصلاح الأجهزة المحمولة. تدعم مجموعة واسعة من المهام، بما في ذلك تفليش البرامج الثابتة، وإلغاء القفل، وإصلاح IMEI، وتجاوز أقفال FRP على مختلف علامات الهواتف الذكية. بفضل واجهتها سهلة الاستخدام وتوافقها مع العديد من الأجهزة، تُعد DFT Pro Tool خيارًا شائعًا بين الفنيين والمحترفين في مجال صيانة الهواتف المحمولة.</p>
                            <button><a class="no-decoration" href="https://www.dftpro.com/" target="_blank">إذهب للصفحة</a></button>
                            <br><br><?php doc(13,"DFT Pro","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Chimera Tool</h2>
                            <p>Chimera Tool هو برنامج احترافي لصيانة وإصلاح الهواتف الذكية والأجهزة اللوحية، ويُستخدم على نطاق واسع في هذا المجال. يوفر ميزات مثل تفليش البرامج الثابتة، وإصلاح IMEI، وفتح الشبكة، وتجاوز FRP، وتشخيص الأجهزة لمجموعة متنوعة من العلامات التجارية، بما في ذلك Samsung وHuawei وLG. بفضل واجهته سهلة الاستخدام وتحديثاته المنتظمة، يُعد Chimera Tool حلاً موثوقًا للفنيين والمحترفين في مجال صيانة الهواتف المحمولة.</p>
                            <button><a class="no-decoration" href="https://chimeratool.com" target="_blank">إذهب للصفحة</a></button>
                            <br><br><?php doc(14,"Chimera Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Samsung Tool Pro (Z3X)</h2>
                            <p>Samsung Tool Pro (Z3X) هو برنامج احترافي مصمم لصيانة وإصلاح أجهزة Samsung المحمولة. يوفر مجموعة واسعة من الميزات، بما في ذلك تفليش البرامج الثابتة، وإلغاء القفل، وإصلاح IMEI، وتجاوز FRP، وتشخيص الأجهزة. يُستخدم على نطاق واسع من قبل الفنيين، حيث يدعم معظم طرازات Samsung ويتلقى تحديثات منتظمة لدعم الأجهزة الجديدة وتصحيحات الأمان. يُعرف Samsung Tool Pro بموثوقيته وكفاءته في مهام إصلاح وصيانة الهواتف المحمولة.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">إذهب للصفحة</a></button>
                            <br><br><?php doc(15,"Samsung Tool Pro (Z3X)","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Easy JTAG (Z3X)</h2>
                            <p>Easy JTAG (Z3X) هو أداة احترافية تشمل العتاد والبرمجيات، تُستخدم في إصلاح الهواتف المتقدمة واستعادة البيانات. تتميز بقدرتها على إصلاح الأجهزة الميتة، واستعادة البيانات من شرائح التخزين التالفة (eMMC, UFS)، والتعامل مع إصلاح محمل الإقلاع (Bootloader). تُستخدم Easy JTAG على نطاق واسع من قبل الفنيين، حيث تدعم مختلف العلامات التجارية والطرازات، مما يوفر موثوقية عالية وتوافقًا واسعًا. تُعد هذه الأداة ضرورية للمهام المعقدة مثل إصلاح الأجهزة المتوقفة عن العمل واستعادة البرامج الثابتة التالفة.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">إذهب للصفحة</a></button>
                            <br><br><?php doc(16,"Easy JTAG (Z3X)","tools"); ?>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <h2>Pandora (Z3X)</h2>
                            <p>Pandora (Z3X) هو أداة متقدمة لصيانة وإصلاح الهواتف المحمولة، مصممة لإصلاح وفك القفل وتفليش مجموعة واسعة من أجهزة Android. تم تطويرها بواسطة فريق Z3X، وتدعم وظائف مثل تجاوز FRP، وإصلاح IMEI، وإلغاء قفل محمل الإقلاع (Bootloader)، والتفليش الكامل للأجهزة. تُعرف Pandora بتوافقها مع العديد من العلامات التجارية وواجهتها سهلة الاستخدام، مما يجعلها خيارًا شائعًا بين فنيي صيانة الهواتف المحترفين. كما تتلقى تحديثات منتظمة لضمان التوافق مع أحدث الأجهزة وتصحيحات الأمان.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">إذهب للصفحة</a></button>
                            <br><br><?php doc(17,"Pandora (Z3X)","tools"); ?>
                        </div>
                    </div>
                </div>
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