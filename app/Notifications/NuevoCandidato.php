<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    private $id_vacante;
    private $nombre_vacante;
    private $usuario_id;
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        $this->id_vacante=$id_vacante;
        $this->nombre_vacante=$nombre_vacante;
        $this->usuario_id=$usuario_id;
    }

   
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

   
    public function toMail(object $notifiable): MailMessage
    {

        $url = url('/notificaciones');
        return (new MailMessage)
                    ->line('Has recibido un nuevo candidato en tu vacante')
                    ->line('La vacante es: ' . $this->nombre_vacante)
                    ->action('Ver notificaciones', url('/'))
                    ->line('Gracias por utilizar LinkJobs');
    }

    // almacena las notificaciones en la base de datos

   public function toDatabase($notifiable){
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' =>  $this->usuario_id
        ];
   }
}
