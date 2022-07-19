<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{
    use HasFactory, Searchable;
    
    //we define the fillable attributes of the model
    protected $fillable = [
        'name',
        'description',
        'image',
        'quantity',
    ];

    /**
     * The `toSearchableArray()` function returns an array of the fields you want to be searchable
     * 
     * @return The name and description of the product.
     */
    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}
