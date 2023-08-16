<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeupItem extends Model{
    use HasFactory;
    protected $fillable = ['name', 'type', 'description', 'price', 'bought'];

    public function toggleBought(){
        $this -> bought = !$this -> bought;
        $this -> save();
    }
}
