<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function firm()
    {
      return $this->belongsTo(Firm::class);
    }
}
