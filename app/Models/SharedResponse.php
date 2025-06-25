<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharedResponse extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'shared_responses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'prompt',
        'uman_response',
        'gpt_response',
        'gemini_response',
        'claude_response',
        'grok_response',
        'deepseek_response',
        'meta_response',
        'created_at_utc'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at_utc' => 'datetime'
    ];
} 