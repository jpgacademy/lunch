<?php

namespace Lunch\View;

class LunchView
{
    public $menu;
    public $date;

    public function __construct($attributes)
    {
        foreach ($attributes as $name => $value) {
            $this->$name = $value;
        }
    }

}
