<!DOCTYPE html>
<html lang="en">
<?php
  // Dynamischer Titel, diese Variable wird in der Komponente head.php verwendet
  $siteTitle = 'Search'; // erforderlich für head.php
  // Einbinden der Komponente head.php um die gleichen head Infomationen auf jeder Seite zu haben
  include_once './src/components/templates/head.php';
?>
<body>
<?php include './src/components/nav/main-menu.php';?>
<main class="main-container">
  <form method="post" action="/auth/login.php" class="login-form">
    <label for="username" class="login-form-label">Username:</label>
    <input type="text" name="username" id="username" class="login-form-input-text">
    <label for="password" class="login-form-label">password:</label>
    <input type="password" name="password" id="password" class="login-form-input-text">
    <input type="submit" value="Log In" class="login-form-button">
  </form>
</main>
</body>
</html>