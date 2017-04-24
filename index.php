<?php

require_once 'vendor/autoload.php';

use \Jorb\Registry\Registry as Registry;


// Start a new instance of the Registry (do this in your bootstrap code)
// Regular usage like: `$Registry = new Registry();` will throw an error
Registry::__init();

// Add anything you want to the registry
Registry::add('string', 'Hello World!');
Registry::add('integer', 1);
Registry::add('boolean', true);
Registry::add('array', ['one', 'two', 'three']);
Registry::add('object', new DateTime());

// Remove any data from the registry
Registry::add('foo', 'delete me!');
Registry::add('bar', 'keep me!');

Registry::remove('foo');

// Check if an object is stored in the registry
Registry::stored('foo'); // returns false
Registry::stored('bar'); // returns true

// Retrieve a value from the registry
Registry::load('string'); // returns 'Hello World!'

// Get the entire current contents of the registry
var_dump(Registry::output());
