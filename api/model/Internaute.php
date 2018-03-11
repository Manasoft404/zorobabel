<?php
/**
 * Created by PhpStorm.
 * User: Manasoft
 * Date: 27/03/2017
 * Time: 10:22
 */

class Internaute {
    private $idInter;
    private $nomInter;
    private $postnomInter;
    private $adrresesInter;

    function __construct($idInter, $nomInter, $postnomInter, $adrresesInter)
    {
        $this->idInter = $idInter;
        $this->nomInter = $nomInter;
        $this->postnomInter = $postnomInter;
        $this->adrresesInter = $adrresesInter;
    }

    /**
     * @return mixed
     */
    public function getIdInter()
    {
        return $this->idInter;
    }

    /**
     * @param mixed $idInter
     */
    public function setIdInter($idInter)
    {
        $this->idInter = $idInter;
    }

    /**
     * @return mixed
     */
    public function getNomInter()
    {
        return $this->nomInter;
    }

    /**
     * @param mixed $nomInter
     */
    public function setNomInter($nomInter)
    {
        $this->nomInter = $nomInter;
    }

    /**
     * @return mixed
     */
    public function getPostnomInter()
    {
        return $this->postnomInter;
    }

    /**
     * @param mixed $postnomInter
     */
    public function setPostnomInter($postnomInter)
    {
        $this->postnomInter = $postnomInter;
    }

    /**
     * @return mixed
     */
    public function getAdrresesInter()
    {
        return $this->adrresesInter;
    }

    /**
     * @param mixed $adrresesInter
     */
    public function setAdrresesInter($adrresesInter)
    {
        $this->adrresesInter = $adrresesInter;
    }


}