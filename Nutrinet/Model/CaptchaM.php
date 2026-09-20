<?php

class Captcha
{
    private ?int $id = null;
    private ?string $img = null;
    private ?string $captcha = null;

    public function __construct($id = null, $img, $captcha)
    {
        $this->id = $id;
        $this->img = $img;
        $this->captcha = $captcha;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }

    public function getCaptcha()
    {
        return $this->captcha;
    }

    public function setCaptcha($captcha)
    {
        $this->captcha = $captcha;
        return $this;
    }
}

?>
