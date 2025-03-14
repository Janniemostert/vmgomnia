<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use Searchable;
    use HasFactory;
    
    // Disable Laravel's timestamps since we're using our own date fields
    public $timestamps = false;
    
    // Allow mass assignment for all fields
    protected $guarded = [];

    public function toSearchableArray(){
        return [
            'make' => $this->make,
            'model' => $this->model
        ];
    }
}