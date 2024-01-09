<?php
  // guard.php prüft ob der Benutzer eingeloggt ist, wenn nicht wird er auf die index.php weitergeleitet.
  include './auth/guard.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
  // dynamischer Titel, diese Variable wird in der Komponente head.php verwendet
  $siteTitle = 'Search';
  include_once './src/components/templates/head.php';
?>
<body>
    <?php include './src/components/nav/main-menu.php'; ?>
    <main class="main-container">
        <?php include './src/components/nav/searchbar.php'; ?>
    </main>
    </body>
</html>