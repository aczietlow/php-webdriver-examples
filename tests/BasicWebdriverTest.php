<?php

/**
 * @file
 * A simple example creating an instance of webdriver, opening firefox, and navigate to a URL.
 */

require_once '../vendor/autoload.php';

class BasicWebdriverTest extends PHPUnit_Framework_TestCase {

  protected $webDriver1;

  //@TODO Find best way to create new objects. IDE seems to think it can't find methods for the webdriver, perhaps because I've implemented them wrong.
  public function setUp() {
    $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
    $this->webDriver1 = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
  }

  public function tearDown() {
    parent::tearDown();
    $this->webDriver1->close();
  }

  public function testExample() {
    $this->webDriver1->get('http://palantir.net/');
    $this->assertContains('Palantir', $this->webDriver1->getTitle());
  }
}
