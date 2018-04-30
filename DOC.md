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
                "date": "2018-04-30 12:49:33.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigo": "FFCDFC",
            "estado": 2
        },
        {
            "nombre": "primera",
            "fecha": {
                "date": "2018-04-29 03:09:47.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigo": "123456",
            "estado": 1
        },
        {
            "nombre": "segunda",
            "fecha": {
                "date": "2018-04-29 03:18:47.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigo": "654321",
            "estado": 1
        },
        {
            "nombre": "tercera",
            "fecha": {
                "date": "2018-04-29 21:04:54.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigo": "123456",
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
    "message": {
        "nombre": "partida1",
        "fecha": {
            "date": "2018-04-30 12:49:33.000000",
            "timezone_type": 3,
            "timezone": "Europe\/Berlin"
        },
        "codigo": "FFCDFC",
        "estado": 2
    }
}
```


## Actualizar Partida:

Petición:
```
$ curl -X PUT http://localhost:8081/api/v1/partidas/partida1 --data estado=2
```

Respuesta:
```
{
    "code": 200,
    "status": "success",
    "message": {
        "nombre": "partida1",
        "fecha": {
            "date": "2018-04-30 12:49:33.000000",
            "timezone_type": 3,
            "timezone": "Europe\/Berlin"
        },
        "codigo": "FFCDFC",
        "estado": "2"
    }
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
                "date": "2018-04-30 17:21:02.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ABDECD",
            "resultado": "KO"
        },
        {
            "idJugada": 3,
            "nombrePartida": "partida2",
            "fecha": {
                "date": "2018-04-30 17:49:42.000000",
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
            "date": "2018-04-30 17:49:42.000000",
            "timezone_type": 3,
            "timezone": "Europe\/Berlin"
        },
        "codigoJugada": "ADBDED",
        "resultado": "KO"
    }
}
```


## Ver Jugadas de una Partida:

Petición:
```
$ curl http://localhost:8081/api/v1/jugadas/partida/partida1
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
                "date": "2018-04-30 17:21:02.000000",
                "timezone_type": 3,
                "timezone": "Europe\/Berlin"
            },
            "codigoJugada": "ABDECD",
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


