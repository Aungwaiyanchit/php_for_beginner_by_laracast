<?php require "partials/header.php" ?>
<?php require "partials/nav.php" ?>
<?php require "partials/banner.php" ?>

<main>
  <div class="mx-auto p-5 text-white">
    <p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?> Welcome to the home page.</p>
  </div>
</main>

<?php require "partials/footer.php" ?>
