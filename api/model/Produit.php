<?php
/**
 * Created by PhpStorm.
 * User: Manasoft
 * Date: 27/03/2017
 * Time: 10:06
 */

class Produit {
      private $idProduit;
      private $codeProduit;
      private  $designationProduit;
      private $PrixProduit;
      private  $imageProduit;
      private $poidsProduit;
     private $garnitureProduit;
     private $quatiteProduit;

    function __construct()
    {
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
    public function getCodeProduit()
    {
        return $this->codeProduit;
    }

    /**
     * @param mixed $codeProduit
     */
    public function setCodeProduit($codeProduit)
    {
        $this->codeProduit = $codeProduit;
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
    public function getPrixProduit()
    {
        return $this->PrixProduit;
    }

    /**
     * @param mixed $PrixProduit
     */
    public function setPrixProduit($PrixProduit)
    {
        $this->PrixProduit = $PrixProduit;
    }

    /**
     * @return mixed
     */
    public function getImageProduit()
    {
        return $this->imageProduit;
    }

    /**
     * @param mixed $imageProduit
     */
    public function setImageProduit($imageProduit)
    {
        $this->imageProduit = $imageProduit;
    }

    /**
     * @return mixed
     */
    public function getPoidsProduit()
    {
        return $this->poidsProduit;
    }

    /**
     * @param mixed $poidsProduit
     */
    public function setPoidsProduit($poidsProduit)
    {
        $this->poidsProduit = $poidsProduit;
    }

    /**
     * @return mixed
     */
    public function getGarnitureProduit()
    {
        return $this->garnitureProduit;
    }

    /**
     * @param mixed $garnitureProduit
     */
    public function setGarnitureProduit($garnitureProduit)
    {
        $this->garnitureProduit = $garnitureProduit;
    }

    /**
     * @return mixed
     */
    public function getQuatiteProduit()
    {
        return $this->quatiteProduit;
    }

    /**
     * @param mixed $quatiteProduit
     */
    public function setQuatiteProduit($quatiteProduit)
    {
        $this->quatiteProduit = $quatiteProduit;
    }


}