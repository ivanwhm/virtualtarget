<?php

  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../../classes/VirtualTarget.php';
  require '../../classes/relatorio/VirtualTargetRetornaEstatisticasDeEnvio.php';
  require '../../classes/relatorio/VirtualTargetRetornaEstatisticasDeEnvioRetorno.php';

  try
  {
    $retornoDadosEnvio = new VirtualTargetRetornaEstatisticasDeEnvio('', '');
    $retornoDadosEnvio->setEnvioId(243);
    if ($retornoDadosEnvio->processa())
    {
      if ($retornoDadosEnvio->getResultado() instanceof VirtualTargetRetornaEstatisticasDeEnvioRetorno)
      {
        echo 'Código do envio.................: ' . $retornoDadosEnvio->getResultado()->getCodigo() . PHP_EOL;
        echo 'Assunto da mensagem.............: ' . $retornoDadosEnvio->getResultado()->getAssunto() . PHP_EOL;
        echo 'Duração do envio................: ' . $retornoDadosEnvio->getResultado()->getDuracaoEnvio() . PHP_EOL;
        echo 'Status do envio.................: ' . $retornoDadosEnvio->getResultado()->getStatus() . ' - ' . $retornoDadosEnvio->getResultado()->getDescricaoStatus() . PHP_EOL;
        echo 'Quantidade total................: ' . $retornoDadosEnvio->getResultado()->getQuantidadeTotal() . PHP_EOL;
        echo 'Quantidade recebidos............: ' . $retornoDadosEnvio->getResultado()->getQuantidadeRecebidos() . PHP_EOL;
        echo 'Quantidade processados..........: ' . $retornoDadosEnvio->getResultado()->getQuantidadeProcessados() . PHP_EOL;
        echo 'Quantidade conexões.............: ' . $retornoDadosEnvio->getResultado()->getQuantidadeConexoes() . PHP_EOL;
        echo 'Quantidade de saídas............: ' . $retornoDadosEnvio->getResultado()->getQuantidadeOutput() . PHP_EOL;
        echo 'Quantidade visualizações únicas.: ' . $retornoDadosEnvio->getResultado()->getQuantidadeVisualizadosUnico() . PHP_EOL;
        echo 'Quantidade visualizações total..: ' . $retornoDadosEnvio->getResultado()->getQuantidadeVisualizadosTotal() . PHP_EOL;
        echo 'Quantidade cliques únicos.......: ' . $retornoDadosEnvio->getResultado()->getQuantidadeClicadosUnico() . PHP_EOL;
        echo 'Quantidade cliques total........: ' . $retornoDadosEnvio->getResultado()->getQuantidadeClicadosTotal() . PHP_EOL;
      } else
        echo 'Código ' . $retornoDadosEnvio->getEnvioId() . ' não encontrado.';
    } else
      echo 'Código ' . $retornoDadosEnvio->getEnvioId() . ' não encontrado.';
  } catch (Exception $exc)
  {
    echo $exc->getMessage();
  }
?>
