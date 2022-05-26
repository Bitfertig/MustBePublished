<?php

namespace Bitfertig\MustBePublished\Models;

use Bitfertig\MustBePublished\Traits\MustBePublished;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mbptest extends Model
{
    use HasFactory, MustBePublished;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

}
