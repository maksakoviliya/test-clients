<?php

namespace App\Models;

use App\Filters\ClientsFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [
        'id', 'created_at'
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function scopeFilter(Builder $builder, Request $request)
    {
        return (new ClientsFilter($request))->filter($builder);
    }
}
