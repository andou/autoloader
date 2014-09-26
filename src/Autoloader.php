<?php

namespace Andou\Autoloader;

/**
 * Your own personal Autoloader.
 * 
 * The MIT License (MIT)
 * 
 * Copyright (c) 2014 Antonio Pastorino <antonio.pastorino@gmail.com>
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * 
 * @author Antonio Pastorino <antonio.pastorino@gmail.com>
 * @category autoloader
 * @package andou/autoloader
 * @copyright MIT License (http://opensource.org/licenses/MIT)
 */
class Autoloader {

  /**
   * The base directory from which to start atuoloading
   *
   * @var string 
   */
  protected $_base_dir = NULL;

  /**
   * Class constructor. Sets the base directory for autoloading
   * 
   * @param string $base_directory
   */
  public function __construct($base_directory) {
    $this->_register($base_directory);
  }

  /**
   * Autoloading method based on classname and namespace
   * 
   * @param string $classname
   */
  public function autoload($classname) {
    $_fl = str_replace("\\", "/", sprintf("%s/%s.php", $this->_base_dir, $classname));
    $this->_autoload($_fl);
  }

  /**
   * Registers an autoloading method
   * 
   * @param string $base_directory
   */
  protected function _register($base_directory) {
    $this->_base_dir = $base_directory;
    spl_autoload_register(array($this, 'autoload'));
  }

  /**
   * Generic loading of classes by filename
   * 
   * @param string $_fl
   */
  protected function _autoload($_fl) {
    if (file_exists($_fl)) {
      include_once $_fl;
    }
  }

}
