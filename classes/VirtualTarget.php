<?php

  /**
   * Classe base para integração com os Webservices da Virtual Target.
   * Para utilizar estas classes é necessário ser um cliente da Virtual Target.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @see http://www.virtualtarget.com.br/wp-content/uploads/webservice.pdf
   * @abstract
   */
  abstract class VirtualTarget
  {

    const VIRTUAL_TARGET_TIMEZONE = 'America/Sao_Paulo';

    /**
     * Contém a URL do descritor.
     * 
     * @var string
     */
    private $urlDescritor = 'http://webservices2.virtualtarget.com.br/index.php?wsdl';

    /**
     * Contém o login de acesso ao webservice.
     * 
     * @var string
     */    
    private $login;

    /**
     * Contém a senha de acesso ao webservice.
     * 
     * @var string
     */
    private $senha;

    /**
     * Cria um novo objeto de comunicação com a Virtual Target.
     * 
     * @param string $login Login de acesso.
     * @param string $senha Senha de acesso.
     * @throws Exception 
     */
    public function __construct($login, $senha)
    {
      if (!empty($login) and !empty($senha))
      {
        $this->login = $login;
        $this->senha = $senha;
      } else
        throw new Exception('Login e senha são obrigatórios para a chamada.');
    }

    /**
     * Retorna o login de acesso ao webservice.
     * 
     * @return string
     * @final
     */
    final protected function getLogin()
    {
      return $this->login;
    }

    /**
     * Retorna a senha de acesso ao webservice.
     * 
     * @return string 
     * @final
     */
    final protected function getSenha()
    {
      return $this->senha;
    }

    /**
     * Retorna uma comunicação com o webservice funcional.
     * 
     * @return \SoapClient
     * @throws Exception 
     * @final
     */
    final protected function getSoapClient()
    {
      //Ativa o uso de URL FOpen
      ini_set("allow_url_fopen", 1);
      ini_set("soap.wsdl_cache_enabled", 0);
      try
      {
        return new SoapClient($this->urlDescritor);
      } catch (SoapFault $sf)
      {
        throw new Exception($sf->getMessage());
      }
    }

    /**
     * Realiza o processamento.
     * 
     * @return boolean 
     */
    abstract public function processa();

    /**
     * Retorna os parâmetros necessários ao processamento.
     *  
     * @return array 
     */
    abstract protected function getParametros();
  }

?>
