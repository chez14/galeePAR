<?php
Namespace GaleePAR\System;

abstract class Jombloton {
    private static $ini;

    /**
     * This will make our class will be singletonable. This class
     * are actually got copy-pasted from FatFree's Prefab class,
     * which you can find it here:
     * https://github.com/bcosca/fatfree-core/blob/master/base.php#L24
     * 
     * You can always add parameters into it if your instance requires
     * it.
     */
    public static function instance() {
		if (!Registry::exists($class=get_called_class())) {
			$ref=new \Reflectionclass($class);
			$args=func_get_args();
			Registry::set($class,
				$args?$ref->newinstanceargs($args):new $class);
		}
		return Registry::get($class);
	}
}