<?php
require_once '../vendor/autoload.php';

$loader = new Twig_Loader_Filesystem();
$loader->addPath(realpath('./../macros/'), 'macros');
$loader->addPath(realpath('./../theme/default'), 'default');
$loader->addPath(realpath('./../theme/bootstrap3'), 'bootstrap');
$loader->addPath(realpath('./../theme/bootstrap3_flat-ui'), 'flatui');
$loader->addPath(realpath('./layout/'));

$twig = new Twig_Environment(
    $loader,
   // ['cache' => '../cache/']
    []
);

$pages = [
    'tabs'  => './components/tabs.html.twig',
    'share' => './components/share.html.twig',
    'maps'  => './components/maps.html.twig',
    'images'  => './components/images.html.twig',
    'blog-post-lifehack'  => './pages/blog/post/blog-post-lifehack.html.twig',
];

$page = './index.html.twig';
if(!empty($_GET) && !empty($pages[$_GET['page']])) {
    $page = $pages[$_GET['page']];
}

echo $twig->loadTemplate($page)->render([]);