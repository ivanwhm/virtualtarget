<?php

  /**
   * Classe que retorna as estatísticas de um determinado envio.
   * Correspondente ao método RetornaEstatisticasDeEnvio.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class VirtualTargetRetornaEstatisticasDeEnvio extends VirtualTarget
  {

    /**
     * Contém o código do envio a ser retornado.
     * 
     * @var integer
     */
    private $envioId;

    /**
     * Contém o objeto com os dados retornados.
     * 
     * @var VirtualTargetRetornaEstatisticasDeEnvioRetorno;
     */
    private $resultado;

    /**
     * Informa o código do envio a ser retornado.
     * 
     * @param integer $envioId
     * @throws Exception 
     */
    public function setEnvioId($envioId)
    {
      if (is_integer($envioId))
        $this->envioId = $envioId;
      else
        throw new Exception('Código do envio é obrigatório.');
    }

    /**
     * Retorna o código do envio a ser retornado.
     * 
     * @return integer
     */
    public function getEnvioId()
    {
      return $this->envioId;
    }

    /**
     * Retorna o objeto contendo as informações de retorno.
     * 
     * @return VirtualTargetRetornaEstatisticasDeEnvioRetorno
     */
    public function getResultado()
    {
      return $this->resultado;
    }

    /**
     * Retorna os parâmetros a serem utilizados na consulta.
     * 
     * @return array
     */
    protected function getParametros()
    {
      return array(
        'login' => (string) $this->getLogin(),
        'senha' => (string) $this->getSenha(),
        'envioId' => (integer) $this->envioId,
      );
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
        $retorno = $cliente->__soapCall('RetornaEstatisticasDeEnvio', $this->getParametros());
        if ((isset($retorno[0])) and ($retorno[0] instanceof stdClass))
        {
          $this->resultado = new VirtualTargetRetornaEstatisticasDeEnvioRetorno($retorno[0]);
          return TRUE;
        }
      }
      $this->resultado = NULL;
      return FALSE;
    }

  }

?>
