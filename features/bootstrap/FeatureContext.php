<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends DefaultContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @When I click on the link :arg1
     */
    public function iClickOnTheLink($link)
    {
        $this->clickLink($link);
    }

    /**
     * @When I fill in the following :arg1 in field :arg2
     */
    public function iFillInTheFollowing($value,$key)
    {
        $this->fillField($key,$value);
    }
}
