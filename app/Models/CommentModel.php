<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;

    protected $table        = "tbl_comments";
    protected $primary_key  = "id_comment";
    public $timestamps      = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_comment',
        'news_id',
        'gallery_id',
        'alumni_id',
        'comment',
        'comment_date'
    ];
}
