<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use Laravel\Scout\Searchable;


class Contact extends Model
{
    use Searchable;
    protected $guarded=[];

    protected $dates=['birthday'];

    public function path(){
        return '/contacts/' . $this->id;
    }

    public function scopebirthdays($query){
        return $query->whereRaw('birthday LIKE "%-'.now()->format('m').'-%"',);
    }

    public function setBirthdayAttribute($birthday){
        $this->attributes['birthday'] = Carbon::parse($birthday);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
