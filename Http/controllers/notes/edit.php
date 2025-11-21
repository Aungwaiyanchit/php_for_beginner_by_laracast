<?php


use Core\App;
use Core\DataBase;


$currentUserId = 1;

$db = App::resolve(DataBase::class);

$query = 'SELECT * FROM notes WHERE id = :id';

$note = $db->query($query, ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
  'heading' => "Edit Note",
  'errors' => [],
  'note' => $note
]);
