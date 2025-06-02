<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Department;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $table = "users";
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->id = (string) Str::uuid();

            $lastNip = static::where('nip', 'like', 'PEG-%')->lates()->value('nip');

            $model->nip = Str::increment($lastNip ?? 'PEG');
        });
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'nip',
        'role',
        'department_id',
    ];

    public function getRouteKeyName()
    {
        return 'nip';
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'role',
        'created_at',
        'updated_at',
        'deleted_at',
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

    protected function name(): Attribute{
        return Attribute::make(
            get: fn($value) => strtolower($value),
            set: fn($value) => strtolower($value)
        );
    }

    protected function email(): Attribute{
        return Attribute::make(
            get: fn($value) => strtolower($value),
            set: fn($value) => strtolower($value)
        );
    }

    protected function






    public function Department()
    {
        return $this->belongsTo(Department::class, 'depatment_id','id');
    }

    public function submissionDetail()
    {
        return $this->hasMany(Submission::class, 'user_id','id');
    }

}
