<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Carbon\Carbon;


class Department extends Model
{
    //

    use SoftDeletes,HasFactory;

    protected $table = 'departments';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

     protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'department_name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function getRouteKeyName()
    {
        return 'department_name';
    }

    protected function DepartmentName(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value)
        );
    }

    public function User()
    {
        return $this->hasMany(User::class, 'department_id');
    }


}
