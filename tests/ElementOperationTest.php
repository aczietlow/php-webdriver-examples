<?php

/**
 * @file
 * An example of element operation using webdriver.
 */

require_once '../vendor/autoload.php';

class ElementOperationsTest extends PHPUnit_Framework_TestCase {
  protected $webDriver1;

  public function setUp() {
    $capabilities = array(\WebDriverCapabilityType::BROWSER_NAME => 'firefox');
    $this->webDriver1 = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
  }

  public function tearDown() {
    parent::tearDown();
    $this->webDriver1->close();
  }

  public function testElementClickOperation() {
    $this->webDriver1->get('https://www.google.com/');

    $logo = $this->webDriver1->findElement(WebDriverBy::id('hplogo'))->click();

  }
}
