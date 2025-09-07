<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Our_Provider extends Model
{
    /** @use HasFactory<\Database\Factories\OurProviderFactory> */
    use HasFactory;
        protected $fillable = ['user_id', 'price','phone', 'service_id', 'description'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function service()
    {
        return $this->belongsTo(our_service::class);
    }
}
