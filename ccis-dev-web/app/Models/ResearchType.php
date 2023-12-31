<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ResearchType extends Model{
    use HasFactory;
    public function research_activities(): HasMany{
        return $this -> hasMany(ResearchActivity::class, 'type_id', 'id');
    }
}
