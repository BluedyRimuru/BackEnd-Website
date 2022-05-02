<?php

use Quizz\Service\TwigCore;

session_start();

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

$twig = TwigCore::getEnvironment();

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/', 'Quizz\Controller\HomeController');
    $r->addRoute('POST', '/connexion', 'Quizz\Controller\ConnexionController');
    $r->addRoute('POST', '/delete', 'Quizz\Controller\DeleteUserController');
    $r->addRoute('POST', '/createadminaccount', 'Quizz\Controller\CreateAdminController');
    $r->addRoute('POST', '/modifadmincontroller', 'Quizz\Controller\ModifAdminController');
    $r->addRoute('POST', '/createquestionnairecontroller', 'Quizz\Controller\CreateQuestionnaireController');
    $r->addRoute('GET', '/question', 'Quizz\Controller\QuestionController');
    $r->addRoute('GET', '/admin', 'Quizz\Controller\AdminHomeController');
    $r->addRoute('GET', '/gestion-questionnaire', 'Quizz\Controller\GestionQuestionnaireController');
    $r->addRoute('GET', '/gestion-administrateur', 'Quizz\Controller\GestionAdministrateurController');
    $r->addRoute('GET', '/gestion-utilisateur', 'Quizz\Controller\GestionUtilisateurController');
    $r->addRoute('GET', '/espace-personnel', 'Quizz\Controller\EspacePersonnelController');
    $r->addRoute('GET', '/deconnexion', 'Quizz\Controller\DeconnexionController');
    // {id} must be a number (\d+)
//    $r->addRoute('GET', '/user/{id:\d+}', 'Quizz\Controller\UserController');
    $r->addRoute('GET', '/gestion-utilisateur/{id:\d+}', 'Quizz\Controller\DeleteUserController');
    // The /{title} suffix is optional
//    $r->addRoute('GET', '/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo $twig->render('erreur.html.twig', [
        ]);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $controller = new $handler(); // or $routeInfo[1];
        $controller->setInput($_GET, $_POST, $vars);
        $controller->getOutput();
        break;
}