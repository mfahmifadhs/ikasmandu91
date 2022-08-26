<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MainmenuModel;
use App\Models\Submenu1Model;
use App\Models\Submenu2Model;
use App\Models\Submenu3Model;
use App\Models\Submenu5Model;
use App\Models\GalleryModel;
use App\Models\GalleryDetailModel;
use App\Models\AlumniModel;

use DB;
use Auth;
use Hash;
use Validator;
use Carbon\Carbon;

class AdminController extends Controller
{

	public function index()
    {
        $menu    = MainmenuModel::with(['submenu'])->get();
        $alumnis = DB::table('tbl_alumni')->get();
        $history = DB::table('tbl_sub_menu_1')->first();
        $profile = DB::table('tbl_sub_menu_2')->first();
        return view('v_admin_user.index', compact('menu','alumnis','history','profile'));
    }

    /*===============================================================
                                DAFTAR MENU
    ===============================================================*/

    public function showMenu(Request $request, $idsubmenu)
    {
        $menu   = MainmenuModel::with(['submenu'])->get();
        if ($idsubmenu == 1) {
            // Sejarah SMAN 2 Padang
            return redirect('admin-user/sekolah/sejarah/sman2-padang');

        }elseif ($idsubmenu == 2) {
            // Profil Sekolah SMAN 2 Padang
            return redirect('admin-user/sekolah/profil/sman2-padang');

        }elseif ($idsubmenu == 3) {
            // Berita
            return redirect('admin-user/berita/daftar/semua');

        }elseif ($idsubmenu == 4) {
            // Sambutan Ketua Umum
            return redirect('admin-user/dashboard/#kata-sambutan');

        }elseif ($idsubmenu == 5) {
            // Struktur Organisasi
            return redirect('admin-user/organisasi/kepengurusan/ikasmandu91');

        }elseif ($idsubmenu == 6) {
            // Kepengurusan Organisasi
            return redirect('admin-user/organisasi/kepengurusan/ikasmandu91/#pengurus');

        }elseif ($idsubmenu == 11) {
            // Data Alumni
            return redirect('admin-user/galeri/daftar/semua');

        }elseif ($idsubmenu == 12) {
            // Data Alumni
            return redirect('admin-user/alumni/daftar/semua');

        }else{
            return redirect('admin-user/dashboard');
        }
    }

     /*==============================================================
                                KATA SAMBUTAN
    ===============================================================*/

    public function showOpening(Request $request, $aksi, $id)
    {
        $menu     = MainmenuModel::with(['submenu'])->get();

        if ($aksi == 'ubah') {
            $opening = DB::table('tbl_sub_menu_5')->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_5.alumni_id')->first();
            return view('v_admin_user.kata_sambutan')->with('success','Berhasil mengubah kata sambutan');
        }elseif($aksi == 'detail') {
            return view('v_admin_user.detail_sambutan');
        }

    }

     /*==============================================================
                                BERITA
    ===============================================================*/

