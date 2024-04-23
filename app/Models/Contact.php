<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'company',
        'photo',
        'notes'
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('auth_user', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }

    /**
     * The "boot" method of the model.
     */
    protected static function boot(): void
    {
        parent::boot();
        static::creating(function(Contact $model){
            $model->user_id = auth()->id();
        });

        static::deleted(function(Contact $model){
            Storage::delete($model->getRawOriginal('photo'));
        });
    }

    function scopeAuth(Builder $query) {
        return $query->where('user_id', auth()->id());
    }

    function address() {
        return $this->hasMany(Address::class);
    }

    function details() {
        return $this->hasMany(ContactDetail::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    function getPhotoAttribute() {
        return $this->original['photo'] ?
            Storage::url($this->original['photo']) :
            "https://ui-avatars.com/api/?name=$this->name";
    }

    function getHomeAddressAttribute() {
        return $this->address->where('type', 'home')->first();
    }

    function getEmailAttribute() {
        return $this->details->where('type', 'email')->value('data');
    }

    function getNumberAttribute() {
        return $this->details->where('type', 'mobile')->value('data');
    }
}
