<?php namespace Bantenprov\Anggaran\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * The AnggaranModel class.
 *
 * @package Bantenprov\Anggaran
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AnggaranModel extends Model
{
    /**
    * Table name.
    *
    * @var string
    */
    protected $table = 'anggaran';

    /**
    * The attributes that are mass assignable.
    *
    * @var mixed
    */
    protected $fillable = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
