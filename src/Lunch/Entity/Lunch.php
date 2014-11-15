<?php

namespace Lunch\Entity;

use \DateTime;

class Lunch
{
    private $menu;
    private $date;

    public function __construct($menu, DateTime $date)
    {
        $this->menu = $menu;
        $this->date = $date;
    }

    public function getMenu()
    {
        return $this->menu;
    }

    public function getDate()
    {
        return $this->date;
    }
}
