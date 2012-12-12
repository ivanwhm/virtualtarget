<?php

  /**
   * Classe que cancela um determinado envio.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class VTCancelarEnvio extends VirtualTarget
  {

    /**
     * Contém o código do Envio.
     * @var integer
     */
    private $envioId;

    /**
     * Informa o código do envio.
     * @param integer $envioId Código do envio.
     */
    public function setEnvioId($envioId)
    {
      $this->envioId = (int) $envioId;
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
        'envioId' => (int) $this->envioId,
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
        $retorno = $cliente->__soapCall('CancelarEnvio', $this->getParametros());
        return $retorno;
      }
      return FALSE;
    }

  }

?>
