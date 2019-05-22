<?php

namespace App;

use Eloquent;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $cpf
 * @property int $category
 * @property string $situacao
 * @property int|null $activated
 * @property string|null $token
 * @property Carbon|null $deleted_at
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActivated($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCpf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSituacao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static Builder|User withTrashed()
 * @method static Builder|User withoutTrashed()
 * @mixin Eloquent
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    const CATEGORY = [
        'ADMINISTRATOR' => 1,
        'OPERATOR' => 2
    ];
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

    # ---------------- Scopes ----------------
    public function scopeOperator($query)
    {
        return $query->where('category', '=', self::CATEGORY['OPERATOR']);
    }

    # ---------------- Mutators ----------------
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    # ---------------- Accessor ----------------
    public function getCategoryFormatedAttribute() // category_formated
    {
        if($this->attributes['category'] == self::CATEGORY['ADMINISTRATOR']) {
            $category = 'Administrador';
        } else {
            $category = 'Operador';
        }
        return $category;
    }
    public function getStatusFormatedAttribute() // status_formated
    {
        if($this->attributes['situacao'] == 0) {
            $status = 'Ativo';
        } else {
            $status = 'Inativo';
        }
        return $status;
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
