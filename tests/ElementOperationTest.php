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

  public function testElementTextInputOperation() {
    $this->webDriver1->get('https://www.drupal.org');

    // Send keys to the active element.
    $searchBox = $this->webDriver1->findElement(WebDriverBy::name('search_block_form'))->click();
    $this->webDriver1->getKeyboard()
      ->sendKeys('palantir');

    // Press multiple keys for an element.
    $this->webDriver1->getKeyboard()
      ->sendKeys(array(
        WebDriverKeys::COMMAND, // Use control on non-mac computers.
        'a',
      ));

    // Press keyboard keys that aren't text.
    $this->webDriver1->getKeyboard()
      ->sendKeys(array(
        WebDriverKeys::BACKSPACE,
      ));

  }
}
