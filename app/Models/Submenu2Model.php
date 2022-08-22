<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu2Model extends Model
{
    use HasFactory;

    protected $table = "tbl_sub_menu_2";
    protected $primary_key = "id_sub_menu_2";
    public $timestamps = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sub_menu_2',
        'sub_menu_id',
        'sm2_text',
        'sm2_img'
    ];
}