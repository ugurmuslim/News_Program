<?php

if(!defined('DIR_FS_LIB')){
	define('DIR_FS_LIB', __DIR__ . DIRECTORY_SEPARATOR);
}

/**
 * Register the autoloader for the Imflexi Gear SDK classes.
 *
 * Based off the official PSR-4 autoloader example found here:
 * https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader-examples.md
 *
 * @param string $class The fully-qualified class name.
 *
 * @return void
 */
spl_autoload_register(function ($class) {
	// project-specific namespace prefix
	$prefix = 'Altinkaynak\\';
	
	// For backwards compatibility
	$customBaseDir = DIR_FS_LIB;
	
	// base directory for the namespace prefix
	$baseDir = $customBaseDir ?: __DIR__ . DIRECTORY_SEPARATOR;
	
	// does the class use the namespace prefix?
	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !== 0) {
		// no, move to the next registered autoloader
		
		return;
	}
	
	// get the relative class name
	$relativeClass = substr($class, $len);
	
	// replace the namespace prefix with the base directory, replace namespace
	// separators with directory separators in the relative class name, append
	// with .php
	$file = rtrim($baseDir, '/') . '/' . str_replace('\\', '/', $relativeClass) . '.php';
	
	// if the file exists, require it
	if (file_exists($file)) {
		require $file;
	}
});