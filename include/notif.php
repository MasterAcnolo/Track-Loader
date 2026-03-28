<?php
if (isset($_SESSION['flash'])) {
    $notif = $_SESSION['flash'];
    unset($_SESSION['flash']);
} elseif (isset($_COOKIE['logout_notif'])) {
    $notif = json_decode($_COOKIE['logout_notif'], true);
    setcookie('logout_notif', '', time() - 3600, '/');
}
?>
<?php if (!empty($notif)): ?>
<div class="notification <?= $notif['type'] ?>">
    <div class="notif-icon"></div>
    <div class="notif-text">
        <p class="notif-title"><?= htmlspecialchars($notif['message']) ?></p>
    </div>
</div>
<?php endif; ?>