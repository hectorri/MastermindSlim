ttl[1]="Ver Partidas"
cmd[1]="curl http://localhost:8081/api/v1/partidas"
ttl[2]="Crear Partida"
cmd[2]="curl -X POST http://localhost:8081/api/v1/partidas --data nombre=partida1"
ttl[3]="Actualizar Partida"
cmd[3]="curl -X PUT http://localhost:8081/api/v1/partidas/partida1 --data estado=2"
ttl[4]="Ver jugadas"
cmd[4]="curl http://localhost:8081/api/v1/jugadas"
ttl[5]="Crear jugada"
cmd[5]="curl -X POST http://localhost:8081/api/v1/jugadas --data nombrePartida=partida2 --data idJugada=3 --data codigoJugada=ADBDED"
ttl[6]="Ver Jugadas de una Partida"
cmd[6]="curl http://localhost:8081/api/v1/jugadas/partida/partida1"
ttl[7]="Eliminar jugada"
cmd[7]="curl -X DELETE http://localhost:8081/api/v1/jugadas/4/partida1"
ttl[8]="Ver version"
cmd[8]="curl http://localhost:8081/version"
ttl[9]="Ver status"
cmd[9]="curl http://localhost:8081/status"
ttl[10]="Ver ayuda"
cmd[10]="curl http://localhost:8081"
