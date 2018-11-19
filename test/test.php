#!/usr/bin/php

<?php
/**
 * Created by PhpStorm.
 * User: raphaeu
 * Date: 12/11/18
 * Time: 14:45
 */

use \raphaeu\ParseFile;

require __DIR__.'/../vendor/autoload.php';

ParseFile::setFile(__DIR__.'/../test/config.ini');

var_dump(ParseFile::get('contexto1'));
