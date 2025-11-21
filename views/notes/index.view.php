<?php

/** @var array<int, array{id: int, body: string}> $notes */

require base_path('views/partials/header.php');
require base_path('views/partials/nav.php');
require base_path('views/partials/banner.php');
?>

<main>
  <div class="mx-auto p-6">
    <p>
      <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
    </p>

    <?php foreach ($notes as $note) { ?>
      <li>
        <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 underline">
          <?= htmlspecialchars($note['body']) ?>
        </a>
      </li>
    <?php } ?>
  </div>
</main>

<?php require base_path('views/partials/footer.php'); ?>
