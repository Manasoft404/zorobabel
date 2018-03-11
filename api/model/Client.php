<?php
/**
 * Created by PhpStorm.
 * User: Manasoft
 * Date: 27/03/2017
 * Time: 10:07
 */

class Client extends Internaute{
    /**
     * @var
     */
    private $idClient;
    /**
     * @var
     */
    private $numCompteClient;
    /**
     * @var
     */
    private $numCarteCreditClient;
    /**
     * @var
     */
    private $numTelClient;


    /**
     * Client constructor.
     * @param $idClient
     * @param $numCompteClient
     * @param $numCarteCreditClient
     * @param $numTelClient
     */
    function __construct($idClient, $numCompteClient, $numCarteCreditClient, $numTelClient)
    {
        $this->idClient = $idClient;
        $this->numCompteClient = $numCompteClient;
        $this->numCarteCreditClient = $numCarteCreditClient;
        $this->numTelClient = $numTelClient;
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
    public function getNumCompteClient()
    {
        return $this->numCompteClient;
    }

    /**
     * @param mixed $numCompteClient
     */
    public function setNumCompteClient($numCompteClient)
    {
        $this->numCompteClient = $numCompteClient;
    }

    /**
     * @return mixed
     */
    public function getNumCarteCreditClient()
    {
        return $this->numCarteCreditClient;
    }

    /**
     * @param mixed $numCarteCreditClient
     */
    public function setNumCarteCreditClient($numCarteCreditClient)
    {
        $this->numCarteCreditClient = $numCarteCreditClient;
    }

    /**
     * @return mixed
     */
    public function getNumTelClient()
    {
        return $this->numTelClient;
    }

    /**
     * @param mixed $numTelClient
     */
    public function setNumTelClient($numTelClient)
    {
        $this->numTelClient = $numTelClient;
    }



}