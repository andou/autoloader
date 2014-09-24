<?php

namespace Andou;

/**
 * This class is accountable of classes autoloading
 */
class Autoloader {

  protected $_base_dir = NULL;

  public function __construct($base_directory) {
    $this->_register($base_directory);
  }

  /**
   * Registers autoloading methods
   */
  protected function _register($base_directory) {
    $this->_base_dir = $base_directory;
    spl_autoload_register(array($this, 'autoload'));
  }

  /**
   * Autoloads check classes
   * 
   * @param string $classname
   */
  public function autoload($classname) {
    $_fl = str_replace("\\", "/", sprintf("%s/%s.php", $this->_base_dir, $classname));
    $this->_autoload($_fl);
  }

  /**
   * Generic loading by filename
   * 
   * @param string $_fl
   */
  protected function _autoload($_fl) {
    if (file_exists($_fl)) {
      include_once $_fl;
    }
  }

}
