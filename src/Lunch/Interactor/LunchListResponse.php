<?php

namespace Lunch\Interactor;

class LunchListResponse
{
    public $lunches;

    public function __construct(array $lunches)
    {
        $this->lunches = $lunches;
    }
}
