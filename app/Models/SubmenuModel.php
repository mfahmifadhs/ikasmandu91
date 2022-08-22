<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmenuModel extends Model
{
    use HasFactory;

    protected $table = "tbl_sub_menu";
    protected $primary_key = "id_sub_menu";
    public $timestamps = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sub_menu',
        'main_menu_id',
        'sub_menu_name'
    ];
}
