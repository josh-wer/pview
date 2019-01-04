<?php
// Helper method for the render method
// use view('home', ['name' => $name]) rather than View::render('home', ['name' => $name]) 
function view($view, $args = []) {
  View::render($view, $args);
}