    public function showNews(Request $request, $aksi, $id)
    {
        $menu     = MainmenuModel::with(['submenu'])->get();

        if ($aksi == 'daftar' && $id == 'semua') {

            $category = DB::table('tbl_sub_menu_3')
                            ->select('category_name', DB::raw('count(category_id) as totalctg'))
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->where('menu_category', 'news')
                            ->groupBy('category_id', 'category_name')->get();

            $news   = DB::table('tbl_sub_menu_3')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_3.author_id')
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->where('sm3_isdelete', 'false')
                            ->paginate(10);

            return view('v_admin_user.menu_berita', compact('menu','news','category'));

        }elseif ($aksi == 'cari') {


            $category   = DB::table('tbl_sub_menu_3')
                            ->select('category_name', DB::raw('count(category_id) as totalctg'))
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->groupBy('category_id', 'category_name')->get();

            $news       = DB::table('tbl_sub_menu_3')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_3.author_id')
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->where('sm3_isdelete', 'false')
                            ->where('category_name', 'like','%'.$id.'%')
                            ->orWhere('sm3_title', 'like','%'.$request->search.'%')
                            ->paginate(10);

            return view('v_admin_user.menu_berita', compact('menu','news','category'));

        }elseif ($aksi == 'detail') {

            $news        = DB::table('tbl_sub_menu_3')
                            ->join('users','users.alumni_id','tbl_sub_menu_3.author_id')
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','users.alumni_id')
                            ->where('id_sub_menu_3', $id)
                            ->first();

            return view('v_admin_user.detail_berita', compact('news','menu'));

        }elseif ($aksi == 'tambah') {

            $category   = DB::table('tbl_category')->where('menu_category','news')->get();

            return view('v_admin_user.tambah_berita', compact('menu','category'));

        }elseif ($aksi == 'proses-tambah') {

            $submenu3 = new Submenu3Model();
            $submenu3->sub_menu_id  = 3;
            $submenu3->category_id  = $request->input('category_id');
            $submenu3->author_id    = Auth::user()->alumni_id;
            $submenu3->sm3_title    = strtolower($request->input('sm3_title'));
            $submenu3->sm3_text     = strtolower($request->input('text'));
            $submenu3->sm3_time     = Carbon::now();
            $submenu3->sm3_date     = Carbon::now();
            $submenu3->sm3_isdelete = "false";

            if ($request->hasfile('sm3_img')) {
                $file = $request->file('sm3_img');
                $extension = $file->getClientOriginalExtension();
                $sm3_img = time() . '.' . $extension;
                $file->move('images/news/', $sm3_img);
                $submenu3->sm3_img = $sm3_img;
            } else {
                return $request;
                $submenu3->image = '';
            }

            $submenu3->save();
            return redirect('admin-user/berita/daftar/semua')->with('success','Berhasil Membuat Berita Baru');

        }elseif ($aksi == 'ubah') {

            $category       = DB::table('tbl_category')->where('menu_category','news')->get();

            $news           = DB::table('tbl_sub_menu_3')
                                ->join('tbl_sub_menu','tbl_sub_menu.id_sub_menu','tbl_sub_menu_3.sub_menu_id')
                                ->where('id_sub_menu_3', $id)->first();

            $mainname       = DB::table('tbl_sub_menu_3')->select('id_main_menu','main_menu_name')
                                ->join('tbl_sub_menu','tbl_sub_menu.id_sub_menu','tbl_sub_menu_3.sub_menu_id')
                                ->join('tbl_main_menu','tbl_main_menu.id_main_menu','tbl_sub_menu.main_menu_id')
                                ->where('id_sub_menu_3',$id)->first();

            $subname        = DB::table('tbl_sub_menu_3')->select('id_sub_menu','sub_menu_name')
                                ->join('tbl_sub_menu','tbl_sub_menu.id_sub_menu','tbl_sub_menu_3.sub_menu_id')
                                ->where('id_sub_menu_3',$id)->first();

            return view('admin-user.news_edit', compact('id','news','category','mainname','subname'));

        }elseif ($aksi == 'proses-ubah') {

            if ($request->file('new_img') == null) {
                $new_img = $request->get('old_img');
            }else{
                $getnews = DB::table('tbl_sub_menu_3')->where('id_sub_menu_3', $id)->first();

                if ($request->hasfile('new_img')){
                    if($getnews->sm3_img != ''  && $getnews->sm3_img != null){
                        $file_old = public_path().'\images\news\\' . $getnews->sm3_img;
                        unlink($file_old);
                    }

                    $file = $request->file('new_img');
                    $extension = $file->getClientOriginalExtension();
                    $filename = md5(time()).'.'.$extension;
                    $file->move('images/news/', $filename);
                    $getnews->sm3_img=$filename;
                } else {
                    return $request;
                    $getnews->sm3_img='';
                }
                $new_img = $getnews->sm3_img;
            }


            $news    = Submenu3Model::where('id_sub_menu_3', $id)
                            ->update([
                                'sub_menu_id'   => 3,
                                'category_id'   => $request->category_id,
                                'author_id'     => $request->author_id,
                                'sm3_title'     => strtoupper($request->sm3_title),
                                'sm3_text'      => $request->text,
                                'sm3_img'       => $new_img,
                                'sm3_time'      => $request->sm3_time,
                                'sm3_date'      => $request->sm3_date,
                                'sm3_isdelete'  => 'false'
                            ]);


            return redirect('admin-user/berita/detail/'. $id)->with('success','Berhasil Mengubah Berita');

        }elseif ($aksi == 'hapus') {

            $news   = Submenu3Model::where('id_sub_menu_3', $id)
                        ->update([
                            'sm3_isdelete' => 'true'
                        ]);

            return redirect('admin-user/berita/daftar/semua')->with('success','Berhasil Menghapus Berita Ini');

        }elseif ($aksi == 'daftar' && $id == 'arsip') {

            $category   = DB::table('tbl_sub_menu_3')
                            ->select('category_name', DB::raw('count(category_id) as totalctg'))
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->where('menu_category', 'news')
                            ->groupBy('category_id', 'category_name')->get();

            $news       = DB::table('tbl_sub_menu_3')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_3.author_id')
                            ->join('tbl_category','tbl_category.id_category','tbl_sub_menu_3.category_id')
                            ->where('sm3_isdelete', 'true')
                            ->paginate(10);

            return view('v_admin_user.arsip_berita', compact('menu','category','news'));

        }elseif ($aksi == 'restore') {

            if($id == 'all')
            {
                $news = DB::table('tbl_sub_menu_3')->update(array('sm3_isdelete' => 'false'));
            }else{
                $news   = Submenu3Model::where('id_sub_menu_3', $id)
                            ->update([
                                'sm3_isdelete' => 'false'
                            ]);
            }

            return redirect('admin-user/berita/daftar/semua')->with('success','Berhasil Memulihkan Berita');

        }


    }


