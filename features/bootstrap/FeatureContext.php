<?php

use
Behat\Behat\Context\BehatContext;
use Lunch\Entity\Lunch;
use Lunch\Interactor\LunchList;
use Lunch\Interactor\LunchListResponse;
use Lunch\Repository\LunchArrayRepository;
use Lunch\View\LunchView;
use \DateTime;

require_once 'vendor/phpunit/phpunit/PHPUnit/Framework/Assert/Functions.php';

class FeatureContext extends BehatContext
{
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @Given /^there are no lunches$/
     */
    public function thereAreNoLunches()
    {
        $this->lunches = [];
    }

    /**
     * @When /^I list the lunches$/
     */
    public function iListTheLunches()
    {
        $repo           = new LunchArrayRepository($this->lunches);
        $interactor     = new LunchList($repo);
        $this->response = $interactor();
    }

    /**
     * @Then /^I should see no lunches$/
     */
    public function iShouldSeeNoLunches()
    {
        assertEquals(
            new LunchListResponse([]),
            $this->response
        );
    }

    /**
     * @Given /^there are some lunches$/
     */
    public function thereAreSomeLunches()
    {
        $this->lunches = [
            new Lunch('Red beans and rice', new DateTime('Monday +2 weeks')),
        ];
    }

    /**
     * @Then /^I should see some lunches$/
     */
    public function iShouldSeeSomeLunches()
    {
        assertEquals(
            new LunchListResponse([
                new LunchView([
                    'menu' => 'Red beans and rice',
                    'date' => new DateTime('Monday +2 weeks'),
                ])
            ]),
            $this->response
        );
    }

    /**
     * @Given /^there are some lunches for the current month$/
     */
    public function thereAreSomeLunchesForTheCurrentMonth()
    {
        $this->lunches = [
            new Lunch('Red beans and rice', new DateTime('Last Monday of this month')),
            new Lunch('Red beans and rice', new DateTime('Last Monday of next month')),
        ];
    }

    /**
     * @When /^I list the lunches for the current month$/
     */
    public function iListTheLunchesForTheCurrentMonth()
    {
        $repo           = new LunchArrayRepository($this->lunches);
        $interactor     = new LunchList($repo, new DateTime('First day of this month'));
        $this->response = $interactor();
    }

    /**
     * @Then /^I should see some lunches for the current month$/
     */
    public function iShouldSeeSomeLunchesForTheCurrentMonth()
    {
        assertEquals(1, count($this->response));
    }

    /**
     * @Given /^there are some lunches for the next month$/
     */
    public function thereAreSomeLunchesForTheNextMonth()
    {
        $this->lunches = [
            new Lunch('Red beans and rice', new DateTime('Last Monday of this month')),
            new Lunch('Red beans and rice', new DateTime('Last Monday of next month')),
        ];
    }

    /**
     * @When /^I list the lunches for the next month$/
     */
    public function iListTheLunchesForTheNextMonth()
    {
        $repo           = new LunchArrayRepository($this->lunches);
        $interactor     = new LunchList($repo, new DateTime('First day of next month'));
        $this->response = $interactor();
    }

    /**
     * @Then /^I should see some lunches for the next month$/
     */
    public function iShouldSeeSomeLunchesForTheNextMonth()
    {
        assertEquals(1, count($this->response));
    }

}
