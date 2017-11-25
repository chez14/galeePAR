<?php
/**
 * This code are initially just a proof of how we should
 * store our user's data securely. If you're the owner of
 * the services that we used to demonstrate, and you feel
 * that this is inappropiate, please contact me first.
 * I'll take down this project.
 * 
 * Best,
 * Chris.
 */

 /**
  * Wait the f, this comments are inttended to explain what
  * files are these. Why do i even write those things?
  *
  * Oh well, ok then, this file are the bootstrapper of our
  * lifeless life. This will trigger ALL THOSE composer's
  * dependecies and OUR CLASS automaticly, so we don't have
  * to do "REQUIRE(SH*T)" and etc.
  * If we can do Autoload, THEN WHY WE DON'T FRIKIN USE IT?!
  * 
  * Well, that will do.
  */
require "vendor/autoload.php";
GaleePAR\Start::instance()->ignite();
