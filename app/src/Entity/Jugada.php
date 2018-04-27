<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Jugada
 *
 * @ORM\Table(name="jugada")
 * @ORM\Entity
 */
class Jugada
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_jugada", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idJugada;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_partida", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nombrePartida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_jugada", type="string", length=6, nullable=false)
     */
    private $codigoJugada;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_jugada", type="string", length=6, nullable=false)
     */
    private $resultadoJugada;



    /**
     * Set idJugada.
     *
     * @param int $idJugada
     *
     * @return Jugada
     */
    public function setIdJugada($idJugada)
    {
        $this->idJugada = $idJugada;

        return $this;
    }

    /**
     * Get idJugada.
     *
     * @return int
     */
    public function getIdJugada()
    {
        return $this->idJugada;
    }

    /**
     * Set nombrePartida.
     *
     * @param string $nombrePartida
     *
     * @return Jugada
     */
    public function setNombrePartida($nombrePartida)
    {
        $this->nombrePartida = $nombrePartida;

        return $this;
    }

    /**
     * Get nombrePartida.
     *
     * @return string
     */
    public function getNombrePartida()
    {
        return $this->nombrePartida;
    }

    /**
     * Set fecha.
     *
     * @param \DateTime $fecha
     *
     * @return Jugada
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha.
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set codigoJugada.
     *
     * @param string $codigoJugada
     *
     * @return Jugada
     */
    public function setCodigoJugada($codigoJugada)
    {
        $this->codigoJugada = $codigoJugada;

        return $this;
    }

    /**
     * Get codigoJugada.
     *
     * @return string
     */
    public function getCodigoJugada()
    {
        return $this->codigoJugada;
    }

    /**
     * Set resultadoJugada.
     *
     * @param string $resultadoJugada
     *
     * @return Jugada
     */
    public function setResultadoJugada($resultadoJugada)
    {
        $this->resultadoJugada = $resultadoJugada;

        return $this;
    }

    /**
     * Get resultadoJugada.
     *
     * @return string
     */
    public function getResultadoJugada()
    {
        return $this->resultadoJugada;
    }
}
