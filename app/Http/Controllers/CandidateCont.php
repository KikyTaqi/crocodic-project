<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\candidate;
use App\Models\job;
use App\Models\activity;
use App\Models\job_exp;
use App\Models\edu_exp;
use App\Models\org_exp;
use App\Models\notes;
use App\Models\bahasa;
use App\Models\User;
use DateTime;

class CandidateCont extends Controller
{
    public function candidate(){
        $candidates = candidate::paginate(15);
        $jobs = job::get();
        return view('candidate.candidate', ['candidates' => $candidates,'jobs' => $jobs]);
    }
    
    public function delete(Request $req){
        $ids = $req->input('ids');
        
        if (!empty($ids)) {
            $delete = candidate::whereIn('id_candidate', $ids)->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function candidateDetail(Request $req){
        $candidates = candidate::get();
        $jobs = job::get();
        return view('candidate.detail_candidates', ['candidates' => $candidates,'jobs' => $jobs]);
    }

    public function candidateDetailView(){
        $user = null;
        if(Auth()->user()){
            $user = Auth()->user();
        }
        $candidates = candidate::get();
        $first = candidate::orderBy('id_candidate', 'asc')->limit(1)->get();
        // if ($first) {
        //     // Hanya jalankan ini jika $first tidak null
        //     dd('bisa kok');
        //     // $id_candidate = $first->id_candidate;
        //     // Lanjutkan dengan logika lain
        // } else {
        //     // Tangani situasi ketika tidak ada kandidat yang ditemukan
        //     dd('gak iso');
        //     // echo "Tidak ada kandidat ditemukan.";
        // }
        $job = null;
        $notes = null;
        $activity = null;
        $users = User::get();
        $jobs = job::get();
        if(count($first) > 0){
            foreach ($first as $f) {
                $job = job::where('id_job','=',$f->id_job)->get();
                $job_exp = Job_exp::where('id_candidate','=',$f->id_candidate)->orderBy('nama_pekerjaan','DESC')->get();
                $edu_exp = Edu_exp::where('id_candidate','=',$f->id_candidate)->orderBy('institusi','DESC')->get();
                $org_exp = Org_exp::where('id_candidate','=',$f->id_candidate)->orderBy('nama_organisasi','DESC')->get();
                $bahasa = Bahasa::where('id_candidate','=',$f->id_candidate)->orderBy('bahasa','ASC')->get();
                $activity = activity::where('id_candidate','=',$f->id_candidate)->orderBy('id','ASC')->get();
                $notes = notes::select('notes.*', 'candidate.nama as candidate_name', 'users.name as user_name', 'users.foto_profile as user_profile')
                ->join('candidate', 'notes.id_candidate', '=', 'candidate.id_candidate')
                ->join('users', 'notes.id_user', '=', 'users.id')
                ->where('notes.id_candidate', '=', $f->id_candidate)
                ->orderBy('notes.time', 'DESC')
                ->get();
                return view('candidate.detail_candidates', ['bahasa' => $bahasa,'org_exp' => $org_exp,'edu_exp' => $edu_exp,'job_exp' => $job_exp,'user' => $user,'activity' => $activity,'users' => $users,'notes' => $notes,'candidateDetail' => $first,'candidates' => $candidates,'jobs' => $jobs,'job' => $job,'first' => $first]);
            }
        }
        return redirect('/candidates');
    }
    public function candidateDetailViewId(Request $req){
        $user = null;
        if(Auth()->user()){
            $user = Auth()->user();
        }
        $candidates = candidate::get();
        $candidate = candidate::where('id_candidate','=',$req->id)->get();
        // $first = candidate::get()->first();
        // dd($first);
        $job = null;
        $notes = null;
        $activity = null;
        $users = User::get();
        $jobs = job::get();
        if(count($candidate) > 0){
            foreach ($candidate as $c) {    
                $job = job::where('id_job','=',$c->id_job)->get();
                $job_exp = Job_exp::where('id_candidate','=',$c->id_candidate)->orderBy('nama_pekerjaan','DESC')->get();
                $edu_exp = Edu_exp::where('id_candidate','=',$c->id_candidate)->orderBy('institusi','DESC')->get();
                $org_exp = Org_exp::where('id_candidate','=',$c->id_candidate)->orderBy('nama_organisasi','DESC')->get();
                $bahasa = Bahasa::where('id_candidate','=',$c->id_candidate)->orderBy('bahasa','ASC')->get();
                $activity = activity::where('id_candidate','=',$c->id_candidate)->orderBy('id','DESC')->get();
                $notes = notes::select('notes.*', 'candidate.nama as candidate_name', 'users.name as user_name', 'users.foto_profile as user_profile')
                ->join('candidate', 'notes.id_candidate', '=', 'candidate.id_candidate')
                ->join('users', 'notes.id_user', '=', 'users.id')
                ->where('notes.id_candidate', '=', $c->id_candidate)
                ->orderBy('notes.time', 'DESC')
                ->get();
                return view('candidate.detail_candidates', ['bahasa' => $bahasa,'org_exp' => $org_exp,'edu_exp' => $edu_exp,'job_exp' => $job_exp,'activity' => $activity,'users' => $users,'notes' => $notes,'user' => $user,'candidateDetail' => $candidate,'jobs' => $jobs,'job' => $job,'first' => '','candidates' => $candidates]);
            }
        }
        return redirect('/candidates');
    }
    public function notesAdd(Request $request)
    {
        $validatedData = $request->validate([
            'id_candidate' => 'required|integer',
            'id_user' => 'required|integer',
            'time' => 'required',
            'note' => 'required|string',
        ]);

        $note = new Notes();
        $note->id_candidate = $validatedData['id_candidate'];
        $note->id_user = $validatedData['id_user'];
        $note->time = $validatedData['time'];
        $note->note = $validatedData['note'];
        $note->save();

        $notes = notes::select('notes.*', 'candidate.nama as candidate_name', 'users.name as user_name', 'users.foto_profile as user_profile')
            ->join('candidate', 'notes.id_candidate', '=', 'candidate.id_candidate')
            ->join('users', 'notes.id_user', '=', 'users.id')
            ->where('notes.id_candidate', '=', $note->id_candidate)
            ->orderBy('notes.time', 'DESC')
            ->limit(1)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Note added successfully',
            'notes' => $notes
        ]);
    }
    public function notesAddResume(Request $request)
    {
        $validatedData = $request->validate([
            'id_candidate' => 'required|integer',
            'id_user' => 'required|integer',
            'note' => 'required|string',
        ]);

        $note = new Notes();
        $note->id_candidate = $validatedData['id_candidate'];
        $note->id_user = $validatedData['id_user'];
        $note->time = date('Y-m-d H:i:s');
        $note->note = $validatedData['note'];
        $note->save();

        $notes = notes::select('notes.*', 'candidate.nama as candidate_name', 'users.name as user_name', 'users.foto_profile as user_profile')
            ->join('candidate', 'notes.id_candidate', '=', 'candidate.id_candidate')
            ->join('users', 'notes.id_user', '=', 'users.id')
            ->where('notes.id_candidate', '=', $note->id_candidate)
            ->orderBy('notes.time', 'DESC')
            ->limit(1)
            ->get();

        return redirect('/candidates/detail/'.$validatedData['id_candidate']);
    }
    public function addRating(Request $req){
        $validatedData = $req->validate([
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'tgl' => 'required',
            'rate' => 'required|integer',
        ]);

        $updateStar = candidate::where('id_candidate','=',$req->id_kandidat)->update([
                            'rating' => $req->rate
                        ]);
        if($updateStar){
            $activity = new Activity();
            $activity->id_candidate = $validatedData['id_kandidat'];
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = $validatedData['tgl'];
            $activity->deskripsi = 'Kandidat dinilai '.$validatedData['rate'].' bintang';
            $activity->type = 'star';
            $activity->save();

            return response()->json([
                'success' => true,
                'message' => 'Rating successfully',
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Rating failed',
        ]);
    }
    public function addJobExp(Request $req){
        $validatedData = $req->validate([
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'nama_pekerjaan' => 'required',
            'nama_perusahaan' => 'required',
            'lokasi' => 'required',
            'tipe_pekerjaan' => 'required',
            'gaji' => 'required',
            'bulan_mulai' => 'required',
            'tahun_mulai' => 'required',
            'bulan_selesai' => 'required',
            'tahun_selesai' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($validatedData);
        $masih_kerja = 0;
        if($req->masih_bekerja == 'on'){
            $masih_kerja = 1;
        }
        $id_candidate = $validatedData['id_kandidat'];
        
        $bulan_to_num = [
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
            'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
            'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];
        
        $mulai_kerja = $validatedData['bulan_mulai'].' '.$validatedData['tahun_mulai'];
        $selesai_kerja = $validatedData['bulan_selesai'].' '.$validatedData['tahun_selesai'];
        
        // Konversi bulan ke angka
        $bulan_mulai_num = $bulan_to_num[$validatedData['bulan_mulai']];
        $bulan_selesai_num = $bulan_to_num[$validatedData['bulan_selesai']];
        
        // Buat objek DateTime dari string
        $date_mulai = DateTime::createFromFormat('Y-n', $validatedData['tahun_mulai'].'-'.$bulan_mulai_num);
        $date_selesai = DateTime::createFromFormat('Y-n', $validatedData['tahun_selesai'].'-'.$bulan_selesai_num);
        
        // Hitung selisih antara dua tanggal
        $interval = $date_mulai->diff($date_selesai);
        
        // Dapatkan selisih dalam tahun dan bulan
        $selisih_tahun = $interval->y;
        $selisih_bulan = $interval->m;
        
        $mulai_kerja = $validatedData['bulan_mulai'].' '.$validatedData['tahun_mulai'];
        $selesai_kerja = $validatedData['bulan_selesai'].' '.$validatedData['tahun_selesai'];
        $selisih = $selisih_bulan.' bulan';
        // dd($interval);
        if($interval->y >= 1){
            $selisih = $selisih_tahun.' tahun';
        }
        $check = false;

        if($validatedData['id_kandidat']){
            $job_exp = new Job_exp();
            $job_exp->id_candidate = $id_candidate;
            $job_exp->nama_pekerjaan = $validatedData['nama_pekerjaan'];
            $job_exp->nama_perusahaan = $validatedData['nama_perusahaan'];
            $job_exp->lokasi = $validatedData['lokasi'];
            $job_exp->tipe_pekerjaan = $validatedData['tipe_pekerjaan'];
            $job_exp->gaji = $validatedData['gaji'];
            $job_exp->mulai_kerja = $mulai_kerja;
            $job_exp->selesai_kerja = $selesai_kerja;
            $job_exp->pengalaman = $selisih;
            $job_exp->deskripsi = $validatedData['deskripsi'];
            $job_exp->masih_bekerja = $masih_kerja;
            if($job_exp->save()){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
    public function editJobExp(Request $req){
        $validatedData = $req->validate([
            'id_job_exp' => 'required|integer',
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'nama_pekerjaan' => 'required',
            'nama_perusahaan' => 'required',
            'lokasi' => 'required',
            'tipe_pekerjaan' => 'required',
            'gaji' => 'required',
            'bulan_mulai' => 'required',
            'tahun_mulai' => 'required',
            'bulan_selesai' => 'required',
            'tahun_selesai' => 'required',
            'deskripsi' => 'required',
        ]);
        // dd($validatedData);
        $masih_kerja = 0;
        if($req->masih_bekerja == 'on'){
            $masih_kerja = 1;
        }
        $id_candidate = $validatedData['id_kandidat'];
        
        $bulan_to_num = [
            'January' => 1, 'February' => 2, 'March' => 3, 'April' => 4,
            'May' => 5, 'June' => 6, 'July' => 7, 'August' => 8,
            'September' => 9, 'October' => 10, 'November' => 11, 'December' => 12
        ];
        
        $mulai_kerja = $validatedData['bulan_mulai'].' '.$validatedData['tahun_mulai'];
        $selesai_kerja = $validatedData['bulan_selesai'].' '.$validatedData['tahun_selesai'];
        
        // Konversi bulan ke angka
        $bulan_mulai_num = $bulan_to_num[$validatedData['bulan_mulai']];
        $bulan_selesai_num = $bulan_to_num[$validatedData['bulan_selesai']];
        
        // Buat objek DateTime dari string
        $date_mulai = DateTime::createFromFormat('Y-n', $validatedData['tahun_mulai'].'-'.$bulan_mulai_num);
        $date_selesai = DateTime::createFromFormat('Y-n', $validatedData['tahun_selesai'].'-'.$bulan_selesai_num);
        
        // Hitung selisih antara dua tanggal
        $interval = $date_mulai->diff($date_selesai);
        
        // Dapatkan selisih dalam tahun dan bulan
        $selisih_tahun = $interval->y;
        $selisih_bulan = $interval->m;
        
        $mulai_kerja = $validatedData['bulan_mulai'].' '.$validatedData['tahun_mulai'];
        $selesai_kerja = $validatedData['bulan_selesai'].' '.$validatedData['tahun_selesai'];
        $selisih = $selisih_bulan.' bulan';
        // dd($interval);
        if($interval->y >= 1){
            $selisih = $selisih_tahun.' tahun';
        }
        $check = false;

        if($validatedData['id_job_exp']){
            $job_exp_update = Job_exp::where('id','=',$validatedData['id_job_exp'])->update([
                'nama_pekerjaan' => $validatedData['nama_pekerjaan'],
                'nama_perusahaan' => $validatedData['nama_perusahaan'],
                'lokasi' => $validatedData['lokasi'],
                'tipe_pekerjaan' => $validatedData['tipe_pekerjaan'],
                'gaji' => $validatedData['gaji'],
                'mulai_kerja' => $mulai_kerja,
                'selesai_kerja' => $selesai_kerja,
                'pengalaman' => $selisih,
                'deskripsi' => $validatedData['deskripsi'],
                'masih_bekerja' => $masih_kerja,
            ]);
            if($job_exp_update){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
    public function addEduExp(Request $req){
        $validatedData = $req->validate([
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'nama_institusi' => 'required|max:200',
            'gelar' => 'max:100',
            'jurusan' => 'max:100',
            'ipk' => 'required',
            'lokasi' => 'required|max:255',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);
        // dd($validatedData);
        $id_candidate = $validatedData['id_kandidat'];
        $check = false;

        if($id_candidate){
            $edu_exp = new Edu_exp();
            $edu_exp->id_candidate = $id_candidate;
            $edu_exp->institusi = $validatedData['nama_institusi'];
            $edu_exp->gelar = $validatedData['gelar'];
            $edu_exp->jurusan = $validatedData['jurusan'];
            $edu_exp->lokasi = $validatedData['lokasi'];
            $edu_exp->ipk = $validatedData['ipk'];
            $edu_exp->tanggal_mulai = $validatedData['tgl_mulai'];
            $edu_exp->tanggal_selesai = $validatedData['tgl_selesai'];
            if($edu_exp->save()){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
    public function editEduExp(Request $req){
        $validatedData = $req->validate([
            'id_kandidat' => 'required|integer',
            'id_edu_exp' => 'required|integer',
            'id_user' => 'required|integer',
            'nama_institusi' => 'required|max:200',
            'gelar' => 'max:100',
            'jurusan' => 'max:100',
            'ipk' => 'required',
            'lokasi' => 'required|max:255',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
        ]);
        // dd($validatedData);
        $id_candidate = $validatedData['id_kandidat'];
        $check = false;

        if($id_candidate){
            $edu_exp_update = Edu_exp::where('id','=',$validatedData['id_edu_exp'])->update([
                'institusi' => $validatedData['nama_institusi'],
                'gelar' => $validatedData['gelar'],
                'jurusan' => $validatedData['jurusan'],
                'lokasi' => $validatedData['lokasi'],
                'ipk' => $validatedData['ipk'],
                'tanggal_mulai' => $validatedData['tgl_mulai'],
                'tanggal_selesai' => $validatedData['tgl_selesai'],
            ]);
            if($edu_exp_update){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
    public function addOrgExp(Request $req){
        $validatedData = $req->validate([
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'nama_organisasi' => 'required|max:200',
            'jabatan' => 'required|max:200',
            'nama_tempat' => 'required|max:200',
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
        ]);
        // dd($validatedData);
        $id_candidate = $validatedData['id_kandidat'];
        $check = false;

        if($id_candidate){
            $edu_exp = new Org_exp();
            $edu_exp->id_candidate = $id_candidate;
            $edu_exp->nama_organisasi = $validatedData['nama_organisasi'];
            $edu_exp->nama_tempat = $validatedData['nama_tempat'];
            $edu_exp->jabatan = $validatedData['jabatan'];
            $edu_exp->tahun_mulai = $validatedData['tahun_mulai'];
            $edu_exp->tahun_selesai = $validatedData['tahun_selesai'];
            if($edu_exp->save()){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
    public function editOrgExp(Request $req){
        $validatedData = $req->validate([
            'id_org' => 'required|integer',
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'nama_organisasi' => 'required|max:200',
            'jabatan' => 'required|max:200',
            'nama_tempat' => 'required|max:200',
            'tahun_mulai' => 'required',
            'tahun_selesai' => 'required',
        ]);
        // dd($validatedData);
        $id_candidate = $validatedData['id_kandidat'];
        $check = false;

        if($id_candidate){
            $org_update = Org_exp::where('id','=',$validatedData['id_org'])->update([
                'nama_organisasi' => $validatedData['nama_organisasi'],
                'jabatan' => $validatedData['jabatan'],
                'nama_tempat' => $validatedData['nama_tempat'],
                'tahun_mulai' => $validatedData['tahun_mulai'],
                'tahun_selesai' => $validatedData['tahun_selesai'],
            ]);;
            if($org_update){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
    public function addBhsExp(Request $req){
        $validatedData = $req->validate([
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'bahasa' => 'required|max:200',
            'berbicara' => 'required|max:200',
            'menulis' => 'required|max:200',
        ]);
        // dd($validatedData);
        $id_candidate = $validatedData['id_kandidat'];
        $check = false;

        if($id_candidate){
            $edu_exp = new Bahasa();
            $edu_exp->id_candidate = $id_candidate;
            $edu_exp->bahasa = $validatedData['bahasa'];
            $edu_exp->menulis = $validatedData['menulis'];
            $edu_exp->berbicara = $validatedData['berbicara'];
            if($edu_exp->save()){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
    public function editBhsExp(Request $req){
        $validatedData = $req->validate([
            'id_bahasa' => 'required|integer',
            'id_kandidat' => 'required|integer',
            'id_user' => 'required|integer',
            'bahasa' => 'required|max:200',
            'berbicara' => 'required|max:200',
            'menulis' => 'required|max:200',
        ]);
        // dd($validatedData);
        $id_candidate = $validatedData['id_kandidat'];
        $check = false;

        if($id_candidate){
            $org_update = Bahasa::where('id','=',$validatedData['id_bahasa'])->update([
                'bahasa' => $validatedData['bahasa'],
                'berbicara' => $validatedData['berbicara'],
                'menulis' => $validatedData['menulis'],
            ]);;
            if($org_update){
                $check = true;
            }
        }
        if($check){
            $activity = new Activity();
            $activity->id_candidate = $id_candidate;
            $activity->id_user = $validatedData['id_user'];
            $activity->tgl = date('Y-m-d');
            $activity->deskripsi = 'Kandidat diedit';
            $activity->type = 'edit';
            $activity->save();

            $check = false;
            return redirect('/candidates/detail/'.$id_candidate);
        }
        $check = false;
    }
}
