<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Http\Resources\CategoryResource;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id'];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    protected function description(): Attribute
    {
        return Attribute::make(
            get: fn($value) => json_decode($value, true),
            set: fn($value) => json_encode($value)
        );
    }

    static public function categories() {
        $resource = CategoryResource::collection(self::select()->orderBy('title')->get())->resolve();
        // $data = json_encode($resource);
        // return json_decode($data, true);
        return $resource;
    }
}
