<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    //
    protected $fillable = ['title','subject','body'];

    public function files(){
        return $this->morphMany('App\File','file');
    }

    public function investors(){
        return $this->belongsToMany('App\UserInvestor','mail_recipients');
    }

    public function mail_recipients(){
        return $this->hasMany('App\MailRecipient');
    }
}
