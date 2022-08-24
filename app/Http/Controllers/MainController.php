<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentModel;
use App\Models\MainmenuModel;
use App\Models\SubmenuModel;
use App\Models\Submenu1Model;
use App\Models\Submenu2Model;
use App\Models\Submenu3Model;
use App\Models\Submenu4Model;
use App\Models\Submenu5Model;
use App\Models\Submenu6Model;
use App\Models\CategoryModel;
use App\Models\RulesModel;
use App\Models\User;
use App\Models\GalleryModel;
use App\Models\GalleryDetailModel;
use App\Models\AlumniModel;

use DB;
use Auth;
use Hash;
use Session;
use Validator;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        // =================== MENU =======================
            $mainmenu  = DB::table('tbl_main_menu')->get();
            $submenu   = DB::table('tbl_sub_menu')->get();
        // ================================================

        $news       = DB::table('tbl_sub_menu_3')->limit(6)->get();
        $opening    = DB::table('tbl_sub_menu_4')->get();
        $response   = DB::table('tbl_response')
                        ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_response.alumni_id')
                        ->orderby('id_response','DESC')->limit(6)->get();

        if (Auth::user() == null) {
            return view('v_main.index', compact('mainmenu','submenu','news','opening','response'));
        }else{
            return view('v_main.index', compact('mainmenu','submenu','news','opening','response'));
        }

    }

    /*===============================================================
                                ALUMNI
    ===============================================================*/

    public function showAlumni(Request $request, $aksi, $id)
    {
        // =================== MENU =======================
            $mainmenu  = DB::table('tbl_main_menu')->get();
            $submenu   = DB::table('tbl_sub_menu')->get();
        // ================================================

        if ($aksi == 'profil') {

            $user = DB::table('users')
                        ->join('tbl_alumni','tbl_alumni.id_alumni','users.alumni_id')
                        ->where('alumni_id', Auth::user()->alumni_id)->first();
            return view('v_main.profil_user', compact('mainmenu','submenu','user'));

        }elseif($aksi == 'ubah') {
            $cekImg     = Validator::make($request->all(), [
                'alumni_img' => 'mimes: jpg,png,jpeg|max:4096',
            ]);

            $cekUser    = Validator::make($request->all(), [
                'username'   => 'unique:users'
            ]);

            if ($cekImg->fails()) {
                return redirect('main/alumni/profil/'. $id)->with('failed', 'Format foto tidak sesuai');
            }elseif ($cekUser->fails()) {
                return redirect('main/alumni/profil/'. $id)->with('failed', 'Gagal mengubah username, Username sudah terdaftar');
            }else{

                if ($request->file('alumni_img') == null) {
                    $alumni_img = $request->get('old_img');
                }else{
                    $profile = DB::table('tbl_alumni')->where('id_alumni', $id)->first();

                    if ($request->hasfile('alumni_img')){
                        if($profile->alumni_img != ''  && $profile->alumni_img != null){
                            $file_old = public_path().'\images\alumni\\' . $profile->alumni_img;
                            unlink($file_old);
                        }

                        $file      = $request->file('alumni_img');
                        $extension = $file->getClientOriginalExtension();
                        $filename  = $file->getClientOriginalName();
                        $file->move('images/alumni/', $filename);
                        $profile->alumni_img    =$filename;
                    } else {
                        return $request;
                        $profile->alumni_img='';
                    }
                    $alumni_img = $profile->alumni_img;
                }


                AlumniModel::where('id_alumni', $id)
                ->update([
                    'alumni_name'           => $request->alumni_name,
                    'alumni_gender'         => $request->alumni_gender,
                    'alumni_phone_number'   => $request->alumni_phone_number,
                    'alumni_email'          => $request->alumni_email,
                    'alumni_graduation_year'=> $request->alumni_graduation_year,
                    'alumni_class'          => $request->alumni_class,
                    'alumni_placeofbirth'   => $request->alumni_placeofbirth,
                    'alumni_dateofbirth'    => $request->alumni_dateofbirth,
                    'alumni_size_clothes'   => $request->alumni_size_clothes,
                    'alumni_domicile'       => $request->alumni_domicile,
                    'alumni_address'        => $request->alumni_address,
                    'alumni_last_edu'       => $request->alumni_last_edu,
                    'alumni_univ'           => $request->alumni_univ,
                    'alumni_major'          => $request->alumni_major,
                    'alumni_job'            => $request->alumni_job,
                    'alumni_img'            => $alumni_img,
                    'is_approve'            => 1
                ]);

                if ($request->username == null) {
                    $username = $request->old_username;
                }else{
                    $username = $request->username;
                }

                User::where('alumni_id', $id)
                ->update([
                    'username'  => $request->username
                ]);

                 return redirect('main/alumni/profil/'. $id)->with('success', 'Berhasil memperbarui informasi');

            }

        }elseif($aksi == 'ganti-password') {
            return view('v_main.ganti_password', compact('mainmenu','submenu','id'));

        }elseif($aksi == 'proses-ganti-password'){
            $cekpass = DB::table('users')->where('id', $id)->first();
            if(\Hash::check($request->old_pass, $cekpass->password)){
                User::where('id', $id)
                    ->update([
                        'password' => Hash::make($request->new_pass)
                    ]);


                Session::flush();
                Auth::logout();
                return redirect('login')->with('success', 'Berhasil mengubah password');
            }else{
                return redirect('main/alumni/ganti-password/'. $id)->with('failed', 'Password lama anda salah');
            }

        }elseif($aksi == 'daftar') {
            $alumnis = DB::table('tbl_alumni')->orderby('alumni_name','ASC')->paginate(9);
            return view('v_main.daftar_alumni', compact('mainmenu','submenu','alumnis'));

        }elseif($aksi == 'cari') {
            if ($request->id_alumni == '') {
                $alumnis     = DB::table('tbl_alumni')->paginate(9);
            }else{
                $alumnis     = DB::table('tbl_alumni')->where('id_alumni', $request->id_alumni)->paginate(9);
            }

            return view('v_main.daftar_alumni', compact('mainmenu','submenu','alumnis'));

        }elseif($aksi == 'tambah'){
            $rules  = DB::table('tbl_rules')->where('menu_id', 5)->get();
            return view('v_main.tambah_alumni', compact('mainmenu','submenu','rules'));

        }elseif($aksi == 'proses-tambah'){
            $validator  = Validator::make($request->all(), [
                'alumni_img'    => 'mimes:png,jpg,jpeg |max:4096',
            ]);

            if ($validator->fails()) {
               return redirect('main/alumni/tambah/baru')->with('failed','Format foto tidak sesuai, mohon periksa kembali');
            } else {
                $alumni = new AlumniModel();
                $alumni->alumni_name            = $request->input('alumni_name');
                $alumni->alumni_gender          = $request->input('alumni_gender');
                $alumni->alumni_phone_number    = $request->input('alumni_phone_number');
                $alumni->alumni_email           = $request->input('alumni_email');
                $alumni->alumni_graduation_year = $request->input('alumni_graduation_year');
                $alumni->alumni_class           = $request->input('alumni_class');
                $alumni->alumni_placeofbirth    = $request->input('alumni_placeofbirth');
                $alumni->alumni_dateofbirth     = $request->input('alumni_dateofbirth');
                $alumni->alumni_size_clothes    = $request->input('alumni_size_clothes');
                $alumni->alumni_address         = $request->input('alumni_address');
                $alumni->alumni_last_edu        = $request->input('alumni_last_edu');
                $alumni->alumni_univ            = $request->input('alumni_univ');
                $alumni->alumni_major           = $request->input('alumni_major');
                $alumni->alumni_job             = $request->input('alumni_job');
                $alumni->is_approve             = 0;

                if ($request->hasfile('alumni_img')) {
                    $file = $request->file('img_alumni');
                    $extension = $file->getClientOriginalExtension();
                    $filename = $file->getClientOriginalName();
                    $file->move('images/alumni/', $filename);
                    $alumni->alumni_img = $filename;
                } else {
                    $alumni->image = null;
                }

                $alumni->save();
                return redirect('main/alumni/tambah/baru')->with('success','Berhasil melakukan registrasi !');
            }

        }
    }

    /*===============================================================
                            MENU
    ===============================================================*/

    public function showMenu($id)
    {
        if($id == 1){
            return redirect('main/sekolah/sejarah/sman2-padang');

        }elseif($id == 2){
            return redirect('main/sekolah/profil/sman2-padang');

        }elseif($id == 3){
            return redirect('main/berita/daftar/semua');

        }elseif($id == 4){
            return redirect('/#kata-sambutan');

        }elseif($id == 5){
            // Struktur Organisasi
            return redirect('main/organisasi/kepengurusan/ikasmandu91');

        }elseif($id == 6){
            // Pengurus
            return redirect('main/organisasi/kepengurusan/ikasmandu91#pengurus');

        }elseif ($id == 11) {
            // Data Alumni
            return redirect('main/galeri/daftar/semua')->with('success','Berhasil menambah data gambar baru!');

        }elseif ($id == 12) {
            // Data Alumni
            return redirect('main/alumni/daftar/semua')->with('success','Berhasil menambah data alumni baru!');

        }else{
            return redirect('main/dashboard');
        }

    }


    /*===============================================================
                            SEJARAH SEKOLAH
    ===============================================================*/

    public function showSchool(Request $request, $aksi, $id)
    {
        // =================== MENU =======================
            $mainmenu  = DB::table('tbl_main_menu')->get();
            $submenu   = DB::table('tbl_sub_menu')->get();
        // ================================================

        if ($aksi == 'sejarah') {
            $history = DB::table('tbl_sub_menu_1')->first();
            return view('v_main.menu_sejarah_sekolah', compact('mainmenu','submenu','history'));

        }elseif ($aksi == 'profil') {
            $profil = DB::table('tbl_sub_menu_2')->first();
            return view('v_main.menu_profil_sekolah', compact('mainmenu','submenu','profil'));
        }
    }

    /*===============================================================
                                BERITA
    ===============================================================*/

    public function showNews(Request $request, $aksi, $id)
    {
        // =================== MENU =======================
            $mainmenu  = DB::table('tbl_main_menu')->get();
            $submenu   = DB::table('tbl_sub_menu')->get();
        // ================================================

        $recent     = DB::table('tbl_sub_menu_3')
                        ->orderby('sm3_date', 'DESC')->limit(3)->get();
        $category   = DB::table('tbl_sub_menu_3')
                        ->select('category_name', DB::raw('count(category_id) as totalctg'))
                        ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                        ->where('menu_category', 'news')
                        ->groupBy('category_id', 'category_name')->get();

        if ($aksi == 'daftar' && $id == 'semua') {
            $news       = DB::table('tbl_sub_menu_3')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_3.author_id')
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->where('sm3_isdelete', 'false')
                            ->orderby('sm3_date','DESC')
                            ->paginate(10);

            return view('v_main.menu_berita', compact('mainmenu','submenu','recent','news','category'));

        }elseif ($aksi == 'cari') {
            $news       = DB::table('tbl_sub_menu_3')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_3.author_id')
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->where('sm3_isdelete', 'false')
                            ->where('category_name', 'like','%'.$id.'%')
                            ->orWhere('sm3_title', 'like','%'.$request->search.'%')
                            ->orderby('sm3_date','DESC')
                            ->paginate(10);

            return view('v_main.menu_berita', compact('mainmenu','submenu','recent','news','category'));

        }elseif($aksi == 'detail') {
            $comments   = DB::table('tbl_comments')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_comments.alumni_id')
                            ->where('news_id', $id)
                            ->get();
            $news       = DB::table('tbl_sub_menu_3')
                            ->join('users','users.alumni_id','tbl_sub_menu_3.author_id')
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                             ->join('tbl_alumni','tbl_alumni.id_alumni','users.alumni_id')
                            ->where('id_sub_menu_3', $id)
                            ->first();

            return view('v_main.detail_berita', compact('mainmenu','submenu','news','comments','recent','category'));

        }elseif($aksi == 'komentar') {
            $comment                = new CommentModel();
            $comment->news_id       = $request->input('id_news');
            $comment->alumni_id     = Auth::user()->alumni_id;
            $comment->comment       = $request->input('comment');
            $comment->comment_date  = Carbon::now();
            $comment->save();

            return redirect('main/berita/detail/'. $request->id_news)->with('Berhasil menambahkan komentar');

        }

    }

    /*===============================================================
                       KEPENGURUSAN ORGANISASI
    ===============================================================*/

    public function showOrganization(Request $request, $aksi, $id)
    {
        // =================== MENU =======================
            $mainmenu  = DB::table('tbl_main_menu')->get();
            $submenu   = DB::table('tbl_sub_menu')->get();
        // ================================================

        if ($aksi == 'kepengurusan') {
            $struktur   = DB::table('tbl_sub_menu_5')->first();
            $pengurus   = DB::table('tbl_sub_menu_6')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_6.alumni_id')
                            ->join('tbl_committee','tbl_committee.id_committee','tbl_sub_menu_6.committee_id')
                            ->get();

            return view('v_main.menu_kepengurusan', compact('mainmenu','submenu','struktur','pengurus'));

        }elseif($aksi == 'pengurus') {

        }
    }

    /*===============================================================
                       KEPENGURUSAN ORGANISASI
    ===============================================================*/

    public function showGallery(Request $request, $aksi, $id)
    {
        // =================== MENU =======================
            $mainmenu  = DB::table('tbl_main_menu')->get();
            $submenu   = DB::table('tbl_sub_menu')->get();
        // ================================================

        if ($aksi == 'daftar') {
            $category = DB::table('tbl_category')->where('menu_category','gallery')->get();
            $galeri   = GalleryModel::with('gallerydetail')->get();
            return view('v_main.menu_galeri', compact('mainmenu','submenu','category','galeri'));

        }
    }


    /*===============================================================
                               SELECT 2
    ===============================================================*/

    public function select2Alumni(Request $request)
    {
        $search = $request->search;

            if($search == ''){
                $alumni  = DB::table('tbl_alumni')
                            ->orderby('alumni_name','asc')
                            ->where('is_approve', 1)
                            ->limit(10)
                            ->get();
            }else{
                $alumni  = DB::table('tbl_alumni')
                            ->orderby('alumni_name','asc')
                            ->where('alumni_name', 'like', '%' .$search . '%')
                            ->where('is_approve', 1)
                            ->get();
            }

            $response = array();
            foreach($alumni as $data){
                $response[] = array(
                    "id"    =>  $data->id_alumni,
                    "text"  =>  $data->alumni_name
                );
            }

            return response()->json($response);
    }

}
