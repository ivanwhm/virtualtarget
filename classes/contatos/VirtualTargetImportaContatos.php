<?php

  /**
   * Classe que adiciona ou atualiza os dados cadastrais de um contato, realizando
   * o upload de um arquivo .csv com até 5MB diretamente no servidor da
   * Virtual Target.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  class VirtualTargetImportaContatos extends VirtualTarget
  {

    /**
     * Contém o código da lista correspondente a importação.
     * 
     * @var integer
     */
    private $listaId;

    /**
     * Contém o nome do arquivo que será gerado na virtual target.
     * 
     * @var string
     */
    private $nomeArquivo;

    /**
     * Contém a codificação base64 do arquivo zip gerado.
     * Limite do tamanho do arquivo é de 5MB.
     * 
     * @var string
     */
    private $dadosArquivo;

    /**
     * Contém o array de colunas do arquivo.
     * 
     * @var array
     */
    private $colunas;

    /**
     * Indica se os novos contatos devem ser incluídos.
     * 
     * @var boolean
     */
    private $incluirNovosContatos;

    /**
     * Indica se os contatos existem devem ser atualiuzados.
     * 
     * @var boolean
     */
    private $atualizarExistentes;

    /**
     * Contém o nome do campo correspondente a chave primária.
     * 
     * @var string
     */
    private $chavePrimaria;

    /**
     * Informa o código da lista correspondente a importação.
     * 
     * @param integer $listaId Código da lista correspondente a importação.
     */
    public function setListaId($listaId)
    {
      $this->listaId = (int) $listaId;
    }

    /**
     * Informa o nome do arquivo que será gerado na virtual target.
     * 
     * @param string $nomeArquivo Nome do arquivo que será gerado na virtual target.
     */
    public function setNomeArquivo($nomeArquivo)
    {
      $this->nomeArquivo = (string) $nomeArquivo;
    }

    /**
     * Informa a codificação base64 do arquivo zip gerado.
     * 
     * @param string $dadosArquivo Codificação base64 do arquivo zip gerado.
     */
    public function setDadosArquivo($dadosArquivo)
    {
      $this->dadosArquivo = $dadosArquivo;
    }

    /**
     * Informa o array de colunas do arquivo.
     * 
     * @param array $colunas Array de colunas do arquivo.
     */
    public function setColunas($colunas)
    {
      $this->colunas = $colunas;
    }

    /**
     * Informa se os novos contatos devem ser incluídos.
     * 
     * @param boolean $incluirNovosContatos Indica se os novos contatos devem ser incluídos.
     */
    public function setIncluirNovosContatos($incluirNovosContatos)
    {
      $this->incluirNovosContatos = (bool) $incluirNovosContatos;
    }

    /**
     * Informa se os contatos existem devem ser atualiuzados.
     * 
     * @param boolean $atualizarExistentes Indica se os contatos existem devem ser atualiuzados.
     */
    public function setAtualizarExistentes($atualizarExistentes)
    {
      $this->atualizarExistentes = (bool) $atualizarExistentes;
    }

    /**
     * Informa o nome do campo correspondente a chave primária.
     * 
     * @param string $chavePrimaria Nome do campo correspondente a chave primária.
     */
    public function setChavePrimaria($chavePrimaria)
    {
      $this->chavePrimaria = (string) $chavePrimaria;
    }

    /**
     * Retorna os parâmetros a serem enviados.
     * 
     * @return array 
     */
    protected function getParametros()
    {
      $parametros = array(
        'login' => (string) $this->getLogin(),
        'senha' => (string) $this->getSenha(),
        'listaId' => (integer) $this->listaId,
        'nomeArquivo' => (string) $this->nomeArquivo,
        'dadosArquivo' => (string) $this->dadosArquivo,
        'colunas' => (array) $this->colunas,
        'incluirNovosContatos' => (boolean) $this->incluirNovosContatos,
        'atualizarExistentes' => (boolean) $this->atualizarExistentes,
        'chavePrimaria' => (string) $this->chavePrimaria,
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
        $retorno = $cliente->__soapCall('ImportaContatos', $this->getParametros());
        return $retorno;
      }
      return FALSE;
    }

  }

?>
