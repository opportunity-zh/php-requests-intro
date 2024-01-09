<?php
  // guard.php prüft ob der Benutzer eingeloggt ist, wenn nicht wird er auf die index.php weitergeleitet.
  include './auth/guard.php';
?>
<?php 
    // Startet die Session, bzw. stellt sie wieder her, falls vorhanden.
    if (session_status() === PHP_SESSION_NONE)
    {
        session_start();
    }
    // Speichert den Benutzernamen in einer Variable
    $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<?php
  $siteTitle = 'Search';
  include_once './src/components/templates/head.php';
?>
<body>
    <?php include './src/components/nav/main-menu.php'; ?>
    <main class="main-container">
        <h1>Dashboard</h1>
        <?php echo "<p>Welcome, $username</p>"; ?>

        <form method="post" action="/auth/logout.php">
            <input type="submit" value="Log Out" class="login-form-button">
        </form>
    </main> 
</body>
</html>
</body>
</html>