<?php


use Core\App;
use Core\DataBase;
use Core\Validator;

$currentUserId = 1;

$db = App::resolve(DataBase::class);

$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$erros = [];

if (!Validator::string($_POST['body'], 1, 1)) {
  $errors['body'] = 'Body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
  return view('notes/edit.view.php', [
    'heading' => "Edit Note",
    'errors' => $errors,
    'note' => $note
  ]);
}

$body = $_POST['body'];
$query = 'UPDATE notes SET body=:body WHERE id = :id';

$note = $db->query($query, [
  'body' => $_POST['body'],
  'id' => $_POST['id']
]);

header('location: /notes');
die();

