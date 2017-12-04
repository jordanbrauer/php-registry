<?php

namespace Jorb\Registry;

use OutOfBoundsException;

class Registry
{
  /**
   * @var array $store Array containing objects, classes, variables, and other data.
   */
  private static $store;

  /**
   * Constructor method
   */
  public function __construct ()
  {
    self::$store = [];
  }

  /**
   * Static setter method
   *
   * @param string $key The name of the index being set in the register.
   * @param mixed $value The value being assigned to the index ($key).
   * @return void
   */
  public static function add ($key, $value)
  {
    self::$store[$key] = $value;
  }

  /**
   * Static getter method
   *
   * @param string $key Name of the index being retrieved from the register.
   * @return mixed
   */
  public static function load ($key)
  {
    if (self::stored($key) === false)
      throw new OutOfBoundsException("Trying to load undefined index: {$key} from Registry");
    return self::$store[$key];
  }

  /**
   * Static property check method
   *
   * @param string $key Name of the index being checked
   * @return boolean
   */
  public static function stored ($key)
  {
    return isset(self::$store[$key]);
  }

  /**
   * Static unset property method
   *
   * @param string $key Name of the index being removed
   */
  public static function remove ($key)
  {
    unset(self::$store[$key]);
  }

  /**
   * Get a nicely formatted output of objects currently in the register
   */
  public static function output ()
  {
    return get_class_vars(__CLASS__);
  }
}
