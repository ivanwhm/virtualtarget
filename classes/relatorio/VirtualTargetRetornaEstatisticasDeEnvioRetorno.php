<?php

  class VirtualTargetRetornaEstatisticasDeEnvioRetorno
  {

    /**
     * Contém o código do envio.
     * 
     * @var integer
     */
    private $codigo;

    /**
     * Contém o assunto do envio.
     * 
     * @var string
     */
    private $assunto;

    /**
     * Contém o código do status do envio.
     * 
     * @var integer
     */
    private $status;

    /**
     * Contém a descrição do status.
     * 
     * @var string
     */
    private $descricaoStatus;

    /**
     * Contém o tempo total de envio das mensagens.
     * 
     * @var time
     */
    private $duracaoEnvio;

    /**
     * Contém a quantidade total de mensagens enviadas.
     * 
     * @var integer
     */
    private $quantidadeTotal;

    /**
     * Contém a quantidade de mensagens recebidas.
     * 
     * @var integer
     */
    private $quantidadeRecebidos;

    /**
     * Contém a quantidade de mensagens processadas.
     * 
     * @var integer
     */
    private $quantidadeProcessados;

    /**
     * Contém a quantidade de conexões necessárias.
     * 
     * @var integer
     */
    private $quantidadeConexoes;

    /**
     * Contém a quantidade de saídas através do envio.
     * 
     * @var integer
     */
    private $quantidadeOutput;

    /**
     * Contém a quantidade de visualizações únicas do envio.
     * 
     * @var integer
     */
    private $quantidadeVisualizadosUnico;

    /**
     * Contém a quantidade total de visualizações do envio.
     * 
     * @var integer
     */
    private $quantidadeVisualizadosTotal;

    /**
     * Contém a quantidade de cliques únicos do envio.
     * 
     * @var integer
     */
    private $quantidadeClicadosUnico;

    /**
     * Contém a quantidade total de cliques do envio.
     * 
     * @var integer
     */
    private $quantidadeClicadosTotal;

    /**
     * Contém a lista dos status disponíveis.
     * 
     * @var array
     */
    private $statusDisponiveis = array(
      1 => 'Em edição',
      2 => 'Aguardando',
      3 => 'Aguardando aprovação',
      4 => 'Aprovado',
      5 => 'Pausado',
      6 => 'Cancelado',
      7 => 'Processando',
      8 => 'Concluído',
      9 => 'Bloqueado',
      10 => 'Transacional',
    );

    /**
     * Cria um objeto com o retorno do método RetornaEstatisticasDeEnvio, tratando as informações.
     * 
     * @param stdClass $retorno Retorno ao método.
     */
    public function __construct(stdClass $retorno)
    {
      $this->setCodigo(isset($retorno->codigo) ? $retorno->codigo : 0);
      $this->setAssunto(isset($retorno->assunto) ? $retorno->assunto : '');
      $this->setStatus(isset($retorno->status_codigo) ? $retorno->status_codigo : 0);
      $this->setQuantidadeTotal(isset($retorno->quantidade_total) ? $retorno->quantidade_total : 0);
      $this->setQuantidadeRecebidos(isset($retorno->recebidos) ? $retorno->recebidos : 0);
      $this->setQuantidadeProcessados(isset($retorno->processados) ? $retorno->processados : 0);
      $this->setDuracaoEnvio(isset($retorno->duracao) ? $retorno->duracao : '');
      $this->setQuantidadeConexoes(isset($retorno->quantidade_conexoes) ? $retorno->quantidade_conexoes : 0);
      $this->setQuantidadeOutput(isset($retorno->quantidade_output) ? $retorno->quantidade_output : 0);
      $this->setQuantidadeVisualizadosUnico(isset($retorno->visualizados) ? $retorno->visualizados : 0);
      $this->setQuantidadeVisualizadosTotal(isset($retorno->visualizados_total) ? $retorno->visualizados_total : 0);
      $this->setQuantidadeClicadosUnico(isset($retorno->clicados) ? $retorno->clicados : 0);
      $this->setQuantidadeClicadosTotal(isset($retorno->clicados_total) ? $retorno->clicados_total : 0);
    }

    /**
     * Informa o código do envio.
     * 
     * @param integer $codigo Código do envio.
     */
    private function setCodigo($codigo)
    {
      $this->codigo = (integer) $codigo;
    }

    /**
     * Informa o assunto do envio.
     * 
     * @param string $assunto Assunto do envio.
     */
    private function setAssunto($assunto)
    {
      $this->assunto = (string) $assunto;
    }

    /**
     * Informa o código de status do envio.
     * 
     * @param integer $status Código de status do envio.
     */
    private function setStatus($status)
    {
      $this->status = (integer) $status;
      $this->descricaoStatus = isset($this->statusDisponiveis[$status]) ? $this->statusDisponiveis[$status] : 'Não encontrado';
    }

    /**
     * Informa a quantidade total de mensagens enviadas.
     * 
     * @param integer $quantidadeTotal Quantidade total de mensagens enviadas.
     */
    private function setQuantidadeTotal($quantidadeTotal)
    {
      $this->quantidadeTotal = (integer) $quantidadeTotal;
    }

    /**
     * Informa a quantidade de mensagens recebidas.
     * 
     * @param integer $quantidadeRecebidos Quantidade de mensagens recebidas.
     */
    private function setQuantidadeRecebidos($quantidadeRecebidos)
    {
      $this->quantidadeRecebidos = (integer) $quantidadeRecebidos;
    }

    /**
     * Informa a quantidade de e-mails processados.
     * 
     * @param integer $quantidadeProcessados Quantidade de e-mails processados.
     */
    private function setQuantidadeProcessados($quantidadeProcessados)
    {
      $this->quantidadeProcessados = (integer) $quantidadeProcessados;
    }

    /**
     * Informa a duração do envio no formato hh:mm:ss.
     * 
     * @param string $duracaoEnvio Duração do envio.
     */
    private function setDuracaoEnvio($duracaoEnvio)
    {
      $this->duracaoEnvio = $duracaoEnvio;
    }

    /**
     * Informa a quantidade de conexões necessárias para realizar o envio.
     * 
     * @param integer $quantidadeConexoes Quantidade de conexões necessárias para realizar o envio.
     */
    private function setQuantidadeConexoes($quantidadeConexoes)
    {
      $this->quantidadeConexoes = (integer) $quantidadeConexoes;
    }

    /**
     * Informa a quantidade de contatos que solicitaram output.
     * 
     * @param integer $quantidadeOutput Quantidade de contatos que solicitaram output.
     */
    private function setQuantidadeOutput($quantidadeOutput)
    {
      $this->quantidadeOutput = (integer) $quantidadeOutput;
    }

    /**
     * Informa a quantidade de contatos únicos que visualizaram o e-mail.
     * 
     * @param integer $quantidadeVisualizadosUnico Quantidade de contatos únicos que visualizaram o e-mail.
     */
    private function setQuantidadeVisualizadosUnico($quantidadeVisualizadosUnico)
    {
      $this->quantidadeVisualizadosUnico = (integer) $quantidadeVisualizadosUnico;
    }

    /**
     * Informa a quantidade total de visualizações.
     * 
     * @param integer $quantidadeVisualizadosTotal Quantidade total de visualizações.
     */
    private function setQuantidadeVisualizadosTotal($quantidadeVisualizadosTotal)
    {
      $this->quantidadeVisualizadosTotal = (integer) $quantidadeVisualizadosTotal;
    }

    /**
     * Informa a quantidade de cliques únicos.
     * 
     * @param integer $quantidadeClicadosUnico Quantidade de cliques únicos.
     */
    private function setQuantidadeClicadosUnico($quantidadeClicadosUnico)
    {
      $this->quantidadeClicadosUnico = (integer) $quantidadeClicadosUnico;
    }

    /**
     * Informa a quantidade totald e cliques.
     * 
     * @param integer $quantidadeClicadosTotal Quantidade totald e cliques.
     */
    private function setQuantidadeClicadosTotal($quantidadeClicadosTotal)
    {
      $this->quantidadeClicadosTotal = (integer) $quantidadeClicadosTotal;
    }

    /**
     * Retorna o código do envio.
     * 
     * @return integer
     */
    public function getCodigo()
    {
      return $this->codigo;
    }

    /**
     * Retorna o assunto do envio.
     * 
     * @return string
     */
    public function getAssunto()
    {
      return $this->assunto;
    }

    /**
     * Retorna o código de status do envio.
     * 
     * @return string
     */
    public function getStatus()
    {
      return $this->status;
    }

    /**
     * Retorna a descrição do status do envio.
     * 
     * @return string
     */
    public function getDescricaoStatus()
    {
      return $this->descricaoStatus;
    }

    /**
     * Retorna a duração do envio no formato hh:mm:ss.
     * 
     * @return time
     */
    public function getDuracaoEnvio()
    {
      return $this->duracaoEnvio;
    }

    /**
     * Retorna a quantidade totald e contatos.
     * 
     * @return integer
     */
    public function getQuantidadeTotal()
    {
      return $this->quantidadeTotal;
    }

    /**
     * Retorna a quantidade de contatos que receberam o envio.
     * 
     * @return integer
     */
    public function getQuantidadeRecebidos()
    {
      return $this->quantidadeRecebidos;
    }

    /**
     * Retona a quantidade de e-mails processados.
     * 
     * @return integer
     */
    public function getQuantidadeProcessados()
    {
      return $this->quantidadeProcessados;
    }

    /**
     * Retorna a quantidade de conexões para realizar o envio.
     * 
     * @return integer
     */
    public function getQuantidadeConexoes()
    {
      return $this->quantidadeConexoes;
    }

    /**
     * Retorna a quantidade de contatos que solicitaram output.
     * 
     * @return integer
     */
    public function getQuantidadeOutput()
    {
      return $this->quantidadeOutput;
    }

    /**
     * Retorna a quantidade de contatos únicos que visualizaram o e-mail.
     * 
     * @return integer
     */
    public function getQuantidadeVisualizadosUnico()
    {
      return $this->quantidadeVisualizadosUnico;
    }

    /**
     * Retorna a quantidade total de visualizações.
     * 
     * @return integer
     */
    public function getQuantidadeVisualizadosTotal()
    {
      return $this->quantidadeVisualizadosTotal;
    }

    /**
     * Retorna a quantidade de cliques únicos.
     * 
     * @return integer
     */
    public function getQuantidadeClicadosUnico()
    {
      return $this->quantidadeClicadosUnico;
    }

    /**
     * Retorna a quantidade total de cliques.
     * 
     * @return integer
     */
    public function getQuantidadeClicadosTotal()
    {
      return $this->quantidadeClicadosTotal;
    }

  }

?>
