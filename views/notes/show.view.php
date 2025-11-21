<?php

/** @var array{body: string} $note */ ?>
<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto p-6">
    <p class="py-3">
      <a href="/notes" class="text-blue-400 underline">Go Back</a>
    </p>
    <p><?= htmlspecialchars($note['body']) ?></p>

    <div class="flex flex-row gap-3 items-center mt-6">
      <a href="/note/edit?id=<?= $note['id'] ?>" class="bg-blue-400 p-2 text-xs text-white rounded">Edit</a>

      <form method="POST">
        <input type="text" name="_method" hidden value="DELETE">
        <input type="text" name="id" hidden value="<?= $note['id'] ?>">
        <button class="bg-red-400 p-2 text-xs text-white rounded">Delete</button>
      </form>

    </div>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
