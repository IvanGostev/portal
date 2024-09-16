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
    protected $guarded = false;

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


    public function city() {
        return City::where('id', $this->city_id)->first();
    }
    public function cityLegal() {
        return City::where('id', $this->legal_city_id)->first();
    }
    public function cityMail() {
        return City::where('id', $this->mail_city_id)->first();
    }
    public function country() {
        return Country::where('id', $this->country_id)->first();
    }

    public function countryMail() {
        return Country::where('id', $this->mail_country_id)->first();
    }

    public function countryLegal() {
        return Country::where('id', $this->legal_country_id)->first();
    }
    public function countryBank() {
        return Country::where('id', $this->bank_country_id)->first();
    }

    public function currency() {
        return Currency::where('id', $this->currency_id)->first();
    }

}
