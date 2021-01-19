<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailCampaign extends Model
{
    //
    protected $fillable = ['title','run_at','sent'];
    public function templates(){
        return $this->belongsToMany('App\MailTemplate','campaignable_templates');
    }

    public function recipient_investors(){
        return $this->belongsToMany('App\UserInvestor','mail_recipients');
    }

    public function recipient_emails(){
        return $this->hasMany('App\MailRecipient');
    }
}
