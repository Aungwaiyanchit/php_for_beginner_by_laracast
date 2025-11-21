<?php

use Core\Validator;
use Core\DataBase;
use Core\App;

$db = App::resolve(DataBase::class);

$errors = [];

$body = $_POST['body'];
$query = 'INSERT INTO notes (body, user_id) VALUES (:body, :user_id)';

if (!Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'Body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
  return view('notes/create.view.php', [
    'heading' => "Create Note",
    'errors' => $errors
  ]);
}

$db->query($query, ['body' => $_POST['body'], 'user_id' => 1]);

header('location: /notes');
die();
