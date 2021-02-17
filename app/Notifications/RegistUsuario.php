<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Notifications\RegistUsuario;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegistUsuario extends Notification
{
    use Queueable;
     private $dados;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($dados)
    {
         $this->dados=$dados;    
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Confirmar inscrição')
                    ->line('Benvindo a yetoafrica para confirmar clica no botão abaixo.')
                    ->action('Confirmar', url('http://yetoafrica.com/admin/login'))
                    ->line('Obrigado pela sua preferência!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
