<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'status', 'img', 'category_id'];

    protected $casts = [
        'status' => 'boolean',
        'properties' => 'array'
    ];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function title(): Attribute{
        return Attribute::make(
            get: fn($value, $attributes) => $attributes['name']. " #".$attributes['id'] ,
            set: fn($value) => strtoupper($value)
        );
    }



    //page_price pagePrice
    public function getPagePriceAttribute(){
        return $this->attributes['price'] / 100;
    }


    public function setPriceAttribute($value){
        $this->attributes['price'] = $value * 100;
    }

    public function getCreatedDateAttribute(){
        return Carbon::parse($this->attributes['created_at'])
            ->timezone('Europe/London')
            ->timestamp;
    }

    public function scopeActive($query){
        $query->where('status', 1);
    }

    public function scopeFilter($query, array $categories = []){

        if ($categories){
            $query->whereIn('category_id', $categories);
        }
    }
}
