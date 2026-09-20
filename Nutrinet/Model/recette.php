<?php
class recette
{
    private ?int $id = null;
    private ?string $description= null;
    private ?string $url = null;
    private ?string $vid = null;
    private ?string $ing = null;

    public function __construct($id = null, $description, $url,$vid,$ing)
    {
        $this->id = $id;
        $this->description = $description;
        $this->url= $url;
        $this->vid= $vid;
        $this->ing= $ing;
       
    }


    public function getId()
    {
        return $this->id;
    }


    public function getdescription()
    {
        return $this->description;
    }
    public function getvid()
    {
        return $this->vid;
    }
    public function getingr()
    {
        return $this->ing;
    }

    public function setdescription($description)
    {
        $this-> description= $description;

        return $this;
    }


    public function geturl()
    {
        return $this->url;
    }
}


    