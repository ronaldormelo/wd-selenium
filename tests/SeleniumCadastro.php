<?php
class Example extends PHPUnit_Framework_TestCase
{

  use WebDriverConvert;

  protected function setUp()
  {
    $this->setBrowser("firefox");
    $this->setBrowserUrl("http://mcnetwork.dev/");
  }

  public function testMyTestCase()
  {
    // $this->while("index < 999;");
    $value = $this->getEval("index");
    $this->open("/cadastro/j");
    $nameRandom = $this->getEval("Math.floor(Math.random() * 999)");
    $cpfRandom = $this->getEval("Math.floor(Math.random() * 99)");
    $this->type("id=nm_usuario", "teste" + $nameRandom);
    $this->type("id=em_email", "teste" + $nameRandom + "@gmail.com");
    $this->type("id=em_email_confirm", "teste" + $nameRandom + "@gmail.com");
    $this->type("id=pw_senha", "12345678");
    $this->type("id=pw_senha_confirm", "12345678");
    $this->type("id=nu_cpf", $nameRandom + "." + $nameRandom + "." + $nameRandom + "-" + $cpfRandom);
    $this->type("id=dt_nascimento", "20/12/1983");
    $this->type("id=nr_telefone", "(12) 3456-78978");
    $this->type("id=captcha", "123456");
    $this->click("id=ckhConcordo");
    $this->click("css=#modal-termo-uso-contrato > div.modal-dialog.modal-lg > div.modal-content > div.modal-footer > button.btn.btn-primary");
    $this->click("css=button.btn.btn-primary");
    $this->waitForPageToLoad("30000");
    // $this->endWhile();
  }
}
?>