<?php

namespace App\Notifications;

use App\Models\Agendamento;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SolicitacaoAgendamento extends Notification
{
    use Queueable;

    protected $agendamento;
    public function __construct(Agendamento $agendamento)
    {
        $this->agendamento = $agendamento;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Nova Solicitação de Sala')
            ->greeting('Olá, Administrador!')
            ->line('Um novo agendamento foi solicitado')
            ->line('Sala: '. $this->agendamento->sala->nome)
            ->line('Inicio: '. $this->agendamento->inicio)
            ->line('Fim: '. $this->agendamento->fim)
            ->line('Motivo: '. $this->agendamento->motivo)
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
