# pview
A View class for php views. It includes the core features of a conventional view library, but is light weight and uses pure php syntax, no compiling and no need to learn a new syntax.

## Installation

Download and unzip in your project directory.

## Usage

```php
<?php

require_once 'path/to/View.php';

// Set directory containing all views
View::setBaseDir('path/to/views/dir');

```

## The view files
All view files should be saved as file-name.view.php in the base view directory e.g homepage.view.php
A view can contain regular html

### A simple view
```php
<!DOCTYPE html>
<html>
   <head>
      <title>View</title>
   </head>
   
   <body>
      <h1>Hello World</h1>
   </body>
</html>
```

In addition, views can have sections, vars and can be extended or yielded. The following example shows this functionality.

template.view.php is a master template view which home.view.php and about.view.php extend to use as their layout

### template.view.php
```php
<!DOCTYPE html>
<html>
   <head>
      <title><?= View::get('page_title') ?></title>
   </head>
   
   <body>
      <?php View::yield('content') ?>
   </body>
</html>
```
### home.view.php

```php
<?php View::set('page_title', 'View Home') ?>

<?php View::section('content') ?>
<h1>Hello World</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minima odit sunt cum. Aliquam recusandae eum in. Debitis magni in error, est sed minus, molestiae. Beatae, quae ea error sequi.</p>
<?php View::endsection() ?>

<?php View::extend('template') ?>
```

### about.view.php

```php
<?php View::set('page_title', 'About View') ?>

<?php View::section('content') ?>
<h1>About Us</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate minima odit sunt cum. Aliquam recusandae eum in. Debitis magni in error, est sed minus, molestiae. Beatae, quae ea error sequi.</p>
<?php View::endsection() ?>

<?php View::extend('template') ?>
```

## Using the view
Now the view has been defined, next is to call the view from our code. To do that, use:
```php
<?php
View::render('home');
```
Variables can also be passed to the view by passing an associative array to the view method

```php
<?php
$name = 'John Doe';

View::render('home', ['name' => $name]);

// OR use the compact method

View::render('home', compact('name'));
```
### Including views
Views can be included in other views by using the include method in the view 

```php
<div>
<?php View::include('side-bar') ?>
</div>
```





