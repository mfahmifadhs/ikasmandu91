<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryDetailModel extends Model
{
    use HasFactory;

    protected $table        = 'tbl_gallery_detail';
    protected $primary_key  = 'id_detail_gallery';
    public $timestamps      = false;

    protected $fillable = ['gallery_id','image'];
}
