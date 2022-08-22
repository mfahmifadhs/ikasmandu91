<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu5Model extends Model
{
    use HasFactory;

    protected $table        = "tbl_sub_menu_5";
    protected $primary_key  = "id_sub_menu_5";
    public $timestamps      = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sub_menu_5',
        'sub_menu_id',
        'sm5_title',
        'sm5_text',
        'sm5_img'
    ];
}
