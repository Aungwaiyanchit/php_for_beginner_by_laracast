<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
  protected $errors = [];

  public function __construct(public array $attributes)
  {
    if (!Validator::email($this->attributes['email'])) {
      $this->errors['email'] =  "Please provide a valid email";
    }

    if (!Validator::string($this->attributes['password'], 7, 255)) {
      $this->errors['password'] =  "Please provide a password at leath 7 characters";
    }
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);
    return $instance->failed() ? $instance->throw() : $instance;
  }

  public function throw()
  {
    throw ValidationException::throw($this->errors(), $this->attributes);
  }

  public function failed()
  {
    return count($this->errors());
  }

  public function errors(): array
  {
    return $this->errors;
  }

  public function error($filed, $message)
  {
    $this->errors[$filed] = $message;
    return $this;
  }
}
