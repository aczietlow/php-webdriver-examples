<?php

/**
 * @file
 * An example of finding elements using Webdriver for PHPUnit test.
 */

require_once '../vendor/autoload.php';

class BasicWebdriverTest extends PHPUnit_Framework_TestCase {
  protected $webDriver1;

  public function setUp() {
    $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
    $this->webDriver1 = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
  }

  /**
   * Closes initiated remote web driver sessions.
   */
  public function tearDown() {
    parent::tearDown();
    $this->webDriver1->close();
  }

  /**
   * An example test using the find element methods.
   */
  public function testFindTitleElement() {
    $this->webDriver1->get('http://palantir.net/');
    $this->assertContains('Palantir', $this->webDriver1->getTitle());

    $logo = $this->webDriver1->findElement(WebDriverBy::id('content'));
  }
}