<?php

  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../../classes/VirtualTarget.php';
  require '../../classes/envios/VTCriaNovoEnvio.php';

  //Importa
  try
  {
    $criar = new VTCriaNovoEnvio('', '');
    $criar->setRemetenteNome('Teste');
    $criar->setRemetenteEmail('teste@teste.com.br');
    $criar->setRemetenteReply('teste@teste.com.br');
    $criar->setAssunto('Teste de envio');
    $criar->setMensagem('Teste');
    $criar->setDataHoraProgramada(new DateTime());
    $criar->setNotificacaoEmail('teste@teste.com.br');
    $criar->addFiltro(array(array(
        'id' => 1,
        'campo' => '',
        'valores' => array()
      )), array(
      'id' => 141,
      'campo' => '',
      'valores' => array()
    ));
    $retorno = $criar->processa();
    echo '<pre>';
    var_dump($retorno);
    echo '</pre>';
  } catch (Exception $exc)
  {
    echo $exc->getMessage();
  }
?>
