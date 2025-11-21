<?php

use Core\DataBase;
use Core\App;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(DataBase::class);

$errors = [];

if (!Validator::email($email)) {
  $errors['email'] =  "Please provide a valid email";
}

if (!Validator::string($password, 7, 255)) {
  $errors['password'] =  "Please provide a password at leath 7 characters";
}

if (!empty($errors)) {
  return view("/registration/create.view.php", [
    'errors' => $errors
  ]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
  'email' => $email
])->find();

if ($user) {
  return header('location: /');
}

// create new user
$db->query("INSERT INTO users ( email, password) VALUES (:email, :password);", [
  'email' => $email,
  'password' => password_hash($password, PASSWORD_BCRYPT)
]);

$_SESSION['user'] = [
  'email' => $email
];

header('location: /');
exit();
