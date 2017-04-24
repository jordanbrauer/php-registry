# php-registry

A simple implementation of a static registry class to store global application key/values.

## Getting Started

```shell
$ git clone https://github.com/jordanbrauer/php-registry.git
$ cd php-registry
$ composer install --optimize-autoloader
```

## Example Usage

Below you will find example usage (also found in the `index.php` file) of the Registry and its' API.

### Initialize a Registry

>`Registry::__init()`

Start a new instance of the Registry (do this in your bootstrap code to have the rest of your application have access to this instance).

```php
Registry::__init();
```

_Note: Regular usage like `$Registry = new Registry();` will throw an error due to proteced `__construct()` function._

### Add Data to Registry

>`Registry::add(string $key, mixed $value)`

Add anything you want to the registry such as strings, integers, booleans, arrays, and objects.

```php
Registry::add('string', 'Hello World!');
Registry::add('integer', 1);
Registry::add('boolean', true);
Registry::add('array', ['one', 'two', 'three']);
Registry::add('object', new DateTime());
```

### Remove Data from Registry

>`Registry::remove(string $key)`

Remove any data from the registry by passing the property name to the remove method.

```php
Registry::add('foo', 'delete me!');
Registry::add('bar', 'keep me!');

Registry::remove('foo');
```

### Check if Data is Stored

>`Registry::stored(string $key)`

You can check if an object or any kind of data is already stored in the registry before doing something with it. This method will return a boolean.

```php
Registry::stored('foo'); // returns false
Registry::stored('bar'); // returns true
```

### Retrive Data from Registry

>`Registry::load(string $key)`

Retrieve a value from the registry for use in your script. You will have to `echo`/`print`/`print_r`/`var_dump` the result yourself as this method only returns the value of the property being loaded.

```php
Registry::load('string'); // returns 'Hello World!'
```

### Dump Contents of Registry

>`Registry::output()`

If for whatever reason you need the entire contents of the registry, you can do so by doing the following.

```php
var_dump(Registry::output());
```

### Try it Yourself!

Run the `index.php` file from your command line to get the example out.

```shell
$ php -f index.php
```
>```
array(1) {
  ["store"]=>
  array(6) {
    ["string"]=>
    string(12) "Hello World!"
    ["integer"]=>
    int(1)
    ["boolean"]=>
    bool(true)
    ["array"]=>
    array(3) {
      [0]=>
      string(3) "one"
      [1]=>
      string(3) "two"
      [2]=>
      string(5) "three"
    }
    ["object"]=>
    object(DateTime)#2 (3) {
      ["date"]=>
      string(26) "2017-04-24 12:41:57.000000"
      ["timezone_type"]=>
      int(3)
      ["timezone"]=>
      string(15) "America/Chicago"
    }
    ["bar"]=>
    string(8) "keep me!"
  }
}
```
