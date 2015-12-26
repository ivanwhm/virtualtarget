<?php

  /**
   * Classe que cria um novo envio e realiza seu agendamento através do uso do webservice.
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   * @final
   */
  final class VTCriaNovoEnvio extends VirtualTarget
  {

    /**
     * Contém o código da campanha.
     * @var integer
     */
    private $campanhaId;

    /**
     * Contém o nome do remetente.
     * @var string
     */
    private $remetenteNome;

    /**
     * Contém o e-mail do remetente.
     * @var string
     */
    private $remetenteEmail;

    /**
     * Contém o endereço de replay do remetente.
     * @var string
     */
    private $remetenteReply;

    /**
     * Contém o assunto do e-mail.
     * @var string
     */
    private $assunto;

    /**
     * Contém o código HTML da mensagem.
     * @var string
     */
    private $mensagem;

    /**
     * Contém a data e hora programada do envio.
     * Formato: dd/mm/aaaa HH:ii
     * @var datetime
     */
    private $dataHoraProgramada;

    /**
     * Contém o e-mail para notificação de conclusão de envio.
     * @var string
     */
    private $notificacaoEmail;

    /**
     * Contém o número de celular para notificaçào de conclusão de envio.
     * @var string
     */
    private $notificacaoSMS;

    /**
     * Contém o filtro de listas para o envio.
     * @var array
     */
    private $filtro;

    /**
     * Indica o código da campanha do e-mail.
     * @param integer $campanhaId Código da campanha.
     */
    public function setCampanhaId($campanhaId)
    {
      $this->campanhaId = (int) $campanhaId;
    }

    /**
     * Indica o nome do remetente do e-mail.
     * @param string $remetenteNome Nome do remetente.
     */
    public function setRemetenteNome($remetenteNome)
    {
      $this->remetenteNome = (string) $remetenteNome;
    }

    /**
     * Indica o e-mail do remetente do e-mail.
     * @param string $remetenteEmail E-mail do remetente.
     */
    public function setRemetenteEmail($remetenteEmail)
    {
      $this->remetenteEmail = (string) $remetenteEmail;
    }

    /**
     * Indica o endereço de e-mail de replay do remetente do e-mail.
     * @param string $remetenteReply E-mail de replay do remetente.
     */
    public function setRemetenteReply($remetenteReply)
    {
      $this->remetenteReply = (string) $remetenteReply;
    }

    /**
     * Indica o assunto do e-mail.
     * @param string $assunto Assunto do e-mail.
     */
    public function setAssunto($assunto)
    {
      $this->assunto = (string) $assunto;
    }

    /**
     * Indica a mensagem do e-mail
     * @param string $mensagem Mensagem do e-mail.
     */
    public function setMensagem($mensagem)
    {
      $this->mensagem = (string) $mensagem;
    }

    /**
     * Indica a data e hora programada para o envio.
     * @param DateTime $dataHoraProgramada Data e hora do envio.
     */
    public function setDataHoraProgramada(DateTime $dataHoraProgramada)
    {
      $this->dataHoraProgramada = $dataHoraProgramada->format('d/m/Y H:i');
    }

    /**
     * Indica o e-mail para receber a notificação de conclusão de envio.
     * @param string $notificacaoEmail E-mail para notificação.
     */
    public function setNotificacaoEmail($notificacaoEmail)
    {
      $this->notificacaoEmail = (string) $notificacaoEmail;
    }

    /**
     * Indica o número do telefone celular para receber a notificação de conclusão de envio.
     * @param string $notificacaoSMS Celular para notificação.
     */
    public function setNotificacaoSMS($notificacaoSMS)
    {
      $this->notificacaoSMS = (string) $notificacaoSMS;
    }

    public function addFiltro($filtro)
    {
      $this->filtro = $filtro;
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
        'campanhaId' => (string) $this->campanhaId,
        'remetente_nome' => (string) $this->remetenteNome,
        'remetente_email' => (string) $this->remetenteEmail,
        'remetente_reply' => (string) $this->remetenteReply,
        'assunto' => (string) $this->assunto,
        'mensagem' => (string) $this->mensagem,
        'datahora_programada' => (string) $this->dataHoraProgramada,
        'notificacao_email' => (string) $this->notificacaoEmail,
        'notificacao_sms' => (string) $this->notificacaoSMS,
        'filtro' => $this->filtro,
      );
      return $parametros;
    }

    /**
     * Processa a consulta.
     * 
     * @return array
     */
    public function processa()
    {
      $cliente = $this->getSoapClient();
      if ($cliente)
      {
        $retorno = $cliente->__soapCall('CriaNovoEnvio', $this->getParametros());
        return $retorno;
      }
      return array();
    }

  }

?>
