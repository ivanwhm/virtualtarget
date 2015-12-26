<?php

  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../../classes/VirtualTarget.php';
  require '../../classes/relatorio/VTRetornaDadosEnvio.php';
  require '../../classes/relatorio/VTRetornaDadosEnvioRetorno.php';

  try
  {
    $retornoDadosEnvio = new VTRetornaDadosEnvio('', '');
    $retornoDadosEnvio->setEnvioId(243);
    if ($retornoDadosEnvio->processa())
    {
      if ($retornoDadosEnvio->getResultado() instanceof VTRetornaDadosEnvioRetorno)
      {
        echo 'Código da campanha......: ' . $retornoDadosEnvio->getResultado()->getCampanhaId() . PHP_EOL;
        echo 'Nome do remetente.......: ' . $retornoDadosEnvio->getResultado()->getRemetenteNome() . PHP_EOL;
        echo 'E-mail do remetente ....: ' . $retornoDadosEnvio->getResultado()->getRemetenteEmail() . PHP_EOL;
        echo 'E-mail de resposta......: ' . $retornoDadosEnvio->getResultado()->getRemetenteReplay() . PHP_EOL;
        echo 'Assunto da mensagem.....: ' . $retornoDadosEnvio->getResultado()->getAssunto() . PHP_EOL;
        echo 'Código HTML.............: ' . $retornoDadosEnvio->getResultado()->getHtml() . PHP_EOL;
        echo 'Data e hora do envio....: ' . $retornoDadosEnvio->getResultado()->getDataHoraProgramada()->format('d/m/Y H:i') . PHP_EOL;
      } else
        echo 'Código ' . $retornoDadosEnvio->getEnvioId() . ' não encontrado.';
    } else
      echo 'Código ' . $retornoDadosEnvio->getEnvioId() . ' não encontrado.';
  } catch (Exception $exc)
  {
    echo $exc->getMessage();
  }
?>
