<?php
/**
 * Created by PhpStorm.
 * User: alexi_000
 * Date: 12/02/2018
 * Time: 14:00
 */

spl_autoload_register(
    function ( $class ) {
        include_once strtolower($class ). '_Class.php';
        //include_once( 'functions.php' );
    }
);