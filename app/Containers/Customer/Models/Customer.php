<?php

namespace App\Containers\Customer\Models;

use App\Containers\Trail\Models\Trail;
use App\Containers\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Armincms\Json\Json;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Customer extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')->singleFile();
        $this->addMediaCollection('logo_large')->singleFile();
        $this->addMediaCollection('logo_small')->singleFile();
        $this->addMediaCollection('cover')->singleFile();
    }

    public function root()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function player_users()
    {
        return $this->hasMany(User::class)->whereHas('roles', fn($q) => $q->where('name', 'player'));
    }

    public function public_users()
    {
        return $this->hasMany(User::class)->whereHas('roles', fn($q) => $q->where('name', 'public'));
    }

    public function active_users()
    {
        return $this->hasMany(User::class)->whereHas('user_progress');
    }

    public function trails()
    {
        return $this->hasMany(Trail::class);
    }

    public function company_style()
    {
        return $this->hasOne(Style::class)->where('type', 'company');
    }
}
