<?php

namespace Mobilemoney\src;

use Illuminate\Database\Eloquent\Model;

class MobileMoney extends Model
{
    protected $table = "rechargement_mobile_money";
    protected $fillable = [
                            'id',
                            'user_id',
                            'compte',
                            'amount',
                            'phone_number',
                            'mobile_money_type',
                            'reference_id',
                            'responseCode',
                            'responseMessage'
                         ];


}
