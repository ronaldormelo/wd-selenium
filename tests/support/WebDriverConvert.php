<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverKeys;

trait WebDriverConvert {

    protected $url;

    /**
     * @var \RemoteWebDriver
     */
    protected $webDriver;

    private function getElement($expresion, $iframe = FALSE) {

        sleep(2);
        $expresion = trim($expresion);

        if ($iframe) {

            $frame = $this->webDriver->findElement(WebDriverBy::tagName('iframe'));
            $this->webDriver->switchTo()->frame($frame);
        } else {

            $this->webDriver->switchTo()->defaultContent();
        }

        switch (true) {
            //The CSS selector is often used with Selenium click command to uniquely identify an object or element on a web page. 
            case strpos($expresion, 'css=') !== false:
                $element = WebDriverBy::cssSelector(str_replace('css=', '', $expresion));
                break;
            //As the name itself suggests, the name selector is used to click the first element with the specified @name attribute. 
            case strpos($expresion, 'name=') !== false:
                $element = WebDriverBy::name(str_replace('name=', '', $expresion));
                break;
            //This attribute allows click on an element with the specified @id attribute.
            case strpos($expresion, 'id=') !== false:
                $element = WebDriverBy::id(str_replace('id=', '', $expresion));
                break;
            //This attribute allows clicking on a link element which contains text matching the specified pattern.
            case strpos($expresion, 'link=') !== false:
                $element = WebDriverBy::linkText(str_replace('link=', '', $expresion));
                break;
            //This attribute allows clicking on an element using an XPath expression
            case strpos($expresion, 'xpath=') !== false:
                $element = WebDriverBy::xpath(str_replace('xpath=', '', $expresion) . $iframe);
                break;
            case strpos($expresion, '//') !== false:
                $element = WebDriverBy::xpath($expresion . $iframe);
                break;
            default:
                break;
        }
        return $element;
    }

    protected function selectWindow($window) {
        
        //@TODO
        return null;
    }
    
    protected function getEval($var) {
        //@TODO
        return null;
    }

    protected function setBrowser($browser) {
        $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => $browser);
        $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);
    }

    protected function setBrowserUrl($url) {
        $this->url = $url;
    }

    protected function open($url) {
        $this->webDriver->get($this->url . $url);
    }

    protected function type($expresion, $value, $iframe = FALSE) {

        $element = $this->getElement($expresion, $iframe);
        return $this->webDriver->findElement($element)->sendKeys($value);
    }

    protected function click($expresion, $iframe = FALSE) {

        $element = $this->getElement($expresion, $iframe);
        return $this->webDriver->findElement($element)->click();
    }

    protected function waitForPageToLoad($time) {

        return sleep((int) (($time / 60) / 60));
    }

}
