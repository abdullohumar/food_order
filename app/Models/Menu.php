<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $fillable = ['name', 'price', 'description', 'image', 'category', 'slug'];

    protected static function booted()
    {
        static::creating(function ($menu) {
            $menu->slug = Str::slug($menu->name);

            // do {
            //     $randomNumber = random_int(100000, 999999);
            // } while (self::where('menu_id', $randomNumber)->exists());

            // $menu->menu_id = $randomNumber;
        });
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
