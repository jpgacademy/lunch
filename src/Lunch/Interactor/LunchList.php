<?php

namespace Lunch\Interactor;

use Lunch\Entity\Lunch;
use Lunch\Entity\LunchRepository;
use Lunch\View\LunchView;

class LunchList
{
    private $repo;

    public function __construct(LunchRepository $repo)
    {
        $this->repo = $repo;
    }

    public function __invoke($date = null)
    {
        if ($date === null) {
            $lunches = $this->repo->findAll();

        } else {
            $lunches = $this->repo->findByMonth($date);
        }

        $lunchViews = array_map([$this, 'createLunchView'], $lunches);

        return new LunchListResponse($lunchViews);
    }

    private function createLunchView(Lunch $lunch)
    {
        return new LunchView([
            'menu' => $lunch->getMenu(),
            'date' => $lunch->getDate(),
        ]);
    }
}
