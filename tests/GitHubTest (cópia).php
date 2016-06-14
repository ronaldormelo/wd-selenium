<?php
class Example extends PHPUnit_Framework_TestCase
{

  use WebDriverConvert;

  protected function setUp()
  {
    $this->setBrowser("firefox");
    $this->setBrowserUrl("https://duckduckgo.com/");
  }

  public function testMyTestCase()
  {
    $this->open("/");
    $this->type("id=search_form_input_homepage", "enem 2016");
    $this->click("id=search_button_homepage");
    $this->waitForPageToLoad("30000");
    $this->click("link=Enem 2016 - Passo a passo");
    $this->waitForPageToLoad("30000");
    $this->click("css=img.FloatRight");
    $this->click("//button[@type='submit']");
    $this->type("id=numeroCpf", "994.944.691-00");
    $this->type("id=numeroCpf", "994.944.691-00");
    $this->type("id=input_inputSenha", "123456");
    $this->assertEquals('Example WWW Page', $this->title());
  }
}
?>