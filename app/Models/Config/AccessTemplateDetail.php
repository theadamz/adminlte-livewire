<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AccessTemplateDetail extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['created_by', 'updated_by'];

    protected $casts = [
        'is_allowed' => 'bool',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (AccessTemplateDetail $model) {
            $model->created_by = Auth::id();
        });

        static::updating(function (AccessTemplateDetail $model) {
            $model->updated_by = Auth::id();
        });
    }
}
