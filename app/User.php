<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['login', 'password', 'surname', 'name', 'patronymic', 'country', 'city', 'gender', 'academic_degree',
        'academic_rank', 'position', 'full_name_of_organization', 'phone', 'address', 'email', 'roles'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function articles()
    {
        return $this->belongsToMany(article::class, "article_author");
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }
    public function hasAccess(array $permissions): bool
    {
        foreach ($this->roles as $role) {
            if ($role->hasAccess($permissions)) {
                return true;
            }
        }
        return false;
    }
    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
