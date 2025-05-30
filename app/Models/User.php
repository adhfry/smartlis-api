<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Card;
use App\Models\Role;
use App\Models\AccessLog;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'no_hp',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
            'whatsapp_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function accessLogs()
    {
        return $this->hasMany(AccessLog::class);
    }

    public function getHighestRole()
    {
        // Urutan role yang sudah ditentukan
        $rolePriority = ['admin', 'administrasi', 'user'];

        // Ambil semua role yang dimiliki oleh user
        $userRoles = $this->roles()->pluck('name')->toArray();
        // Filter role yang ada pada user, dan urutkan berdasarkan urutan yang diberikan
        $sortedRoles = array_intersect($rolePriority, $userRoles);

        // Ambil role tertinggi yang ada dalam urutan
        return reset($sortedRoles);    // Mengembalikan role tertinggi atau null jika tidak ada
    }
}