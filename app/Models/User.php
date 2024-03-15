<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'service_using',
        'fee_using'
    ];
    protected $appends = [
        'html_role',
        'html_service'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function getHtmlServiceAttribute(): string
    {
        $value = $this->service_using;
        $line_html = '';
        if ($value == 1) {
            $line_html = '<p class="text-green-700">User using buyer service</p>';
        } elseif ($value == 2) {
            $line_html = '<p class="text-green-700">User using seller service</p>';
        }
        return $line_html;
    }

    public function getHtmlRoleAttribute(): string
    {
        $value = $this->role;
        $line_html = '';
        if ($value == 1) {
            $line_html = '<p class="text-green-700">User is customer</p>';
        } elseif ($value == 2) {
            $line_html = '<p class="text-green-700">User is seller</p>';
        }
        return $line_html;
    }
}
