<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Item extends Model
{
    use SoftDeletes,HasFactory;

    protected $table = "items";
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
        'item_name',
        'brand',
        'total_stock',
        'category_id',
    ];

    protected $hidden =
    [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function itemName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords(strtolower($value)),
            set: fn($value) => strtolower($value)
        );
    }

    public function brand(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ucwords(strtolower($value)),
            set: fn($value) => strtolower($value)
        );
    }

    public function id(): Attribute
    {
        return Attribute::make(
            get: fn($value) => strtolower($value)
        );
    }

    public function totalStock(): Attribute{
        return Attribute::make(
            get: fn($value) => (int)$value,
            set: fn($value) => max((int)$value,0),
        );
    }

    // relasi dengan category
     public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // relasi dengan item details
    public function itemDetails()
    {
        return $this->hasMany(ItemDetail::class, 'item_id','id');
    }
}
