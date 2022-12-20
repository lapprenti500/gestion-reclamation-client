<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\FlareClient\Api;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'status'
    ];

    public function user(){
        return $this->belongsTo('App\Models\Users', 'creator_id');
    }

    /**get user who has accepted this task */
    public function taskAcceptedBy(){
        return $this->belongsTo('App\Models\Users', 'accepted_by'); 
    }





}
