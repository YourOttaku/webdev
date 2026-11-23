<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class File extends Model
{
    protected $fillable = ['file_path', 'original_name', 'fileable_id', 'fileable_type'];

    # зворотний поліморфний зв'язок
    public function fileable(): MorphTo
    {
        return $this->morphTo();
    }
}
