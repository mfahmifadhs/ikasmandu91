<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GalleryDetailModel;

class GalleryModel extends Model {
    protected $table        = 'tbl_gallery';
    protected $primaryKey   = 'id_gallery';
    public $timestamps      = false;

    protected $fillable     = ['category_id','author_id','gallery_title','gallery_text','gallery_time','gallery_date','gallery_isdelete'];

    public function gallerydetail() {
        return $this->hasMany(GalleryDetailModel::class, 'gallery_id');
    }
}


