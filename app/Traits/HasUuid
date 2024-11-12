<?php

namespace App\Traits;

trait HasUuid
{


    public function getRouteKeyName()
    {
        return 'uuid';
    }
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = (string) str()->uuid();
        });
    }

    public $keyType = 'string';
}
