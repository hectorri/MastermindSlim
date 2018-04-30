<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Representa la clase Jugada
 *
 * @ORM\Table(name="jugada")
 * @ORM\Entity
 */
class Jugada {
    /**
	 * Identificador de la jugada
     * @var int
     *
     * @ORM\Column(name="id_jugada", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idJugada;

    /**
	 * Nombre de la partida a la que pertenece la jugada
     * @var string
     *
     * @ORM\Column(name="nombre_partida", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nombrePartida;

    /**
	 * Fecha de ejecución de la jugada
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
	 * Código de colores de la jugada
     * @var string
     *
     * @ORM\Column(name="codigo_jugada", type="string", length=6, nullable=false)
     */
    private $codigoJugada;

    /**
	 * Resultado de cotejar la jugada con la combinación
     * @var string
     *
     * @ORM\Column(name="resultado_jugada", type="string", length=6, nullable=false)
     */
    private $resultadoJugada;



    /**
     * Establece el identificador de la jugada
     *
     * @param int $idJugada
     *
     * @return Jugada
     */
    public function setIdJugada($idJugada) {
        $this->idJugada = $idJugada;
        return $this;
    }

    /**
     * Obtiene el identificador de la jugada
     *
     * @return int
     */
    public function getIdJugada() {
        return $this->idJugada;
    }

    /**
     * Establece el nombre de la partida
     *
     * @param string $nombrePartida
     *
     * @return Jugada
     */
    public function setNombrePartida($nombrePartida) {
        $this->nombrePartida = $nombrePartida;
        return $this;
    }

    /**
     * Obtiene el nombre de la partida
     *
     * @return string
     */
    public function getNombrePartida() {
        return $this->nombrePartida;
    }

    /**
     * Establece la fecha de ejecución de la jugada
     *
     * @param \DateTime $fecha
     *
     * @return Jugada
     */
    public function setFecha($fecha) {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Obtiene la fecha de ejecución de la jugada
     *
     * @return \DateTime
     */
    public function getFecha() {
        return $this->fecha;
    }

    /**
     * Establece el código de colores de la jugada
     *
     * @param string $codigoJugada
     *
     * @return Jugada
     */
    public function setCodigoJugada($codigoJugada) {
        $this->codigoJugada = $codigoJugada;
        return $this;
    }

    /**
     * Obtiene el código de colores de la jugada.
     *
     * @return string
     */
    public function getCodigoJugada() {
        return $this->codigoJugada;
    }

    /**
     * Establece el resultado de la jugada
     *
     * @param string $resultadoJugada
     *
     * @return Jugada
     */
    public function setResultadoJugada($resultadoJugada) {
        $this->resultadoJugada = $resultadoJugada;
        return $this;
    }

    /**
     * Obtiene el resultado de la jugada
     *
     * @return string
     */
    public function getResultadoJugada() {
        return $this->resultadoJugada;
    }
}
