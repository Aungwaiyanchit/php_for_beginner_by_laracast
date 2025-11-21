<?php

use Core\App;
use Core\DataBase;

$currentUserId = 1;

$db = App::resolve(DataBase::class);

$query = 'SELECT * FROM notes WHERE id = :id';

$note = $db->query($query, ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("DELETE from notes WHERE id = :id", [
  'id' => $_GET['id']
]);

header('location: /notes');

