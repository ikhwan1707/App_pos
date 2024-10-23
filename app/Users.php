<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payments;
use App\Transactions;

class Users extends Model
{
    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function payment()
    {
        return $this->hasMany(Payments::class, 'user_id', 'user_id');
    }

    public function transaction()
    {
        return $this->hasMany(Transactions::class, 'user_id', 'user_id');
    }
}
