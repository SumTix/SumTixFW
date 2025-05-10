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
    <title>SumTixFW / Araçlar</title>
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
                <h2 class="berlin">Flash Araçları</h2>
                <div class="cards-container">
                    <div class="card" id="1">
                        <div class="card-content">
                            <h2>Mi Flash Tool</h2>
                            <p>Mi Flash Tool, Xiaomi ve Redmi cihazlarındaki ürün yazılımını flaşlamak için Xiaomi tarafından geliştirilen resmi bir yardımcı programdır. Öncelikle stok ROM'ları yüklemek, cihazların engelini kaldırmak ve yazılımla ilgili sorunları çözmek için kullanılır. Araç, hem Fastboot hem de EDL (Acil Durum İndirme) modlarını destekleyerek flaşlamada esneklik sunar. Mi Flash Aracı, basitliği, verimliliği ve çoğu Xiaomi cihazıyla uyumluluğu nedeniyle Xiaomi kullanıcıları ve teknisyenleri tarafından yaygın olarak kullanılmaktadır.</p>
                            <button><a href="https://mega.nz/file/D7ZQBDqD#n3m5HwuOkTxYFp5YRu2yq6krGP8c-km8mWQTEmbHE7M" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br> <?php doc(1,"Mi Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="2">
                        <div class="card-content">
                            <h2>Realme Flash Tool</h2>
                            <p>Realme Flash Tool, Realme cihazlarında stok ürün yazılımının flash'lanması için Realme tarafından geliştirilen resmi bir yardımcı programdır. Öncelikle resmi ROM'ları yükleme, aygıtların engelini kaldırma ve yazılımla ilgili sorunları çözme gibi görevler için kullanılır. Araç, Fastboot modunda flash'lamayı destekler ve belirli cihaz için doğru ürün yazılımı paketini gerektirir. Basitliği ve güvenilirliği ile bilinen Realme Flash Tool, Realme kullanıcıları ve teknisyenleri tarafından Realme akıllı telefonlarını geri yüklemek veya güncellemek için yaygın olarak kullanılmaktadır.</p>
                            <button><a href="https://mega.nz/file/SrRHDRRI#C7gBd136VtblPDBPmbSUY3y5dm9ydBUDuKNGM6RPtYM" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(2,"Realme Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="3">
                        <div class="card-content">
                            <h2>MTK Flash Tool</h2>
                            <p>MTK Flash Tool, MediaTek (MTK) yonga setine sahip cihazlar için tasarlanmış bir yazılım aracıdır. Kullanıcıların stok üretici yazılımını (firmware) flaşlamasına, cihazları unbrick etmesine ve yazılım sorunlarını çözmesine olanak tanır. Araç, scatter dosyası tabanlı flaşlamayı destekleyerek, geniş bir MTK destekli akıllı telefon ve tablet yelpazesine üretici yazılımı yüklemeyi kolaylaştırır. MTK Flash Tool, genellikle teknisyenler ve ileri düzey kullanıcılar tarafından üretici yazılımı güncellemeleri, kurtarma ve sistem onarımı gibi işlemler için kullanılır.</p>
                            <button><a href="https://mega.nz/file/bzwxTCbY#SqvsDbhRnbiKRI9HB1qH6osOTn6VJYxO4ViDqlL7iNE" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(3,"MTK Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="4">
                        <div class="card-content">
                            <h2>SP Flash Tool</h2>
                            <p>SP Flash Tool, MediaTek yonga setine sahip Android cihazlara üretici yazılımı (firmware) flaşlamak için tasarlanmış bir araçtır. Kullanıcıların stok veya özel ROM'lar yüklemesine, cihazları unbrick etmesine, belleği test etmesine, bölümleri yönetmesine ve yedekleme ile geri yükleme işlemleri yapmasına olanak tanır. Araç, cihazın bölümlerini haritalayan scatter dosyalarını kullanarak çalışır ve cihaz ile bilgisayar arasında bağlantı kurmak için MediaTek USB VCOM sürücülerine ihtiyaç duyar. Windows ve Linux ile uyumlu olan SP Flash Tool, genellikle sorun gidermek ve cihaz bakımı yapmak için kullanılır. Ancak yanlış kullanım veri kaybına veya kalıcı hasara yol açabileceğinden, yalnızca ileri düzey kullanıcılar için uygundur.</p>
                            <button><a href="https://mega.nz/file/erB0UJqB#emWfG4IrXqolKIgIq62TcpW3ronf5emkFj6jInw5pAA" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(4,"SP Flash Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="5">
                        <div class="card-content">
                            <h2>Android SDK Platform Tools</h2>
                            <p>Android SDK Platform Tools, Google tarafından geliştiricilerin Android cihazlar ve emülatörlerle iletişim kurmasını sağlamak için sunulan bir dizi komut satırı aracıdır. ADB, cihazları hata ayıklama ve yönetme, Fastboot ise cihaz üretici yazılımını flaşlama ve değiştirme gibi işlemler için kullanılan temel araçları içerir. Ayrıca uygulamaları test etme ve dağıtma için çeşitli yardımcı programlar da bulunur. Android SDK Platform Tools, uygulama geliştirme, cihaz rootlama, bootloader kilidini açma ve bozulan cihazları kurtarma gibi işlemler için yaygın olarak kullanılır. Düzenli güncellemeler, en son Android sürümleriyle uyumluluğu sağlar.</p>
                            <button><a href="https://mega.nz/file/PrgRQKRJ#-UpK4bjjo2MQFGV9I21eKwDzvXTGunOgprsJEq4dMGU" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(5,"Android SDK Platform Tools","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="6">
                        <div class="card-content">
                            <h2>MCT OFP Extractor</h2>
                            <p>MCT OFP Extractor, özellikle Oppo ve Realme cihazlarında kullanılan OFP paketlerinden firmware dosyalarını çıkarmak için tasarlanmış bir araçtır. OFP dosyaları, sistem imajları, boot dosyaları ve cihazların flaşlanması veya onarılması için gerekli diğer bileşenleri içeren özel firmware paketleridir. Bu araç, bu dosyaların açılmasını kolaylaştırarak, boot.img veya system.img gibi bileşenlere erişim sağlar ve gelişmiş düzenleme, analiz veya SP Flash Tool ve Fastboot gibi araçlarla manuel flaşlama imkanı sunar. MCT OFP Extractor, genellikle teknisyenler ve ileri düzey kullanıcılar tarafından kullanılır ve firmware dosyalarının yanlış işlenmemesi için dikkat gerektirir.</p>
                            <button><a href="https://mega.nz/file/7q5lGLYB#hqVNOZDhH02iFyPe_P8wB6TdvB-l-WOe0FABE_VtmQk" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(6,"MCT OFP Extractor","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="7">
                        <div class="card-content">
                            <h2>".img" to ".tar.md5" Convert Tool</h2>
                            <p>Bir Samsung telefonunu flaşlarken, gerekli dosya türü “.tar.md5” formatıdır. Bir “.img” dosyasını flaşlamak için, bu aracı kullanarak “.img” dosyasını “.tar.md5” formatına dönüştürebilirsiniz.</p>
                            <button><a href="https://mega.nz/file/Xn5VkIYY#b_fMJtAMx0ImTZkzOQHDKp5w0Db_rUGWHODwWh0cInQ" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(7,".img to .tar.md5 Convert Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">Unlock (Kilit Açma) Araçları</h2>
                <div class="cards-container">
                    <div class="card" id="8">
                        <div class="card-content">
                            <h2>Mi Flash Unlock Tool</h2>
                            <p>Mi Flash Unlock Tool, Xiaomi, Redmi ve Poco cihazlarının bootloader kilidini açmak için Xiaomi tarafından geliştirilmiş resmi bir araçtır. Özel ROM yüklemek, cihazı rootlamak veya ileri düzey değişiklikler yapmak isteyen kullanıcılar için gereklidir. Aracı kullanabilmek için bir Mi hesabıyla giriş yapmak ve gerekli yetkilere sahip olmak gerekir. İşlem, cihazı USB ile bilgisayara bağlamayı, USB hata ayıklamasını etkinleştirmeyi ve aracın talimatlarını takip etmeyi içerir. Mi Flash Unlock Tool ile bootloader kilidini açmak, garantiyi geçersiz kılabilir, tüm cihaz verilerini silebilir ve güvenlik risklerini artırabilir, bu nedenle kullanıcıların dikkatli olması gerekir.</p>
                            <button><a href="https://mega.nz/file/emBR0CpK#NpErHPd_0kp966HbxppTMrtDwDxJnn2sXbrV8YavGA8" class="no-decoration" target="_blank">Indir</a></button>
                            <br><br><?php doc(8,"Mi Flash Unlock Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">FRP (Fabrika Ayarlarına Sıfırlama Koruması) Atlama Araçları</h2>
                <div class="cards-container">
                    <div class="card" id="9">
                        <div class="card-content">
                            <h2>SamFW Tool</h2>
                            <p>SamFW Tool, Samsung cihazları için geliştirilmiş bir araç olup, firmware flaşlama, kilit açma ve cihaz özelleştirme gibi işlemleri kolaylaştıran çeşitli özellikler sunar. Kullanıcıların resmi Samsung firmware'ini indirip yüklemesine, FRP (Fabrika Ayarlarına Sıfırlama Koruması) sıfırlamasına ve bakım işlemleri yapmasına olanak tanır. Genellikle teknisyenler ve ileri düzey kullanıcılar tarafından, Samsung cihazlarını optimize etmek ve sorun gidermek için kullanılır. Kullanıcı dostu arayüzü ve güvenilir performansıyla öne çıkar.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/Gj4ARCaS#xUJm6hX687Zh9w84BoxcD9B1g1HN5iIeRkQEFszkx-o" target="_blank">Indir</a></button>
                            <br><br><?php doc(9,"SamFW Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="10">
                        <div class="card-content">
                            <h2>Samsung Calculator FRP Tool</h2>
                            <p>Samsung Calculator FRP Tool, Samsung cihazlarında Fabrika Ayarlarına Sıfırlama Koruması (FRP) engelini aşmak için hesap makinesi uygulamasındaki bir güvenlik açığından yararlanan özel bir araçtır. Kullanıcıların belirli kodlar girerek veya hesap makinesi üzerinden belirli adımları izleyerek cihaza erişim sağlamasına olanak tanır. Bu araç, genellikle teknisyenler tarafından cihaz kurtarma ve kilit açma işlemleri için kullanılır, ancak her zaman sorumlu bir şekilde ve yerel yasa ve düzenlemelere uygun olarak kullanılmalıdır.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/6mZ33CIS#sLeKnzUmPDDAhidpMUafP5NTRIhr7b9-pZlnuSSiepg" target="_blank">Indir</a></button>
                            <br><br><?php doc(10,"Samsung Calculator FRP Tool","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">Launcher'lar</h2>
                <div class="cards-container">
                    <div class="card" id="11">
                        <div class="card-content">
                            <h2>Nova Launcher</h2>
                            <p>Nova Launcher, Android cihazlar için son derece özelleştirilebilir ve zengin özelliklere sahip bir ana ekran değiştirme aracıdır. Kullanıcıların özel uygulama simgeleri, temalar, hareket kontrolleri ve düzenler ile cihazlarının görünümünü ve işlevselliğini kişiselleştirmesine olanak tanır. Hızı ve verimliliğiyle öne çıkan Nova Launcher, yedekleme ve geri yükleme, uygulama çekmecesi özelleştirme ve widget entegrasyonu gibi gelişmiş özellikler sunarak, Android deneyimi üzerinde daha fazla kontrol isteyen kullanıcılar için popüler bir tercih haline gelmiştir.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/WmhgXLAD#DexbCjBzqOR1NEgdc7HmaY5xNdN-o6RkYk2Zq6UQv9w" target="_blank">Indir</a></button>
                            <br><br><?php doc(11,"Nova Launcher","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="12">
                        <div class="card-content">
                            <h2>Apex Launcher</h2>
                            <p>Apex Launcher, özelleştirme ve performansı birleştiren popüler bir Android ana ekran değiştirme uygulamasıdır. Kullanıcılar, özel uygulama simgeleri, temalar ve ızgara düzenleri ile cihazlarını kişiselleştirirken, hareket kontrolleri, uygulama çekmecesi düzenlemesi ve kaydırılabilir doklar gibi gelişmiş özellikler de sunar. Apex Launcher, hafif, hızlı ve şık, verimli ve son derece özelleştirilebilir bir Android deneyimi arayan kullanıcılar için tasarlanmıştır.</p>
                            <button><a class="no-decoration" href="https://mega.nz/file/3yB11QDa#3Awnv2dWwfz97zc7rovdIW6tCWB3_2olZ2zGqM7wF9Q" target="_blank">Indir</a></button>
                            <br><br><?php doc(12,"Apex Launcher","tools"); ?>
                        </div>
                    </div>
                </div>
                <h2 class="berlin">Ücretli Araçlar</h2>
                <div class="cards-container">
                    <div class="card" id="13">
                        <div class="card-content">
                            <h2>DFT Pro</h2>
                            <p>DFT Pro Tool, öncelikle mobil cihazların servisi ve onarımı için kullanılan güçlü bir yazılım aracıdır. Firmware flaşlama, kilit açma, IMEI onarma ve çeşitli akıllı telefon markalarında FRP kilitlerini aşma gibi çok sayıda işlemi destekler. Kullanıcı dostu arayüzü ve birden fazla cihazla uyumluluğu ile tanınan DFT Pro Tool, mobil onarım sektöründeki teknisyenler ve profesyoneller tarafından yaygın olarak kullanılır.</p>
                            <button><a class="no-decoration" href="https://www.dftpro.com/" target="_blank">Web Sitesine Git</a></button>
                            <br><br><?php doc(13,"DFT Pro","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="14">
                        <div class="card-content">
                            <h2>Chimera Tool</h2>
                            <p>Chimera Tool, akıllı telefonlar ve tabletler için geniş çapta kullanılan profesyonel bir mobil onarım yazılımıdır. Samsung, Huawei ve LG gibi çeşitli markalar için firmware flaşlama, IMEI onarımı, ağ kilidi açma, FRP bypass ve cihaz tanı gibi özellikler sunar. Kullanıcı dostu arayüzü ve düzenli güncellemeleri ile tanınan Chimera Tool, mobil endüstrideki teknisyenler ve onarım profesyonelleri için güvenilir bir çözümdür.</p>
                            <button><a class="no-decoration" href="https://chimeratool.com" target="_blank">Web Sitesine Git</a></button>
                            <br><br><?php doc(14,"Chimera Tool","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="15">
                        <div class="card-content">
                            <h2>Samsung Tool Pro (Z3X)</h2>
                            <p>Samsung Tool Pro (Z3X), Samsung mobil cihazları için tasarlanmış profesyonel bir yazılımdır. Firmware flaşlama, kilit açma, IMEI onarımı, FRP bypass ve cihaz tanı gibi çok sayıda özellik sunar. Teknik servislerde yaygın olarak kullanılan bu araç, çoğu Samsung modelini destekler ve yeni cihazlar ile güvenlik yamalarına uyum sağlamak için düzenli güncellemeler sunar. Samsung Tool Pro, mobil onarım ve bakım işlemlerindeki güvenilirliği ve verimliliği ile tanınır.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">Web Sitesine Git</a></button>
                            <br><br><?php doc(15,"Samsung Tool Pro (Z3X)","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="16">
                        <div class="card-content">
                            <h2>Easy JTAG (Z3X)</h2>
                            <p>Easy JTAG (Z3X), ileri düzey mobil cihaz onarımı ve veri kurtarma için kullanılan profesyonel bir donanım ve yazılım aracıdır. Ölü cihazların onarımı, hasar görmüş depolama yongalarından (eMMC, UFS) veri kurtarma ve bootloader onarımı gibi işlemlerde uzmanlaşır. Teknik servislerde yaygın olarak kullanılan Easy JTAG, çeşitli markalar ve modellerle uyumlu olup yüksek güvenilirlik sunar. Cihazları unbrick etme ve bozulmuş firmware'i geri yükleme gibi karmaşık onarım işlemleri için temel bir araçtır.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">Web Sitesine Git</a></button>
                            <br><br><?php doc(16,"Easy JTAG (Z3X)","tools"); ?>
                        </div>
                    </div>
                    <div class="card" id="17">
                        <div class="card-content">
                            <h2>Pandora (Z3X)</h2>
                            <p>Pandora (Z3X), geniş bir Android cihaz yelpazesinde onarım, kilit açma ve flaşlama işlemleri için tasarlanmış gelişmiş bir mobil onarım aracıdır. Z3X ekibi tarafından geliştirilen bu araç, FRP bypass, IMEI onarımı, bootloader kilidi açma ve cihazın tam flaşlanması gibi işlevleri destekler. Pandora, çeşitli markalarla uyumluluğu ve kullanıcı dostu arayüzü ile tanınır, bu da onu profesyonel mobil onarım teknisyenleri arasında popüler bir seçenek yapar. En son cihazlar ve güvenlik yamaları ile uyumlu kalabilmek için düzenli güncellemeler sunar.</p>
                            <button><a class="no-decoration" href="https://z3x-team.com/" target="_blank">Web Sitesine Git</a></button>
                            <br><br><?php doc(17,"Pandora (Z3X)","tools"); ?>
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