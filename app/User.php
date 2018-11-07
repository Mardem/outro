<?php

namespace App;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $dates = ['deleted_at'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefinirSenha($token));
    }
}

class RedefinirSenha extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting("Redefinição de senha")
            ->line('Estamos enviando este e-mail porque recebemos uma solicitação de senha esquecida.')
            ->action('Redefinir Senha', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line('Se você não solicitou uma redefinição de senha, nenhuma outra ação será necessária. Desconsidere essa mensagem.')
            ->from("solucao.redefinicao@gmail.com")
            ->subject('Alteração de senha');
    }
}
