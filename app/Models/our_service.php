<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class our_service extends Model
{
    /** @use HasFactory<\Database\Factories\OurServiceFactory> */
    use HasFactory;
    protected $fillable = ['name', 'description', 'image'];

    public function providers()
    {
        return $this->hasMany(our_provider::class);
    }

}
