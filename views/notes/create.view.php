<?php

/** @var array{body: string} $note */ ?>
<?php require base_path('views/partials/header.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto p-6">
    <form method="post" action="/notes" class="bg-gray-800 p-4 pt-2 rounded">
      <div class="">
        <div class="border-b border-white/10 pb-12">
          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full">
              <label for="body" class="block text-sm/6 font-medium text-white">Body description</label>
              <div class="mt-2">
                <textarea
                  id="body"
                  name="body"
                  rows="3"
                  placeholder="Type something to create a new note..."
                  class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"><?= $_POST['body'] ?? '' ?></textarea>
                <?php if (isset($errors['body'])) : ?>
                  <p class="text-red-400 text-sm mt-4"><?= $errors['body'] ?></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>
      </div>
    </form>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
