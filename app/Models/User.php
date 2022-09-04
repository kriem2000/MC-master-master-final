<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'phone_number',
        'profile_img',
        'profile_description',
        'CV',
        'is_approved'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

     public function speciality() {
        return $this->belongsToMany(Speciality::class, SpecialityUser::class);
     }

     public function role() {
        return $this->belongsToMany(Role::class, UserRole::class);
     }

     public function rates() {
        return $this->hasMany(Rate::class, 'doctor_id');
     }

     public function consultations() {
        return $this->hasMany(Consultation::class, 'doctor_id');
     }
}
