<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Submission extends Model
{

    use SoftDeletes, HasFactory;
    //

    protected $table = 'submissions';

    protected $fillable = [

        'submission_number',
        'submission_date',

    ];

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

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getRouteKeyName()
    {
        return 'submission_number';
    }

    // Start Getter Setter

    public function submissionDate(): Attribute{
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->format('Y-m-d H:i:s'),
            set: fn($value) => Carbon::parse($value)->format('Y-m-d')
        );
    }

    public function id(): Attribute{
        return Attribute::make(
            get: fn($value) => strtoupper($value)
        );
    }

    public function submissionNumber(): Attribute{
        return Attribute::make(
            get: fn($value) => strtoupper($value),
            set: fn($value) => strtoupper($value)
        );
    }

    // End Getter Setter



    // Relasi dengan SubmissionDetail
    public function submissionDetails()
    {
        return $this->hasMany(SubmissionDetail::class, 'submission_id');
    }



}
