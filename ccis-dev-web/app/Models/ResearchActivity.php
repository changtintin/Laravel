<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class ResearchActivity extends Model{
    use HasFactory;
    protected $visible = [
        'title',
        'date',
        'type_id',
    ];

    public function type(): BelongsTo{
        return $this -> belongsTo(ResearchType::class,'type_id');
    }
}
