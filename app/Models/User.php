<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        'avatar',
        'cover_photo',
        'headline',
        'bio',
        'location',
        'active',
        'role',

    ];

    // Chỉ định các trường không được gán hàng loạt
    // protected $guarded = ['id', 'created_at', 'updated_at', 'password', 'remember_token', 'email_verified_at'];

    protected $attributes = [
        'active' => true,
        'role' => 'user',
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
            'password' => 'hashed',
            'active' => 'boolean',
        ];
    }


    public function basicInfo()
    {
        return $this->hasOne(BasicInfo::class);
    }

    public function contactInfo()
    {
        return $this->hasOne(ContactInfo::class);
    }

    public function educations()
    {
        return $this->hasMany(UserEducation::class);
    }

    public function experiences()
    {
        return $this->hasMany(UserExperience::class);
    }

    public function skills()
    {
        return $this->hasMany(UserSkill::class);
    }

    public function blockedUsers()
    {
        return $this->hasMany(BlockedUser::class);
    }

    public function settings() {
        return $this->hasOne(Setting::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }

    // người gửi
    public function sentConnections() {
        return $this->hasMany(Connection::class, 'sender_id');
    }
    // người nhận
    public function receivedConnections() {
        return $this->hasMany(Connection::class, 'receiver_id');
    }

    // Tất cả kết nối (gửi + nhận)
    public function connections() {
        return $this->sentConnections->merge($this->receivedConnections);
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    // Kiểm tra user có vai trò cụ thể không
    public function hasRole($role) {
        return $this->roles->contains('name', $role);
    }

}
