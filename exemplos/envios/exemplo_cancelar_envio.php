<?php

  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../../classes/VirtualTarget.php';
  require '../../classes/envios/VTCancelarEnvio.php';

  //Importa
  try
  {
    $cancelamento = new VTCancelarEnvio('webstore', 'kv6y2bdpqg9n');
    $cancelamento->setEnvioId(123);
    
    if ($cancelamento->processa())
      echo 'Envio cancelado com sucesso.';
    else
      echo 'Não foi possível cancelar o envio.';
  } catch (Exception $exc)
  {
    echo $exc->getMessage();
  }
?>
