<?php
/**
 * Created by PhpStorm.
 * User: Manasoft
 * Date: 27/03/2017
 * Time: 10:07
 */

class Gerant {
    private $idGerant;
    private $nomGerant;
    private $postnomGerant;
    private $numTelGerant;
    private $passwordGerant;

    function __construct($idGerant, $nomGerant, $postnomGerant, $numTelGerant, $passwordGerant)
    {
        $this->idGerant = $idGerant;
        $this->nomGerant = $nomGerant;
        $this->postnomGerant = $postnomGerant;
        $this->numTelGerant = $numTelGerant;
        $this->passwordGerant = $passwordGerant;
    }

    /**
     * @return mixed
     */
    public function getIdGerant()
    {
        return $this->idGerant;
    }

    /**
     * @param mixed $idGerant
     */
    public function setIdGerant($idGerant)
    {
        $this->idGerant = $idGerant;
    }

    /**
     * @return mixed
     */
    public function getNomGerant()
    {
        return $this->nomGerant;
    }

    /**
     * @param mixed $nomGerant
     */
    public function setNomGerant($nomGerant)
    {
        $this->nomGerant = $nomGerant;
    }

    /**
     * @return mixed
     */
    public function getPostnomGerant()
    {
        return $this->postnomGerant;
    }

    /**
     * @param mixed $postnomGerant
     */
    public function setPostnomGerant($postnomGerant)
    {
        $this->postnomGerant = $postnomGerant;
    }

    /**
     * @return mixed
     */
    public function getNumTelGerant()
    {
        return $this->numTelGerant;
    }

    /**
     * @param mixed $numTelGerant
     */
    public function setNumTelGerant($numTelGerant)
    {
        $this->numTelGerant = $numTelGerant;
    }

    /**
     * @return mixed
     */
    public function getPasswordGerant()
    {
        return $this->passwordGerant;
    }

    /**
     * @param mixed $passwordGerant
     */
    public function setPasswordGerant($passwordGerant)
    {
        $this->passwordGerant = $passwordGerant;
    }


}