     /*==============================================================
                          ALUMNI SMAN 2 PADANG
    ===============================================================*/

    public function showAlumni(Request $request, $aksi, $id)
    {
        $menu   = MainmenuModel::with(['submenu'])->get();

        if ($aksi == 'daftar') {

            $alumni = DB::table('tbl_alumni')->orderby('alumni_name','ASC')->get();
            return view('v_admin_user.daftar_alumni', compact('menu','alumni'));

        }elseif($aksi == 'detail') {

            $alumni = DB::table('tbl_alumni')->where('id_alumni', $id)->first();
            return view('v_admin_user.profil_alumni', compact('alumni','menu'));

        }elseif($aksi == 'tambah') {

            return view('v_admin_user.tambah_alumni', compact('menu'));

        }elseif($aksi == 'proses-tambah') {

            $valid_img  = Validator::make($request->all(), [
                'img_alumni'    => 'mimes: jpg,png,jpeg|max:4096',
            ]);
            if ($valid_img->fails()) {
                return redirect('admin-user/alumni/tambah/baru')->with('failed', 'Format foto tidak sesuai, mohon cek kembali');
            }else{

                $alumni = new AlumniModel();
                if ($request->hasfile('img_alumni')){
                    $file = $request->file('img_alumni');
                    $extension = $file->getClientOriginalExtension();
                    $filename = $file->getClientOriginalName();
                    $file->move('images/alumni/', $filename);
                    $alumni->alumni_img = $filename;
                } else {
                    $alumni->alumni_img = null;
                }
                $alumni_img = $alumni->alumni_img;
                $alumni->id_alumni              = $request->input('idalumni');
                $alumni->alumni_name            = strtolower($request->input('name'));
                $alumni->alumni_gender          = strtolower($request->input('gender'));
                $alumni->alumni_phone_number    = $request->input('phone_num');
                $alumni->alumni_email           = strtolower($request->input('email'));
                $alumni->alumni_graduation_year = $request->input('graduation_year');
                $alumni->alumni_class           = strtolower($request->input('class'));
                $alumni->alumni_placeofbirth    = strtolower($request->input('place_birthday'));
                $alumni->alumni_dateofbirth     = $request->input('date_birthday');
                $alumni->alumni_size_clothes    = strtolower($request->input('size_clothes'));
                $alumni->alumni_domicile        = strtolower($request->input('domicile'));
                $alumni->alumni_address         = strtolower($request->input('address'));
                $alumni->alumni_last_edu        = strtolower($request->input('last_edu'));
                $alumni->alumni_univ            = strtolower($request->input('univ'));
                $alumni->alumni_major           = strtolower($request->input('major'));
                $alumni->alumni_job             = strtolower($request->input('job'));
                $alumni->alumni_img             = $alumni_img;
                $alumni->is_approve             = 1;
                $alumni->save();
                return redirect('admin-user/menu/12')->with('success', 'Berhasil menambah data alumni baru');
            }

        }elseif($aksi == 'proses-ubah') {

            $valid_img  = Validator::make($request->all(), [
                'img_alumni'    => 'mimes: jpg,png,jpeg|max:4096',
            ]);

            if ($valid_img->fails()) {
                return redirect('admin-user/alumni/detail/'. $id)->with('failed', 'Format foto tidak sesuai, mohon cek kembali');
            }else{
                if ($request->file('img_alumni') == null) {
                    $alumni_img = $request->get('img_old');
                }else{
                    $getimg = DB::table('tbl_alumni')->where('id_alumni', $id)->first();

                    if ($request->hasfile('img_alumni')){
                        if($getimg->alumni_img != ''  && $getimg->alumni_img != null){
                            $file_old = public_path().'\images\alumni\\' . $getimg->alumni_img;
                            unlink($file_old);
                        }
                        $file = $request->file('img_alumni');
                        $extension = $file->getClientOriginalExtension();
                        $filename = $file->getClientOriginalName();
                        $file->move('images/alumni/', $filename);
                        $getimg->alumni_img = $filename;
                    } else {
                        return $request;
                        $getimg->alumni_img='';
                    }
                    $alumni_img = $getimg->alumni_img;
                }
                AlumniModel::where('id_alumni', $id)
                        ->update([
                            'alumni_name'               => $request->name,
                            'alumni_gender'             => $request->gender,
                            'alumni_phone_number'       => $request->phone_num,
                            'alumni_email'              => $request->email,
                            'alumni_graduation_year'    => $request->graduation_year,
                            'alumni_class'              => $request->class,
                            'alumni_placeofbirth'       => $request->place_birthday,
                            'alumni_dateofbirth'        => $request->date_birthday,
                            'alumni_size_clothes'       => $request->size_clothes,
                            'alumni_domicile'           => $request->domicile,
                            'alumni_address'            => $request->address,
                            'alumni_last_edu'           => $request->last_edu,
                            'alumni_univ'               => $request->univ,
                            'alumni_major'              => $request->major,
                            'alumni_job'                => $request->job,
                            'alumni_img'                => $alumni_img,
                            'is_approve'                => $request->is_approve
                        ]);

                return redirect('admin-user/alumni/detail/'. $id)->with('success', 'Berhasil mengubah informasi alumni');
            }

        }
    }

