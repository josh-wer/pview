# view
A View class for php views. It includes the core features of a conventional view library, but is light weight and uses pure php syntax, no compiling and no need to learn a new syntax.

## Installation

Download and unzip in your project directory.

Or install into a composer project using

composer require lydore/view

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
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
<?php View::endsection() ?>

<?php View::extend('template') ?>
```

### about.view.php

```php
<?php View::set('page_title', 'About View') ?>

<?php View::section('content') ?>
<h1>About Us</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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

## Bind data
You may need a particluar set of data to be available to a view anytime the view is called, this can be done with the bindData method, however the method call needs to be placed such that it runs before the view is requested.

```php
<?php 
View::bindData('home', function (){
// compact method can also be used
$name = 'Jane Doe';
  return [
  'site_name' => 'My site',
  'body' => 'Cotent in my site body',
  'name' => $name
  ];
});

```
In the above example, the variables $site_name, $body and $name would always be available in the home.view.php file

## Sub directories
It is possible to place views in sub directories of the view base directory, for instance if there is a directory layouts in the base directory and it has a view master.view.php, it can be accessed this way

```php
<?php 
View::render('layouts/master');
```

## Escape values
To prevent html injection, values to be displayed in the view can be escaped using the e method

```php
<div><?= View::e($_GET['user']) ?></div>
```


