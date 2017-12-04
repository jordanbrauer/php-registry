<?php

namespace Jorb\Registry;

use OutOfBoundsException;

class Registry
{
  /**
   * @var $instance
   */
  private static $instance;

  /**
   * @var array $store Array containing objects, classes, variables, and other data
   */
  private $store;

  /**
   * Constructor method
   */
  protected function __construct ()
  {
    $this->store = array();
  }

  /**
   * Static instance creation method
   *
   * @return self
   */
  public static function __init ()
  {
    if (self::$instance == null)
      self::$instance = new self;

    return self::$instance;
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
    $instance = self::__init();
    $instance->store[$key] = $value;
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
    $instance = self::__init();
    return $instance->store [$key];
  }

  /**
   * Static property check method
   *
   * @param string $key Name of the index being checked
   * @return boolean
   */
  public static function stored ($key)
  {
    $instance = self::__init();
    return isset($instance->store[$key]);
  }

  /**
   * Static unset property method
   *
   * @param string $key Name of the index being removed
   */
  public static function remove ($key)
  {
    $instance = self::__init();
    unset($instance->store[$key]);
  }

  /**
   * Get a nicely formatted output of objects currently in the register
   */
  public static function output ()
  {
    $instance = self::__init();
    return get_object_vars($instance);
  }

  /**
   * Sleep method for data serialization
   */
  private function __sleep ()
  {
    $this->store = serialize($this->store);
  }

  /**
   * Wake method for unserialization of the data
   */
  private function __wakeup ()
  {
    $this->store = unserialize($this->store);
  }
}
