<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'reports';
    protected $fillable = [
        'id_answer', 'id_user', 'detail', 'response', 'verifikasi','created_at'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
