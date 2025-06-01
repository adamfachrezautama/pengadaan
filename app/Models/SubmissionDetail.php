<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use App\Models\ItemDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class SubmissionDetail extends Model
{
    //

    use SoftDeletes,HasFactory;

    protected $table = 'submission_details';
     public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected static function boot()
    {
        parent::boot();
        static::creating(function($model){
            $model->id = (string) Str::uuid();
        });
    }

    protected $fillable = [
        'submission_id',
        'item_detail_id',
        'user_id',
        'qty',
        'status',
        'submission_reason',
        'rejection_reason',
        'approved_by',
        'approval_date',
    ];

      protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $cast = [
        'status' => Status::class,
    ];



    // Start Getter Setter
        public function qty(): Attribute{
            return Attribute::make(
                get: fn($value) => (int)$value,
                set: fn($value) => max((int) $value, 0)
            );
        }

        public function status(): Attribute{
            return Attribute::make(
                get: fn($value) => Status::from($value),
                set: fn($value) => $value instanceof Status ? $value->value : strtolower($value)
            );
        }

        public function submissionReason(): Attribute{
            return Attribute::make(
                get: fn($value) => ucwords($value),
                set: fn($value) => strtolower($value),
            );
        }

        public function rejectionReason(): Attribute{
            return Attribute::make(
                get: fn($value) => ucwords($value),
                set: fn($value) => strtolower($value),
            );
        }

        public function approvalDate(): Attribute{
            return Attribute::make(
                get: fn($value) => Carbon::parse($value)->format('Y-m-d'),
                set: fn($value) => Carbon::parse($value)->format('Y-m-d')
            );
        }

    // End Getter Setter


    //relasi user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    //relasi item
    public function itemDetail()
    {
        return $this->belongsTo(ItemDetail::class, 'item_detail_id');
    }

    //relasi submission
    public function submission()
    {
        return $this->belongsTo(Submission::class, 'submission_id');
    }

    public function getRouteKeyName()
    {
        return 'id';
    }





}

