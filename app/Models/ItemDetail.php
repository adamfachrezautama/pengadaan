<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


class ItemDetail extends Model
{
    use SoftDeletes, HasFactory;
    //

    protected $table = 'item_details';
     public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'item_id',
        'qty',
        'status',
        'description'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $cast = [
        'status' => Status::class
    ];


    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }


    public function getRouteKeyName()
    {
        return 'status';
    }

    public function id(): Attribute{
        return Attribute::make(
            get: fn($value) => strtoupper($value)
        );
    }

    public function status(): Attribute{
        return Attribute::make(
            get: fn($value) => Status::from($value),
            set: fn($value) => $value instanceof Status ? $value->value : strtolower($value)
        );
    }

    public function qty(): Attribute{
        return Attribute::make(
            get: fn($value) => (int)$value,
            set: fn($value) => max((int) $value, 0) // tidak boleh negatif
        );
    }

    public function description(): Attribute{
        return Attribute::make(
            get: fn($value) => ucwords(strtolower($value)),
            set: fn($value) => strtolower($value),
        );
    }

    public function createdAt(): Attribute{
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('Y-m-d H:i:s'),
        );
    }

    public function updatedAt(): Attribute{
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('Y-m-d H:i:s'),
        );
    }

    public function deletedAt(): Attribute{
        return Attribute::make(
            get:fn($value) => Carbon::parse($value)->format('Y-m-d H:i:s'),
        );
    }

    // Scope


    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }
    public function scopeUnavailable($query)
    {
        return $query->where('status', 'unavailable');
    }
    public function scopeWithItemName($query, $itemName)
    {
        return $query->whereHas('item', function ($q) use ($itemName) {
            $q->where('item_name', 'like', '%' . $itemName . '%');
        });
    }
    public function scopeWithCategory($query, $categoryId)
    {
        return $query->whereHas('item.category', function ($q) use ($categoryId) {
            $q->where('id', $categoryId);
        });
    }
    public function scopeWithBrand($query, $brand)
    {
        return $query->whereHas('item', function ($q) use ($brand) {
            $q->where('brand', 'like', '%' . $brand . '%');
        });
    }
    public function scopeWithSpecification($query, $specification)
    {
        return $query->whereHas('item', function ($q) use ($specification) {
            $q->whereJsonContains('specification', $specification);
        });
    }
    public function scopeWithTotalStock($query, $totalStock)
    {
        return $query->whereHas('item', function ($q) use ($totalStock) {
            $q->where('total_stock', '>=', $totalStock);
        });
    }
    public function scopeWithDescription($query, $description)
    {
        return $query->where('description', 'like', '%' . $description . '%');
    }
    public function scopeWithQty($query, $qty)
    {
        return $query->where('qty', '>=', $qty);
    }
    public function scopeWithStatus($query, $status)
    {
        return $query->where('status', $status);
    }
    public function scopeWithId($query, $id)
    {
        return $query->where('id', $id);
    }
    public function scopeWithItemId($query, $itemId)
    {
        return $query->where('item_id', $itemId);
    }



    // Relasi

       // Relasi dengan Item

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    // Relasi dengan SubmissionDetail
        public function submissionDetails()
    {
        return $this->hasMany(SubmissionDetail::class, 'item_id');
    }
}
