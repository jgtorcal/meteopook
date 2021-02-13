<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
    use HasFactory;
    protected $fillable = ['update_id', 'message_id', 'from_id', 'from_username', 'chat_id', 'text'];
}
