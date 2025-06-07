<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Item;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Category extends Model
{
    //
    use SoftDeletes,HasFactory;

    protected $table = "categories";
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
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // relasi dengan item
    // satu kategori memiliki banyak item
    // satu item hanya memiliki satu kategori
    // relasi ini digunakan untuk mengambil semua item yang terkait dengan kategori ini
    // dan juga untuk mengambil kategori dari item tertentu

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }


    // Getter Setter

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value)
        );
    }





}
