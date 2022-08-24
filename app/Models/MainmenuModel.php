<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainmenuModel extends Model {
    protected $table = 'tbl_main_menu';
    protected $primaryKey = 'id_main_menu';
    protected $fillable = ['main_menu_name'];

    public function submenu() {
        return $this->hasMany(SubmenuModel::class, 'main_menu_id');
    }
}

class SubmenuModel extends Model {
    protected $table = 'tbl_sub_menu';
    protected $primaryKey = 'id_sub_menu';
    protected $fillable = ['main_menu_id', 'sub_menu_name', ];

    public function category() {
        return $this->belongsTo(Mainmenu::class, 'main_menu_id');
    }
}
