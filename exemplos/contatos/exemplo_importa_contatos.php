<?php

  //Ajusta a codificação e o tipo do conteúdo
  header('Content-type: text/txt; charset=utf-8');

  //Importa as classes
  require '../../classes/VirtualTarget.php';
  require '../../classes/contatos/VirtualTargetImportaContatos.php';

  //Importa
  try
  {
    $importa = new VirtualTargetImportaContatos('', '');
    $importa->setListaId(132);
    $importa->setNomeArquivo('consumer.csv');
    $importa->setDadosArquivo('UEsDBBQAAAAIAGJWO0Ez63rYOgAAAMAAAAY29uc3VtZXIuY3N2y8vPTbVOzU3MzOHyLEvMUwjPzMlIzclVyHTOyS9Nsc4EiumVZ+Q65KbqJefnoqpxB2lDKEkHccGqAFBLAQIAABQAAAAIAGJWO0Ez63rYOgAAAFUAAAAMAAAAAAAAAAAAAAAAAAAAAABjb25zdW1lci5jc3ZQSwUGAAAAAAEAAQA6AAAAZAAAAAAA');
    $importa->setColunas(array(
      0 => array("campo" => "nome", "coluna" => 1),
      1 => array("campo" => "email", "coluna" => 2),
    ));
    $importa->setIncluirNovosContatos(TRUE);
    $importa->setAtualizarExistentes(TRUE);
    $importa->setChavePrimaria('email');

    if ($importa->processa())
      echo 'Arquivo importado com sucesso.';
    else
      echo 'Não foi possível importar o arquivo.';
  } catch (Exception $exc)
  {
    echo $exc->getMessage();
  }
?>
