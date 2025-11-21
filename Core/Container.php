<?php

namespace Core;

class Container
{
  protected $bindings = [];

  function bind($key, $resover): void
  {
    $this->bindings[$key] = $resover;
  }

  function resolve($key)
  {
    if (!array_key_exists($key,  $this->bindings)) {
      throw new \Exception('No matching binding found for {$key}');
    }

    $resolver = $this->bindings[$key];
    return call_user_func($resolver);
  }
}
