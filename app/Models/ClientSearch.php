<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class ClientSearch extends Model
{
    use HasFactory, Searchable;


    public function searchableAs()
    {
        return 'client_index';
    }

    }


