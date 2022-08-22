<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu4Model extends Model
{
    use HasFactory;

    protected $table 		= "tbl_sub_menu_4";
    protected $primary_key 	= "id_sub_menu_4";
    public $timestamps 		= false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sub_menu_4',
        'sub_menu_id',
        'alumni_id',
        'sm4_text',
        'sm4_img'
    ];
}
