<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniModel extends Model
{
    use HasFactory;

    protected $table = "tbl_alumni";
    protected $primary_key = "id_alumni";
    public $timestamps = false;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_alumni',
        'alumni_name',
        'alumni_gender',
        'alumni_phone_number',
        'alumni_email',
        'alumni_graduation_year',
        'alumni_class',
        'alumni_placeofbirth',
        'alumni_dateofbirth',
        'alumni_size_clothes',
        'alumni_address',
        'alumni_last_edu',
        'alumni_univ',
        'alumni_major',
        'alumni_job',
        'alumni_img',
        'is_approve'
    ];
}
