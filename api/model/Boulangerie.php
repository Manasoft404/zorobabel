<?php
/**
 * Created by PhpStorm.
 * User: Manasoft
 * Date: 27/03/2017
 * Time: 10:06
 */

class Boulangerie {
    private $idBoul;
    private $nomBoul;
    private $adrresseBoul;
    private $nomChefBoul;
    private $specialliteBoul;
    private $numTelBoul;
    private $idProduit=array();
    private $idLivreur=array();
    function __construct($idBoul, $nomBoul, $adrresseBoul, $nomChefBoul, $specialliteBoul, $numTelBoul, $idProduit)
    {
        $this->idBoul = $idBoul;
        $this->nomBoul = $nomBoul;
        $this->adrresseBoul = $adrresseBoul;
        $this->nomChefBoul = $nomChefBoul;
        $this->specialliteBoul = $specialliteBoul;
        $this->numTelBoul = $numTelBoul;
        $this->idProduit = $idProduit;
    }

    /**
     * @return mixed
     */
    public function getIdBoul()
    {
        return $this->idBoul;
    }

    /**
     * @param mixed $idBoul
     */
    public function setIdBoul($idBoul)
    {
        $this->idBoul = $idBoul;
    }

    /**
     * @return mixed
     */
    public function getNomBoul()
    {
        return $this->nomBoul;
    }

    /**
     * @param mixed $nomBoul
     */
    public function setNomBoul($nomBoul)
    {
        $this->nomBoul = $nomBoul;
    }

    /**
     * @return mixed
     */
    public function getAdrresseBoul()
    {
        return $this->adrresseBoul;
    }

    /**
     * @param mixed $adrresseBoul
     */
    public function setAdrresseBoul($adrresseBoul)
    {
        $this->adrresseBoul = $adrresseBoul;
    }

    /**
     * @return mixed
     */
    public function getNomChefBoul()
    {
        return $this->nomChefBoul;
    }

    /**
     * @param mixed $nomChefBoul
     */
    public function setNomChefBoul($nomChefBoul)
    {
        $this->nomChefBoul = $nomChefBoul;
    }

    /**
     * @return mixed
     */
    public function getSpecialliteBoul()
    {
        return $this->specialliteBoul;
    }

    /**
     * @param mixed $specialliteBoul
     */
    public function setSpecialliteBoul($specialliteBoul)
    {
        $this->specialliteBoul = $specialliteBoul;
    }

    /**
     * @return mixed
     */
    public function getNumTelBoul()
    {
        return $this->numTelBoul;
    }

    /**
     * @param mixed $numTelBoul
     */
    public function setNumTelBoul($numTelBoul)
    {
        $this->numTelBoul = $numTelBoul;
    }

    /**
     * @return mixed
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param mixed $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }
    /**
     * @return array
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * @param array $idLivreur
     */
    public function setIdLivreur($idLivreur)
    {
        $this->idLivreur = $idLivreur;
    }


}