<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'type', 'descriptions', 'price', 'slug', 'quantity'];
    protected $hidden = [];

    /*
    public function galleries(){
        return $this->hasmany(ProductGallery::class,'product_id');
        
    }
    */
}
