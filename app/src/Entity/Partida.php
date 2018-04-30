<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Representa la clase Partida
 *
 * @ORM\Table(name="partida")
 * @ORM\Entity
 */
class Partida {
    /**
	 * Nombre de la partida
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nombre;

    /**
	 * Fecha de inicio de la partida
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
	 * Combinación de colores elegidos
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=6, nullable=false)
     */
    private $codigo;

    /**
	 * Estado de ejecución de la partida
     * @var int
     *
     * @ORM\Column(name="estado", type="integer", nullable=false)
     */
    private $estado;

    /**
     * Establece el nombre de la partida
     *
     * @param string $nombre
     * @return Partida
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * Obtiene el nombre de la partida
     *
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Establece la fecha de inicio de la partida
     *
     * @param \DateTime $fecha
     *
     * @return Partida
     */
    public function setFecha($fecha) {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Obtiene la fecha de inicio de la partida
     *
     * @return \DateTime
     */
    public function getFecha() {
        return $this->fecha;
    }

    /**
     * Establece el código de colores de la partida
     *
     * @param string $codigo
     *
     * @return Partida
     */
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * Obtiene el código de colores de la partida
     *
     * @return string
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Establece el estado de ejecución de la partida
     *
     * @param int $estado
     *
     * @return Partida
     */
    public function setEstado($estado) {
        $this->estado = $estado;
        return $this;
    }

    /**
     * Obtiene el estado de ejecución de la partida
     *
     * @return int
     */
    public function getEstado() {
        return $this->estado;
    }
}
