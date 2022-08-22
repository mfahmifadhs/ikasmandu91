<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;

    protected $table        = "tbl_gallery";
    protected $primary_key  = "id_gallery";
    public $timestamps      = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_gallery',
        'category_id',
        'author_id',
        'gallery_title',
        'gallery_text',
        'gallery_img',
        'gallery_time',
        'gallery_date',
        'gallery_isdelete'
    ];
}
