<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];

}
