<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
 protected $fillable = ['module_id', 'title', 'type', 'content', 'video_link'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
