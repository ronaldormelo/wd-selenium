<?php
class Example extends PHPUnit_Framework_TestCase
{

  use WebDriverConvert;

  protected function setUp()
  {
    $this->setBrowser("firefox");
    $this->setBrowserUrl("https://www.google.com.br/");
  }

  public function testMyTestCase()
  {
    $this->open("/?gfe_rd=cr&ei=4PlFV_yfLoOq8weBk6XwAg");
    $this->type("id=lst-ib", "enem 2016");
    $this->click("name=btnG");
    $this->click("link=Enem 2016 - Passo a passo");
    $this->waitForPageToLoad("30000");
    $this->click("css=img.FloatRight");
    $this->selectWindow("name=_new");
    $this->click(".//button[@type='submit']");
    $this->type("id=numeroCpf", "994.944.691-00");
    $this->type("id=numeroCpf", "994.944.691-00");
    $this->type("id=input_inputSenha", "123456");
    $this->click("//button[@type='submit']");
  }
}
?>
