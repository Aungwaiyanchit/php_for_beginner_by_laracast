<?php

use Core\Response;
use Core\Session;

function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

function dd($value)
{
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  exit();
}

function abort($code = 404)
{

  http_response_code(404);
  require base_path("views/{$code}.php");
  exit();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
  if (! $condition) {
    abort($status);
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
  extract($attributes);
  require base_path('views/' . $path);
}

function redirect($path)
{
  header("location: {$path}");
  exit();
}

function old($key, $default = "")
{
  return Session::get('old')[$key] ?? $default;
}
