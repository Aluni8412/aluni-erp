<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
    protected $table = 'benutzer';
    protected $fillable = ['name', 'email', 'passwort', 'kunde_id'];
}
