# Autoloader

A simple class for class autoloading based on classes namespaces

## Installation

Add a dependency on `andou/autoloader` to your project's `composer.json` file if you use [Composer](http://getcomposer.org/) to manage the dependencies of your project.
You have to also add the relative repository.

Here is a minimal example of a `composer.json` file that just defines a dependency on andou/autoloader:

```json
{
    "require": {
        "andou/autoloader": "*"
    },
    "repositories": [
    {
      "type": "git",
      "url": "https://github.com/andou/autoloader.git"
    }
  ],
}
```    

## Usage Examples

```php
require_once './vendor/autoload.php';

new Andou\Autoloader(__DIR__ . "/path/to/your/classes");
```

