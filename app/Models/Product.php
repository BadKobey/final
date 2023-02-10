<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Product extends Model
{
    use HasFactory, Searchable;


    public function stock()
        {
            return $this->belongsTo('App\Models\Stock', 'stock_id');
        }

    public function searchableAs()
    {
        return 'products_index';
    }

    }


