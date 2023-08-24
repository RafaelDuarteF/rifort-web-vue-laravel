<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailContato extends Mailable
{
    use Queueable, SerializesModels;

    public $mensagem; // Adicione esta variável para armazenar a mensagem

    /**
     * Create a new message instance.
     *
     * @param string $mensagem A mensagem a ser enviada no e-mail
     */
    public function __construct($mensagem)
    {
        $this->mensagem = $mensagem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Contato Rifort')
            ->view('emails.contato')
            ->with(['mensagem' => $this->mensagem]); // Passa a variável $mensagem para a visualização
    }
}