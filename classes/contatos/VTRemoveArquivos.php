<?php

  /**
   * Classe que remove arquivos que foram upados na Virtual Target, permitindo que seja 
   * excluído mais de um arquivo por vez.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  class VTRemoveArquivos extends VirtualTarget
  {

    /**
     * Contém uma lista de nome de arquivos a serem removidos.
     * 
     * @var array
     */
    public $arquivos;

    /**
     * Adiciona mais um nome de arquivo a lista de arquivos a serem removidos.
     * 
     * @param string $nome Nome do arquivo.
     */
    public function addArquivo($nome)
    {
      $this->arquivos[] = trim($nome);
    }

    /**
     * Retorna os parâmetros a serem enviados.
     * 
     * @return array 
     */
    protected function getParametros()
    {
      $parametros = array(
        'login' => $this->getLogin(),
        'senha' => $this->getSenha(),
        'arquivos' => $this->arquivos,
      );
      return $parametros;
    }

    /**
     * Processa a consulta.
     * 
     * @return boolean 
     */
    public function processa()
    {
      $cliente = $this->getSoapClient();
      if ($cliente)
      {
        $retorno = $cliente->__soapCall('RemoveArquivos', $this->getParametros());
        return $retorno;
      }
      return FALSE;
    }

  }

?>