    /*===============================================================
                            SEJARAH SEKOLAH
    ===============================================================*/

    public function showSchool(Request $request, $aksi, $id)
    {
        $menu   = MainmenuModel::with(['submenu'])->get();
        if ($aksi == 'sejarah') {
            $history = DB::table('tbl_sub_menu_1')->first();
            return view('v_admin_user.menu_sejarah_sekolah', compact('menu','history'));

        }elseif ($aksi == 'profil') {
            $profil = DB::table('tbl_sub_menu_2')->first();
            return view('v_admin_user.menu_profil_sekolah', compact('menu','profil'));

        }elseif($aksi == 'detail-sejarah-sman2-padang') {
            $history = DB::table('tbl_sub_menu_1')->first();
            return view('v_admin_user.detail_sejarah_sekolah', compact('menu','history'));

        }elseif($aksi == 'detail-profil-sman2-padang') {
            $profil = DB::table('tbl_sub_menu_2')->first();
            return view('v_admin_user.detail_profil_sekolah', compact('menu','profil'));

        }elseif($aksi == 'ubah-sejarah-sman2-padang') {

            if ($request->file('new_img') == null) {
                $new_img = $request->get('old_img');
            }else{
                $history = DB::table('tbl_sub_menu_1')->where('id_sub_menu_1', $id)->first();

                if ($request->hasfile('new_img')){
                    if($history->sm1_img != ''  && $history->sm1_img != null){
                        $file_old = public_path().'\images\main\history\\' . $history->sm1_img;
                        unlink($file_old);
                    }

                    $file      = $request->file('new_img');
                    $extension = $file->getClientOriginalExtension();
                    $filename  = md5(time()).'.'.$extension;
                    $file->move('images/main/history/', $filename);
                    $history->new_img    =$filename;
                } else {
                    $history->new_img='';
                }
                $new_img = $history->new_img;
            }

            Submenu1Model::where('id_sub_menu_1', $id)
             ->update([
                'sub_menu_id'   => 1,
                'sm1_text'      => $request->text,
                'sm1_img'       => $new_img
            ]);


            return redirect('admin-user/sekolah/sejarah/sman2-padang')->with('success','Berhasil mengubah informasi sejarah SMAN 2 Padang');

        }elseif($aksi == 'ubah-profil-sman2-padang') {

            if ($request->file('new_img') == null) {
                $new_img = $request->get('old_img');
            }else{
                $profile = DB::table('tbl_sub_menu_2')->where('id_sub_menu_2', $id)->first();

                if ($request->hasfile('new_img')){
                    if($profile->sm2_img != ''  && $profile->sm2_img != null){
                        $file_old = public_path().'\images\main\profile_school\\' . $profile->sm2_img;
                        unlink($file_old);
                    }

                    $file      = $request->file('new_img');
                    $extension = $file->getClientOriginalExtension();
                    $filename  = md5(time()).'.'.$extension;
                    $file->move('images/main/profile_school/', $filename);
                    $profile->new_img    =$filename;
                } else {
                    $profile->new_img='';
                }
                $new_img = $profile->new_img;
            }

            Submenu2Model::where('id_sub_menu_2', $id)
             ->update([
                'sub_menu_id'   => 1,
                'sm2_text'      => $request->text,
                'sm2_img'       => $new_img
            ]);


            return redirect('admin-user/sekolah/profil/sman2-padang')->with('success','Berhasil mengubah informasi profil SMAN 2 Padang');

        }
    }

