<?php
/**
 * Created by PhpStorm.
 * User: Manasoft
 * Date: 27/03/2017
 * Time: 10:06
 */

class Livreur {
    private $idLivreur;
    private $nomLivreur;
    private $postnomLivreur;
    private $adrresseLivreur;
    private $matriculeLivreur;
    private $permisConduireLivreur;
    private $numTelephoneLivreur;
    private $idBoulangerie;

    function __construct($idLivreur, $nomLivreur, $postnomLivreur, $adrresseLivreur, $matriculeLivreur, $permisConduireLivreur, $numTelephoneLivreur, $idBoulangerie)
    {
        $this->idLivreur = $idLivreur;
        $this->nomLivreur = $nomLivreur;
        $this->postnomLivreur = $postnomLivreur;
        $this->adrresseLivreur = $adrresseLivreur;
        $this->matriculeLivreur = $matriculeLivreur;
        $this->permisConduireLivreur = $permisConduireLivreur;
        $this->numTelephoneLivreur = $numTelephoneLivreur;
        $this->idBoulangerie = $idBoulangerie;
    }

    /**
     * @return mixed
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * @param mixed $idLivreur
     */
    public function setIdLivreur($idLivreur)
    {
        $this->idLivreur = $idLivreur;
    }

    /**
     * @return mixed
     */
    public function getNomLivreur()
    {
        return $this->nomLivreur;
    }

    /**
     * @param mixed $nomLivreur
     */
    public function setNomLivreur($nomLivreur)
    {
        $this->nomLivreur = $nomLivreur;
    }

    /**
     * @return mixed
     */
    public function getPostnomLivreur()
    {
        return $this->postnomLivreur;
    }

    /**
     * @param mixed $postnomLivreur
     */
    public function setPostnomLivreur($postnomLivreur)
    {
        $this->postnomLivreur = $postnomLivreur;
    }

    /**
     * @return mixed
     */
    public function getAdrresseLivreur()
    {
        return $this->adrresseLivreur;
    }

    /**
     * @param mixed $adrresseLivreur
     */
    public function setAdrresseLivreur($adrresseLivreur)
    {
        $this->adrresseLivreur = $adrresseLivreur;
    }

    /**
     * @return mixed
     */
    public function getMatriculeLivreur()
    {
        return $this->matriculeLivreur;
    }

    /**
     * @param mixed $matriculeLivreur
     */
    public function setMatriculeLivreur($matriculeLivreur)
    {
        $this->matriculeLivreur = $matriculeLivreur;
    }

    /**
     * @return mixed
     */
    public function getPermisConduireLivreur()
    {
        return $this->permisConduireLivreur;
    }

    /**
     * @param mixed $permisConduireLivreur
     */
    public function setPermisConduireLivreur($permisConduireLivreur)
    {
        $this->permisConduireLivreur = $permisConduireLivreur;
    }

    /**
     * @return mixed
     */
    public function getNumTelephoneLivreur()
    {
        return $this->numTelephoneLivreur;
    }

    /**
     * @param mixed $numTelephoneLivreur
     */
    public function setNumTelephoneLivreur($numTelephoneLivreur)
    {
        $this->numTelephoneLivreur = $numTelephoneLivreur;
    }

    /**
     * @return mixed
     */
    public function getIdBoulangerie()
    {
        return $this->idBoulangerie;
    }

    /**
     * @param mixed $idBoulangerie
     */
    public function setIdBoulangerie($idBoulangerie)
    {
        $this->idBoulangerie = $idBoulangerie;
    }

}