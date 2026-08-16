<?php
//This file belongs to the BookFind project.
//
//BookFind is distributed under the terms of the GNU Affero General Public License v3.0.
//
//Copyright (C) 2025 Chromared
?>

<?php require 'actions/functions/sessionInit.php'; ?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php include 'actions/users/decodeThemeAction.php'; ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <?php include 'includes/header.php'; ?>
</head>

<body>
  <?php include 'includes/navbar.php'; ?>
  <main class="page">
    <div class="container">
      <section class="hero">
        <span class="hero__eyebrow">
          <svg class="icon icon--sm"><use href="#i-book"/></svg>
          Library of the C.D.I.
        </span>
        <h1 class="hero__title">All the C.D.I. books<br>within reach of your search.</h1>
        <p class="hero__text">Search, borrow and manage your school's books through a simple, fast interface.</p>
        <form method="GET" action="books.php" class="hero__search">
          <div class="input-group">
            <input type="text" name="s" class="input" placeholder="Title, author, ISBN, genre…" aria-label="Search for a book"/>
            <button class="btn btn--primary" type="submit">
              <svg class="icon"><use href="#i-search"/></svg>
              Search
            </button>
          </div>
        </form>
      </section>

      <section class="steps">
        <div class="section-head">
          <h2>How does it work?</h2>
          <p>Three steps to get the most out of the library.</p>
        </div>
        <div class="grid grid--3">
          <div class="step">
            <div class="step__num">1</div>
            <h3>Search</h3>
            <p>Find the book you're looking for across the entire C.D.I. catalog.</p>
          </div>
          <div class="step">
            <div class="step__num">2</div>
            <h3>Borrow</h3>
            <p>A manager records your loan in a few seconds.</p>
          </div>
          <div class="step">
            <div class="step__num">3</div>
            <h3>Track</h3>
            <p>Find your due dates and returns from your profile.</p>
          </div>
        </div>
      </section>

      <?php if (!isset($_SESSION['auth'])) { ?>
        <section class="cta">
          <div class="cta__inner">
            <h2>Ready to explore the catalog?</h2>
            <p>Create an account to borrow and track your books.</p>
            <div class="btn-group">
              <a href="signup.php" class="btn btn--primary btn--lg">Sign up</a>
              <a href="login.php" class="btn btn--secondary btn--lg">Sign in</a>
            </div>
          </div>
        </section>
      <?php } ?>
    </div>
  </main>

  <?php if (isset($_GET['signup']) and isset($_SESSION['auth'])) { ?>
    <div class="modal" id="successModal">
      <div class="modal__backdrop">
        <div class="modal__dialog" role="dialog" aria-modal="true" aria-labelledby="successModalLabel">
          <div class="modal__header">
            <h2 class="modal__title" id="successModalLabel">Signup successful</h2>
            <button type="button" class="modal__close" data-modal-close aria-label="Close">
              <svg class="icon"><use href="#i-x"/></svg>
            </button>
          </div>
          <div class="modal__body">
            Your account has been created successfully. To sign in, you will need your username, which is the following: <strong><?= htmlspecialchars($_SESSION['username']); ?></strong>.
          </div>
          <div class="modal__footer">
            <button type="button" class="btn btn--success" data-modal-close>OK</button>
          </div>
        </div>
      </div>
    </div>
    <script nonce="<?= htmlspecialchars($_SESSION['csp_nonce'] ?? '') ?>">
      document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById('successModal');
        modal.classList.add('is-open');
        document.body.classList.add('modal-open');
      });
    </script>
  <?php } ?>
  <?php include 'includes/footer.php'; ?>
</body>

</html>
