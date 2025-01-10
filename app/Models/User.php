<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    // Sử dụng trait HasApiTokens để xác thực người dùng
    use HasApiTokens;
    // Sử dụng trait Notifiable để gửi thông báo - HasFactory để tạo dữ liệu mẫu
    use HasFactory, Notifiable;
    // Sử dụng trait HasRoles phân quyền
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'email',
        'password',
        'phone',
        // 'avatar',
        'cover_photo',
        'headline',
        'bio',
        'location',
        'active',
    ];

    // Chỉ định các trường không được gán hàng loạt
    // protected $guarded = ['id', 'created_at', 'updated_at', 'password', 'remember_token', 'email_verified_at'];

    protected $attributes = [
        'active' => true,
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

    public function avatars()
    {
        return $this->hasMany(UserAvatar::class);
    }

    public function Courses()
    {
        return $this->hasMany(UserCourse::class);
    }

    public function coverImage()
    {
        return $this->hasMany(UserCoverImage::class);
    }

    public function honorsAwards()
    {
        return $this->hasMany(UserHonorsAward::class);
    }

    public function projects()
    {
        return $this->hasMany(UserProject::class);
    }

    public function publications()
    {
        return $this->hasMany(UserPublication::class);
    }

    public function givenRecommendations()
    {
        return $this->hasMany(UserRecommendation::class, 'giver_id');
    }
     public function receivedRecommendations()
   {
       return $this->hasMany(UserRecommendation::class, 'receiver_id');
   }

    public function volunteering() {
        return $this->hasMany(UserVolunteering::class);
    }


    public function isAdmin() {
        return $this->hasRole('admin');
    }

}
