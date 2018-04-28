<?php
require __DIR__ . '/../app/app.php';

$app->run();
?>

$app->get('/', function (Request $request, Response $response) {
echo "Página  principal de MasterMindSlim";
});
$app->run();


