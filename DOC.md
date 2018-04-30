# MODO DE USO:


## Ver Partidas:

Petición:
```
$ curl http://localhost:8081/api/v1/partidas
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": [
        {
            "nombre": "partida1",
            "fecha": {
                "date": "2018-04-30 12:56:07.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigo": "BCCCCE",
            "estado": 2
        },
        {
            "nombre": "partida2",
            "fecha": {
                "date": "2018-04-30 17:02:41.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigo": "CABFED",
            "estado": 1
        }
    ]
}
```


## Crear Partida:

Petición:
```
$ curl -X POST http://localhost:8081/api/v1/partidas --data nombre=partida1
```

Respuesta:
```
{
    "code": 201,
    "status": "success",
    "message": {}
}
```


## Actualizar Partida:

Petición:
```
$ curl -X PUT http://localhost:8081/api/v1/partidas/partida1/2
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": {}
}
```


## Ver jugadas:

Petición:
```
$ curl http://localhost:8081/api/v1/jugadas
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": [
        {
            "idJugada": 1,
            "nombrePartida": "partida1",
            "fecha": {
                "date": "2018-04-30 16:56:49.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ABDCDE",
            "resultado": "KO"
        },
        {
            "idJugada": 1,
            "nombrePartida": "partida2",
            "fecha": {
                "date": "2018-04-30 17:04:15.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "BCCCCE",
            "resultado": "KO"
        },
        {
            "idJugada": 2,
            "nombrePartida": "partida1",
            "fecha": {
                "date": "2018-04-30 16:58:06.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ACCCEE",
            "resultado": "KO"
        },
        {
            "idJugada": 2,
            "nombrePartida": "partida2",
            "fecha": {
                "date": "2018-04-30 17:04:35.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "BCFCCE",
            "resultado": "KO"
        },
        {
            "idJugada": 3,
            "nombrePartida": "partida1",
            "fecha": {
                "date": "2018-04-30 16:58:46.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ACCCCE",
            "resultado": "KO"
        },
        {
            "idJugada": 3,
            "nombrePartida": "partida2",
            "fecha": {
                "date": "2018-04-30 17:27:42.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ADBDED",
            "resultado": "KO"
        }
    ]
}
```


## Crear jugada:

Petición:
```
$ curl -X POST http://localhost:8081/api/v1/jugadas --data nombrePartida=partida2 --data idJugada=3 --data codigoJugada=ADBDED
```

Respuesta:
```
{
    "code": 201,
    "status": "success",
    "message": {
        "idJugada": 3,
        "nombrePartida": "partida2",
        "fecha": {
            "date": "2018-04-30 17:27:42.000000",
            "timezone_type": 3,
            "timezone": "Europe\/Berlin"
        },
        "codigoJugada": "ADBDED",
        "resultado": "KO"
    }
}
```


## Ver JugadasPartidas:

Petición:
```
$ curl http://localhost:8081/api/v1/jugadas/jugadasPartida/partida1
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": [
        {
            "idJugada": 1,
            "nombrePartida": "partida1",
            "fecha": {
                "date": "2018-04-30 16:56:49.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ABDCDE",
            "resultado": "KO"
        },
        {
            "idJugada": 2,
            "nombrePartida": "partida1",
            "fecha": {
                "date": "2018-04-30 16:58:06.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ACCCEE",
            "resultado": "KO"
        },
        {
            "idJugada": 3,
            "nombrePartida": "partida1",
            "fecha": {
                "date": "2018-04-30 16:58:46.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ACCCCE",
            "resultado": "KO"
        }
    ]
}
```


## Eliminar jugada:

Petición:
```
$ curl -X DELETE http://localhost:8081/api/v1/jugadas/4/partida1
```

Respuesta:
```
{
    "code": 404,
    "status": "error",
    "message": {
        "message": "Jugada no encontrada",
        "idJugada": "4",
        "nombrePartida": "partida1"
    }
}
```


## Ver version:

Petición:
```
$ curl http://localhost:8081/version
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": {
        "version": "1"
    }
}
```


## Ver status:

Petición:
```
$ curl http://localhost:8081/status
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": {
        "status": "OK"
    }
}
```


## Ver ayuda:

Petición:
```
$ curl http://localhost:8081
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": {
        "partidas": "http:\/\/localhost:8081\/api\/v1\/partidas",
        "jugadas": "http:\/\/localhost:8081\/api\/v1\/jugadas",
        "status": "http:\/\/localhost:8081\/status",
        "version": "http:\/\/localhost:8081\/version",
        "ayuda": "http:\/\/localhost:8081\/"
    }
}
```


