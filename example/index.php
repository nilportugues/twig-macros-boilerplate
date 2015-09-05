<?php
require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem();
$loader->addPath(realpath('./../macros/'), 'macros');
$loader->addPath(realpath('./../theme/default'), 'default');
$loader->addPath(realpath('./../theme/bootstrap3'), 'bootstrap');
$loader->addPath(realpath('./layout/'));

$twig = new Twig_Environment(
    $loader,
   // ['cache' => '../cache/']
    []
);


echo $twig->loadTemplate('./example1.html.twig')->render([]);