<?php
// Helper function for the render method
// use view('home', ['name' => $name]) rather than View::render('home', ['name' => $name]) 
function view($view, $args = []) {
  View::render($view, $args);
}

// Helper function for View::e()
function vesc($values){
	return View::e($value);
}

