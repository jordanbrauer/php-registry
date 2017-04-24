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
}
