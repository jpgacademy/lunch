<?php

namespace Lunch\Repository;

use Lunch\Entity\LunchRepository;
use \DateTime;

class LunchArrayRepository implements LunchRepository
{
    private $lunches;

    public function __construct(array $lunches)
    {
        $this->lunches = $lunches;
    }

    public function findAll()
    {
        return $this->lunches;
    }

    public function findByMonth(DateTime $date)
    {
        $lunches = [];
        foreach ($this->lunches as $lunch) {
            if ($date->format('m') === $lunch->getDate()->format('m') &&
                $date->format('Y') === $lunch->getDate()->format('Y')) {
                $lunches[] = $lunch;
            }
        }
        return $lunches;
    }
}
