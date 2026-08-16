<?php
//This file belongs to the BookFind project.
//
//BookFind is distributed under the terms of the GNU Affero General Public License v3.0.
//
//Copyright (C) 2025 Chromared
?>

<?php if (session_status() === PHP_SESSION_NONE) {
  require '../actions/functions/sessionInit.php';
} ?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php include '../actions/users/decodeThemeAction.php'; ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error 403</title>
  <?php include '../includes/header.php'; ?>
</head>

<body>
  <main class="page">
    <div class="container">
      <section class="hero">
        <h1 class="hero__title">Error 403</h1>
        <p class="hero__text">You do not have the required permissions to access this page.</p>
        <?php if (!isset($_SESSION['auth'])) { ?>
          <a href="/login.php" class="btn btn--primary">Sign in</a>
        <?php } ?>
      </section>
      <div class="narrow mt-4">
        <form method="GET" action="books.php">
          <div class="input-group">
            <input type="text" name="s" class="input" placeholder="Search for a book" aria-label="Search for a book" />
            <button class="btn btn--outline" type="submit">
              <svg class="icon"><use href="#i-search"/></svg>
              Search
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <?php include '../includes/footer.php'; ?>
</body>

</html>
