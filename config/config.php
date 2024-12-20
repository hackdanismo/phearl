<?php
// Current framework version
const PHEARL_VERSION = "0.0.1";

// Database configuration

/* 
* The use of const over define allows us to work with classes, namespaces and global scope.
* Resolves at compile-time, making const slightly faster than define.
* Cleaner syntax, preferred in modern PHP projects with define being compatible with PHP 5.3 or earlier.
*/
const DB_HOSTNAME = "localhost";
const DB_USERNAME = "username";
const DB_PASSWORD = "password";
const DB_DATABASE = "phearl_db";