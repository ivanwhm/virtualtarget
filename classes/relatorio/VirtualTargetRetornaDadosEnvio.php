<?php

  /**
   * Classe que retorna os dados de um determinado envio.
   * Correspondente ao método RetornaDadosEnvio.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class VirtualTargetRetornaDadosEnvio extends VirtualTarget
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
     * @var VirtualTargetRetornaDadosEnvioRetorno;
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
     * @return VirtualTargetRetornaDadosEnvioRetorno
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
        $retorno = $cliente->__soapCall('RetornaDadosEnvio', $this->getParametros());
        if (isset($retorno[0]) and $retorno[0] instanceof stdClass)
        {
          $this->resultado = new VirtualTargetRetornaDadosEnvioRetorno();
          $this->resultado->setCampanhaId(isset($retorno[0]->campanhaId) ? $retorno[0]->campanhaId : NULL);
          $this->resultado->setRemetenteNome(isset($retorno[0]->remetente_nome) ? $retorno[0]->remetente_nome : '');
          $this->resultado->setRemetenteEmail(isset($retorno[0]->remetente_email) ? $retorno[0]->remetente_email : '');
          $this->resultado->setRemetenteReplay(isset($retorno[0]->remetente_reply) ? $retorno[0]->remetente_reply : '');
          $this->resultado->setAssunto(isset($retorno[0]->assunto) ? $retorno[0]->assunto : '');
          $this->resultado->setHtml(isset($retorno[0]->html) ? $retorno[0]->html : '');
          $this->resultado->setDataHoraProgramada(isset($retorno[0]->datahora_programada) ? $retorno[0]->datahora_programada : NULL);
          return TRUE;
        }
      }
      $this->resultado = NULL;
      return FALSE;
    }

  }

?>
