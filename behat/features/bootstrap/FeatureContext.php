<?php

use Drupal\DrupalExtension\Context\DrupalContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Drupal\DrupalExtension\Context\RawDrupalContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawDrupalContext implements SnippetAcceptingContext {

  /**
   * Initializes context.
   *
   * Every scenario gets its own context instance.
   * You can also pass arbitrary arguments to the
   * context constructor through behat.yml.
   */
  public function __construct() {}

  /**
   * Checks if a region exists
   *
   * @Then I should see the( region) :region( region)
   *
   * @param $region
   * string The region which should exists
   *
   * @throws \Exception
   * If region cannot be found.
   */
  public function assertRegion($region) {
    $session = $this->getSession();
    $regionObj = $session->getPage()->find('region', $region);
    if (empty($regionObj)) {
      throw new \Exception(sprintf("The region '%s' was not found on the page %s", $region, $this->getSession()->getCurrentUrl()));
    }
  }

  /**
   * Checks if a region doesn't exist
   *
   * @Then I should not see the( region) :region( region)
   *
   * @param $region
   * string The region which should exists
   *
   * @throws \Exception
   * If region can be found.
   */
  public function assertNotRegion($region) {
    $session = $this->getSession();
    $regionObj = $session->getPage()->find('region', $region);
    if (!empty($regionObj)) {
      throw new \Exception(sprintf("The region '%s' was found on the page %s", $region, $this->getSession()->getCurrentUrl()));
    }
  }
}
