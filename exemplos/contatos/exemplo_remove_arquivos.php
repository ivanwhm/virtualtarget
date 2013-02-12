<?php

  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../../classes/VirtualTarget.php';
  require '../../classes/contatos/VTRemoveArquivos.php';

  //Importa
  try
  {
    $importa = new VTRemoveArquivos('', '');
    $importa->addArquivo('lista-componentes-2012-11-05-17-24-22.csv');
    $importa->addArquivo('teste2.csv');
    $importa->addArquivo('teste3.csv');
    
    if ($importa->processa())
      echo 'Arquivos removidos com sucesso.';
    else
      echo 'Não foi possível remover os arquivos.';
  } catch (Exception $exc)
  {
    echo $exc->getMessage();
  }
?>
