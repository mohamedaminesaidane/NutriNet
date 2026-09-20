<?php

class room
{
    private ?int $idS = null;
    private ?string $APP_ID = null;
    private ?string $TOKEN = null;
    private ?string $CHANNEL = null;
    private ?string $availability = null;

    public function __construct($idS = null, $APP_ID, $TOKEN, $CHANNEL, $availability)
    {
        $this->idS = $idS;
        $this->APP_ID = $APP_ID;
        $this->TOKEN = $TOKEN;
        $this->CHANNEL = $CHANNEL;
        $this->availability = $availability;
    }

    public function getIdS()
    {
        return $this->idS;
    }

    public function getAPP_ID()
    {
        return $this->APP_ID;
    }

    public function setAPP_ID($APP_ID)
    {
        $this->APP_ID = $APP_ID;
        return $this;
    }

    public function getTOKEN()
    {
        return $this->TOKEN;
    }

    public function setTOKEN($TOKEN)
    {
        $this->TOKEN = $TOKEN;
        return $this;
    }

    public function getCHANNEL()
    {
        return $this->CHANNEL;
    }

    public function setCHANNEL($CHANNEL)
    {
        $this->CHANNEL = $CHANNEL;
        return $this;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    public function setAvailability($availability)
    {
        $this->availability = $availability;
        return $this;
    }
}