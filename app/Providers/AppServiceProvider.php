<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use App\Models\Vacante;
use App\Policies\VacantePolicy;


class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      VerifyEmail::toMailUsing(function($notifiable, $url){
        return (new MailMessage)
            ->subject('verificar cuenta')
            ->Line('Tu cuenta esta casi lista, solo debebes presionar el enlace a continuacion')
            ->action('Confirmar cuenta', $url)
            ->line('Si no creaste una cuenta, puedes ignorar este mensaje');
      });
    }
}
