<?php

use Core\DataBase;
use Core\App;

$db = App::resolve(DataBase::class);
$query = 'SELECT * FROM notes WHERE user_id = 1';

$notes = $db->query($query)->get();

view('notes/index.view.php', [
  'heading' => "My Notes",
  'notes' => $notes
]);
