<?php

use Sistema\dev\configuration\Configure;

require 'vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require 'src/rotas/Routs.php';