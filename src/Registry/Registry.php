<?php

namespace Jorb\Registry;

class Registry
{
  /**
   * @property object $instance */
  private static $instance;

  /**
   * @property array $store Array containing objects, classes, variables, and other data */
  private $store;

  /**
   * Constructor method
   * @method __construct
   */
  protected function __construct ()
  {
    $this->store = array ();
  }

  /**
   * Static instance creation
   * @method __init
   * @return self
   */
  public static function __init ()
  {
    if ( self::$instance == null ) {
      self::$instance = new self;
    }
    return self::$instance;
  }

  /**
   * Static setter method
   * @method add
   * @param string $key The name of the index being set in the register.
   * @param mixed $value The value being assigned to the index ($key)
   */
  public static function add ( $key , $value )
  {
    $instance = self::__init ();
    $instance->store [ $key ] = $value;
  }
}