    /*===============================================================
                             IKASMANDU 91
    ===============================================================*/

    public function showOrganization(Request $request, $aksi, $id)
    {
        $menu   = MainmenuModel::with(['submenu'])->get();
        if ($aksi == 'kepengurusan') {
            $struktur   = DB::table('tbl_sub_menu_5')->first();
            $pengurus   = DB::table('tbl_sub_menu_6')
                            ->join('tbl_alumni','tbl_alumni.id_alumni','tbl_sub_menu_6.alumni_id')
                            ->join('tbl_committee','tbl_committee.id_committee','tbl_sub_menu_6.committee_id')
                            ->get();

            return view('v_admin_user.menu_kepengurusan', compact('menu','struktur','pengurus'));

        }elseif($aksi == 'detail-struktur-kepengurusan') {
            $struktur = DB::table('tbl_sub_menu_5')->first();
            return view('v_admin_user.detail_organisasi_struktur', compact('menu','struktur'));

        }elseif($aksi == 'detail-kepengurusan') {
            $structure = DB::table('tbl_sub_menu_6')->first();
            return view('v_admin_user.detail_organisasi_kepengurusan', compact('menu','structure'));

        }elseif($aksi == 'ubah-struktur-kepengurusan') {

            if ($request->file('new_img') == null) {
                $new_img = $request->get('old_img');
            }else{
                $structure = DB::table('tbl_sub_menu_5')->where('id_sub_menu_5', $id)->first();

                if ($request->hasfile('new_img')){
                    if($structure->sm5_img != ''  && $structure->sm5_img != null){
                        $file_old = public_path().'\images\main\structure\\' . $structure->sm5_img;
                        unlink($file_old);
                    }

                    $file      = $request->file('new_img');
                    $extension = $file->getClientOriginalExtension();
                    $filename  = md5(time()).'.'.$extension;
                    $file->move('images/main/structure/', $filename);
                    $structure->new_img    =$filename;
                } else {
                    $structure->new_img='';
                }
                $new_img = $structure->new_img;
            }

            $dom = new \DomDocument();
            $dom->loadHtml($request->text, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img');
            foreach($images as $k => $img){
               $data                = $img->getAttribute('src');
               list($type, $data)   = explode(';', $data);
               list(, $data)        = explode(',', $data);
               $data                = base64_decode($data);
               $image_name          = "/upload/" . time().$k.'.png';
               $path                = public_path() . $image_name;
               file_put_contents($path, $data);
               $img->removeAttribute('src');
               $img->setAttribute('src', $image_name);
            }

            $text = $dom->saveHTML();

            Submenu5Model::where('id_sub_menu_5', $id)
             ->update([
                'sub_menu_id'   => 1,
                'sm5_text'      => $text,
                'sm5_img'       => $new_img
            ]);

            return redirect('admin-user/organisasi/struktur/ikasmandu91')->with('success','Berhasil memperbarui struktur kepengurusan');

        }
    }

    /*===============================================================
                             GALLERY
    ===============================================================*/
    public function showGallery(Request $request, $aksi, $id)
    {
        $menu   = MainmenuModel::with(['submenu'])->get();
        if ($aksi == 'daftar') {
            $category = DB::table('tbl_category')->where('menu_category','gallery')->get();
            $galeri   = GalleryModel::with('gallerydetail')->get();
            return view('v_admin_user.menu_galeri', compact('menu','category','galeri'));

        }elseif($aksi == 'detail'){
            $galeri   = GalleryModel::with('gallerydetail')->where('id_gallery', $id)->get();
            return view('v_admin_user.detail_galeri', compact('menu','galeri'));

        }elseif($aksi == 'tambah') {
            $category = DB::table('tbl_category')->where('menu_category','gallery')->get();
            return view('v_admin_user.tambah_galeri', compact('menu','category'));

        }elseif($aksi == 'proses-tambah') {

            $gallery = new GalleryModel();
            $gallery->id_gallery        = $request->id_gallery;
            $gallery->category_id       = $request->category_id;
            $gallery->author_id         = Auth::user()->alumni_id;
            $gallery->gallery_title     = strtolower($request->gallery_title);
            $gallery->gallery_text      = strtolower($request->gallery_text);
            $gallery->gallery_time      = Carbon::now();
            $gallery->gallery_date      = Carbon::now();
            $gallery->gallery_isdelete  = "false";
            $gallery->save();

            $img = $request->gallery_img;
            foreach($img as $i => $image)
            {
                $detail = new GalleryDetailModel();
                $detail->gallery_id = $request->id_gallery;
                if ($request->hasfile('gallery_img')) {
                    $filename   = $image->getClientOriginalName();
                    $image->move('images/main/gallery/', $filename);
                    $detail->image = $filename;
                } else {
                    $detail->image = null;
                }
                $detail->save();
            }

            return redirect('admin-user/galeri/daftar/semua')->with('success','Berhasil Menambahkan Gambar Baru');

        }
    }

}
