<?php
require_once 'App/Core/Core.php';
require_once 'Lib/Database/Connection.php';

require_once 'App/Controller/HomeController.php';
require_once 'App/Controller/ErrorController.php';
require_once 'App/Controller/PostController.php';
require_once 'App/Controller/SobreController.php';
require_once 'App/Controller/AdminController.php';

require_once 'App/Model/Postagem.php';
require_once 'App/Model/Comentario.php';

require_once 'vendor/autoload.php';


$template = file_get_contents('App/Template/estrutura.html');

ob_start();
$core = new Core;
$core->start($_GET);

$saida = ob_get_contents();
ob_end_clean();

$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $tplPronto;