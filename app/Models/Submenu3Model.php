<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Sub Menu Berita SMAN 2 Padang
class Submenu3Model extends Model
{
    use HasFactory;

    protected $table       = "tbl_sub_menu_3";
    protected $primary_key = "id_sub_menu_3";
    public $timestamps     = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sub_menu_3',
        'sub_menu_id',
        'category_id',
        'author_id',
        'sm3_title',
        'sm3_text',
        'sm3_img',
        'sm3_time',
        'sm3_date',
        'sm3_isdelete'
    ];
}

