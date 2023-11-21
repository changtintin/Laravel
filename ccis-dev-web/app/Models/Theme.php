<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model {
    use HasFactory;
    
    // https://blog.ghanshyamdigital.com/building-a-self-referencing-model-in-laravel-a-step-by-step-guide
    public function parent(): BelongsTo {
        return $this -> belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany {
        return $this -> hasMany(self::class, 'parent_id');
    }

    // Get all parents
    public function parentRecursive(): BelongsTo {
        return $this -> parent() -> with('parentRecursive');
    }

    // Get all children
    public function childrenRecursive(): HasMany {
        return $this->children()->with('childrenRecursive');
    }
}
