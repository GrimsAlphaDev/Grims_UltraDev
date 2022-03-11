<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = ['jurusan','slug'];

    public function mahasiswas(){
        return $this->hasMany(Mahasiswa::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'jurusan'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
