# MODO DE USO:


## Crear jugada:

Petición 4:
```
$ curl -X POST http://localhost:8081/api/v1/jugadas -H 'Content-Type: application/json' --data idJugada=1 --data nombrePartida=partida1 --data codigoJugada=ABDECD
```

Respuesta 4:
```
{
    "code": 201,
    "status": "success",
    "message": {
        "idJugada": "1",
        "nombrePartida": "partida1",
        "fecha": {
            "date": "2018-04-30 17:21:02.000000",
            "timezone_type": 3,
            "timezone": "Europe\/Berlin"
        },
        "codigoJugada": "ABDECD",
        "resultado": "KO"
    }
}<br />
<font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
<tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: fecha in C:\Sites\MastermindSlim\app\src\Resource\Jugada\JugadaResource.php on line <i>62</i></th></tr>
<tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
<tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
<tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0160</td><td bgcolor='#eeeeec' align='right'>374648</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\Sites\MastermindSlim\public\index.php' bgcolor='#eeeeec'>...\index.php<b>:</b>0</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0780</td><td bgcolor='#eeeeec' align='right'>860400</td><td bgcolor='#eeeeec'>Slim\App->run( ??? )</td><td title='C:\Sites\MastermindSlim\public\index.php' bgcolor='#eeeeec'>...\index.php<b>:</b>4</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>3</td><td bgcolor='#eeeeec' align='center'>0.1040</td><td bgcolor='#eeeeec' align='right'>1388936</td><td bgcolor='#eeeeec'>Slim\App->process( ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\App.php' bgcolor='#eeeeec'>...\App.php<b>:</b>314</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>4</td><td bgcolor='#eeeeec' align='center'>0.1040</td><td bgcolor='#eeeeec' align='right'>1388912</td><td bgcolor='#eeeeec'>Slim\App->callMiddlewareStack( ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\App.php' bgcolor='#eeeeec'>...\App.php<b>:</b>406</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>5</td><td bgcolor='#eeeeec' align='center'>0.1040</td><td bgcolor='#eeeeec' align='right'>1388912</td><td bgcolor='#eeeeec'>Slim\App->__invoke( ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\MiddlewareAwareTrait.php' bgcolor='#eeeeec'>...\MiddlewareAwareTrait.php<b>:</b>117</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>6</td><td bgcolor='#eeeeec' align='center'>0.1150</td><td bgcolor='#eeeeec' align='right'>1453920</td><td bgcolor='#eeeeec'>Slim\Route->run( ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\App.php' bgcolor='#eeeeec'>...\App.php<b>:</b>513</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>7</td><td bgcolor='#eeeeec' align='center'>0.1150</td><td bgcolor='#eeeeec' align='right'>1453920</td><td bgcolor='#eeeeec'>Slim\Route->callMiddlewareStack( ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\Route.php' bgcolor='#eeeeec'>...\Route.php<b>:</b>313</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>8</td><td bgcolor='#eeeeec' align='center'>0.1150</td><td bgcolor='#eeeeec' align='right'>1453920</td><td bgcolor='#eeeeec'>Slim\Route->__invoke( ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\MiddlewareAwareTrait.php' bgcolor='#eeeeec'>...\MiddlewareAwareTrait.php<b>:</b>117</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>9</td><td bgcolor='#eeeeec' align='center'>0.1280</td><td bgcolor='#eeeeec' align='right'>1550864</td><td bgcolor='#eeeeec'>Slim\Handlers\Strategies\RequestResponse->__invoke( ???, ???, ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\Route.php' bgcolor='#eeeeec'>...\Route.php<b>:</b>335</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>10</td><td bgcolor='#eeeeec' align='center'>0.1280</td><td bgcolor='#eeeeec' align='right'>1550864</td><td bgcolor='#eeeeec'><a href='http://www.php.net/function.call-user-func:{C:\Sites\MastermindSlim\vendor\slim\slim\Slim\Handlers\Strategies\RequestResponse.php:41}' target='_new'>call_user_func:{C:\Sites\MastermindSlim\vendor\slim\slim\Slim\Handlers\Strategies\RequestResponse.php:41}</a>
( ???, ???, ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\Handlers\Strategies\RequestResponse.php' bgcolor='#eeeeec'>...\RequestResponse.php<b>:</b>41</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>11</td><td bgcolor='#eeeeec' align='center'>0.1280</td><td bgcolor='#eeeeec' align='right'>1550864</td><td bgcolor='#eeeeec'>App\Controller\Jugada\CreateJugada->__invoke( ???, ???, ??? )</td><td title='C:\Sites\MastermindSlim\vendor\slim\slim\Slim\Handlers\Strategies\RequestResponse.php' bgcolor='#eeeeec'>...\RequestResponse.php<b>:</b>41</td></tr>
<tr><td bgcolor='#eeeeec' align='center'>12</td><td bgcolor='#eeeeec' align='center'>1.6421</td><td bgcolor='#eeeeec' align='right'>1682936</td><td bgcolor='#eeeeec'>App\Resource\Jugada\JugadaResource->createJugada( ??? )</td><td title='C:\Sites\MastermindSlim\app\src\Controller\Jugada\CreateJugada.php' bgcolor='#eeeeec'>...\CreateJugada.php<b>:</b>25</td></tr>
</table></font>

```


