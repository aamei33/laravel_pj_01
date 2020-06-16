<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use App\Models\User;
class Status extends Model
{
    //
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $casts=[
        'created_at'=>'datetime:Y-m-d H:i:s',
        'updated_at'=>'datetime:Y-m-d H:i:s',
    ];


}
