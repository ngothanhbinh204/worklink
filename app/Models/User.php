<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


/**
 *
 *
 * @property int $id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $avatar
 * @property string|null $cover_photo
 * @property string|null $headline
 * @property string|null $bio
 * @property string|null $location
 * @property bool $active
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserCourse> $Courses
 * @property-read int|null $courses_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserAvatar> $avatars
 * @property-read int|null $avatars_count
 * @property-read \App\Models\BasicInfo|null $basicInfo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlockedUser> $blockedUsers
 * @property-read int|null $blocked_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Client> $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\ContactInfo|null $contactInfo
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserCoverImage> $coverImage
 * @property-read int|null $cover_image_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserEducation> $educations
 * @property-read int|null $educations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserExperience> $experiences
 * @property-read int|null $experiences_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserRecommendation> $givenRecommendations
 * @property-read int|null $given_recommendations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserHonorsAward> $honorsAwards
 * @property-read int|null $honors_awards_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Notification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserProject> $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserPublication> $publications
 * @property-read int|null $publications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Connection> $receivedConnections
 * @property-read int|null $received_connections_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserRecommendation> $receivedRecommendations
 * @property-read int|null $received_recommendations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Connection> $sentConnections
 * @property-read int|null $sent_connections_count
 * @property-read \App\Models\Setting|null $settings
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserSkill> $skills
 * @property-read int|null $skills_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Passport\Token> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserVolunteering> $volunteering
 * @property-read int|null $volunteering_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCoverPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereHeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */

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
    protected $hidden = ['password', 'remember_token'];

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

    public function settings()
    {
        return $this->hasOne(Setting::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    // người gửi
    public function sentConnections()
    {
        return $this->hasMany(Connection::class, 'sender_id');
    }
    // người nhận
    public function receivedConnections()
    {
        return $this->hasMany(Connection::class, 'receiver_id');
    }

    // Tất cả kết nối (gửi + nhận)
    public function connections()
    {
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

    public function volunteering()
    {
        return $this->hasMany(UserVolunteering::class);
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }
}