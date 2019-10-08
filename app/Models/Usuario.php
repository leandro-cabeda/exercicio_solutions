<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Usuario extends Model
{
    use Notifiable;

	protected $fillable=[
	        "nome","email","senha","foto"
	    ];

}
