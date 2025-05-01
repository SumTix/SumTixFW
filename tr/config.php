<?php
$host = "localhost";
$dbname = "sumtix";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
function doc(int $item_id , string $item_name , string $item_page){
    global $user;
    global $pdo;
    $uu = $user->data['user_id'];
    $is_favorite = false;
    if ($uu != ANONYMOUS) {
        $cmd = $pdo->prepare("SELECT COUNT(*) FROM user_favorites WHERE user_id = ? AND item_id = ?");
        $cmd->execute([$uu, $item_id]);
        $is_favorite = $cmd->fetchColumn() > 0;
    }
    
    $action = $is_favorite ? 'remove_favorite.php' : 'add_favorite.php';
    $button_text = $is_favorite ? '⭐ Favorilerden Çıkar' : '⭐ Favorilere Ekle';
    
    ?>
    
    <form action="<?= $action ?>" method="POST">
        <input type="hidden" name="category" value="<?= $item_page ?>">
        <input type="hidden" name="item_id" value="<?= $item_id ?>">
        <input type="hidden" name="item_name" value="<?= $item_name ?>">
        <input style="
            background-color: #6d28d9;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 500;" 
            type="submit" value="<?= $button_text ?>">
    </form>
    <br>
    <?php if ($user->data['user_id'] != ANONYMOUS) { ?>
        <form action="add_comment.php" method="POST">
        <input type="hidden" name="category" value="<?= $item_page ?>">
            <input type="hidden" name="item_id" value="<?= $item_id ?>">
            <textarea name="comment" required placeholder="Yorumunuzu yazın..." style="width:100%; height:80px;"></textarea>
            <button type="submit" style="background-color:#6d28d9; color:white; padding:10px 15px; border:none; border-radius:5px; cursor:pointer;">Yorumu Gönder</button>
        </form>
    <?php } else { ?>
        <p>Yorum yapabilmek için giriş yapmalısınız.</p>
    <?php } ?>
    <?php
    $cmd = $pdo->prepare("SELECT * 
    FROM comments c 
    JOIN phpbb_users u ON c.user_id = u.user_id 
    WHERE c.item_id = $item_id 
    ORDER BY c.created_at DESC");
    $cmd->execute();
    $comments = $cmd->fetchAll(PDO::FETCH_ASSOC);
    if ($comments) {
        echo "<div style='margin-top:20px;'>";
        foreach ($comments as $comment) {
            $cmd2 = $pdo->prepare("SELECT (username) FROM phpbb_users WHERE user_id = {$comment['user_id']}");
            $cmd2->execute();
            $users = $cmd2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($users as $u){
                $co_username = $u['username'];
            }
            echo "<hr><p><strong>{$co_username}:</strong> {$comment['comment']} <br><small>{$comment['created_at']}</small></p>";
            $is_admin = isset($user->data['is_admin']) ? $user->data['is_admin'] : false;
            if ($comment['user_id'] == $user->data['user_id'] || $user->data['user_id'] == 2) {
                echo "<form action='delete_comment.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='category' value='{$item_page}'>
                        <input type='hidden' name='item_id' value='{$item_id}'>
                        <input type='hidden' name='comment_id' value='{$comment['id']}'>
                        <button type='submit' style='background-color:#dc2626; color:white; padding:5px 10px; border:none; border-radius:5px; cursor:pointer;'>Sil</button>
                      </form>";
            }
            
        }
        echo "</div>";
    } else {
        echo "<p>Henüz yorum yapılmamış.</p>";
    }
    }

?>
