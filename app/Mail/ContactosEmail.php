<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Contactos;

class ContactosEmail extends Mailable
{
    use Queueable, SerializesModels;
    private $dados;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contactos $dados)
    {
        $this->dados=$dados;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Contactos');
        return $this->view('admin.mail.contactos',
    ['contactos'=>$this->dados]
    );
    }
}
