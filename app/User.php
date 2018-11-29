<?php

namespace App;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
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
        'password', 'remember_token', 'cpf', 'created_at', 'updated_at', 'activated', 'deleted_at', 'email_verified_at'
    ];
    protected $dates = ['deleted_at'];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RedefinirSenha($token));
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'name' => $this->name,
            'email' => $this->email
        ];
    }
}

class RedefinirSenha extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting("Redefinição de senha")
            ->line('Estamos enviando este e-mail porque recebemos uma solicitação de senha esquecida.')
            ->action('Redefinir Senha', url(url('/') . route('password.reset', $this->token, false)))
            ->line('Se você não solicitou uma redefinição de senha, nenhuma outra ação será necessária. Desconsidere essa mensagem.')
            ->from("solucao.redefinicao@gmail.com", "Solução - Redefinição de Senha")
            ->subject('Alteração de senha');
    }
}
