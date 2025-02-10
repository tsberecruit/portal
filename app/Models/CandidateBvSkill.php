<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateBvSkill extends Model
{
    use HasFactory;
    function bvskill() : BelongsTo {
        return $this->belongsTo(bvskill::class, 'bv_skill_id', 'id');
    }
}
