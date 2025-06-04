<?php
  
namespace App\Models;
  
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Notifications\CustomVerifyEmail;
use App\Notifications\CustomResetPassword;
  
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'nowa',
        'team_name',
        'institution',
        'submit_for',
        'member_name',
        'member_role',
        'member_identity',
        'member_domicile',
        'member_email',
        'member_date_of_birth',
        'member_profession',
        'member_github_url',
        'member_linkedin_url',
        'project_link',
        'project_desc',
        'project_file',
        'submitted',
        'email_response',
        'email_response_timestamp',
    ];
  
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'video_submitted_at' => 'datetime',
    ];
 
    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "super-admin"][$value],
        );
    }

    public function members()
    {
        return $this->hasMany(User::class);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new CustomVerifyEmail);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPassword($token));
    }

    // Force OTP verification on user creation
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // $user->otp_verified_at = now();
        });
    }
}