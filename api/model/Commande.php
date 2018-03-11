<?php
/**
 * Created by PhpStorm.
 * User: Manasoft
 * Date: 27/03/2017
 * Time: 10:06
 */

class Commande {
    private $idCmd;
    private $designationProduit;
    private $quantiteProduit;
    private $speciliteProduit;
    private $etatCmd;
    private $nomClient;
    private $idClient;
    private $idProduit;
    private $idBoul;

    function __construct($idCmd, $designationProduit, $quantiteProduit, $speciliteProduit, $etatCmd, $nomClient, $idClient, $idProduit, $idBoul)
    {
        $this->idCmd = $idCmd;
        $this->designationProduit = $designationProduit;
        $this->quantiteProduit = $quantiteProduit;
        $this->speciliteProduit = $speciliteProduit;
        $this->etatCmd = $etatCmd;
        $this->nomClient = $nomClient;
        $this->idClient = $idClient;
        $this->idProduit = $idProduit;
        $this->idBoul = $idBoul;
    }

    /**
     * @return mixed
     */
    public function getIdCmd()
    {
        return $this->idCmd;
    }

    /**
     * @param mixed $idCmd
     */
    public function setIdCmd($idCmd)
    {
        $this->idCmd = $idCmd;
    }

    /**
     * @return mixed
     */
    public function getDesignationProduit()
    {
        return $this->designationProduit;
    }

    /**
     * @param mixed $designationProduit
     */
    public function setDesignationProduit($designationProduit)
    {
        $this->designationProduit = $designationProduit;
    }

    /**
     * @return mixed
     */
    public function getQuantiteProduit()
    {
        return $this->quantiteProduit;
    }

    /**
     * @param mixed $quantiteProduit
     */
    public function setQuantiteProduit($quantiteProduit)
    {
        $this->quantiteProduit = $quantiteProduit;
    }

    /**
     * @return mixed
     */
    public function getSpeciliteProduit()
    {
        return $this->speciliteProduit;
    }

    /**
     * @param mixed $speciliteProduit
     */
    public function setSpeciliteProduit($speciliteProduit)
    {
        $this->speciliteProduit = $speciliteProduit;
    }

    /**
     * @return mixed
     */
    public function getEtatCmd()
    {
        return $this->etatCmd;
    }

    /**
     * @param mixed $etatCmd
     */
    public function setEtatCmd($etatCmd)
    {
        $this->etatCmd = $etatCmd;
    }

    /**
     * @return mixed
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * @param mixed $nomClient
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;
    }

    /**
     * @return mixed
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    /**
     * @param mixed $idClient
     */
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
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

}