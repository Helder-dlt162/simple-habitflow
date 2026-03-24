<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    public function logs() {
        return $this->hasMany(HabitLog::class);
    }
}
