<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\task;
use App\Models\job;
use App\Models\candidate;
use App\Models\pic;
use App\Models\job_setting;
use App\Models\job_activity;
use App\Models\job_config;
use Carbon\Carbon;
// use Illuminate\Support\Facades\Hash;

class master extends Controller
{
    public function dashboard(){
        $tasks = task::orderBy('id_task', 'DESC')->get();
        
        foreach ($tasks as $task) {
            $task->formatted_jam_awal = Carbon::parse($task->jam_awal)->format('h:i A');
            $task->formatted_jam_akhir = Carbon::parse($task->jam_akhir)->format('h:i A');
        }
        
        return view('dashboard', ['tasks' => $tasks]);
    }

    public function jobs(){
        $jobs = job::paginate(15);

        return view('jobs/jobs', ['jobs' => $jobs]);
    }

    public function detailJobs($id){
        $screening = candidate::where('id_job', $id)->where('status', 0)->get();
        $psikotest = candidate::where('id_job', $id)->where('status', 1)->get();
        $inter_hr = candidate::where('id_job', $id)->where('status', 2)->get();
        $inter_user = candidate::where('id_job', $id)->where('status', 3)->get();
        $peralihan = candidate::where('id_job', $id)->where('status', 4)->get();
        $reject = candidate::where('id_job', $id)->where('status', 5)->get();
        $hiring = candidate::where('id_job', $id)->where('status', 6)->get();
    
        // Menghitung jumlah data
        $count_screening = $screening->count();
        $count_psikotest = $psikotest->count();
        $count_inter_hr = $inter_hr->count();
        $count_inter_user = $inter_user->count();
        $count_peralihan = $peralihan->count();
        $count_reject = $reject->count();
        $count_hiring = $hiring->count();

        $job = job::where('id_job', $id)->first();
        $candidate = candidate::get();
    
        return view('jobs/detail', [
            'screening' => $screening,
            'psikotest' => $psikotest,
            'inter_hr' => $inter_hr,
            'inter_user' => $inter_user,
            'peralihan' => $peralihan,
            'reject' => $reject,
            'hiring' => $hiring,
            'count_screening' => $count_screening,
            'count_psikotest' => $count_psikotest,
            'count_inter_hr' => $count_inter_hr,
            'count_inter_user' => $count_inter_user,
            'count_peralihan' => $count_peralihan,
            'count_reject' => $count_reject,
            'count_hiring' => $count_hiring,
            'job' => $job,
            'candidate' => $candidate
        ]);
    }
    

    public function editJobs($id){
        $job = job::find($id);
        $config = job_config::where('id_job', $id)->first();
    
        return view('jobs.edit', ['job' => $job, 'config' => $config]);
    }
    

    public function prsEditJob(Request $r){
        $id = $r->id_job;
    
        if($r->hasFile('logo')){
            $logo = $r->file('logo');
            $logoname = $logo->hashName();
            $logo->move(public_path('logo'), $logoname);
        } else {
            $logoname = Job::where('id_job', $id)->value('logo');
        }
    
        Job::where('id_job', $id)->update([
            'nama_job' => $r->job_name,
            'nomor_job' => $r->ads,
            'job_category' => $r->job_category,
            'job_level' => $r->job_level,
            'gaji' => $r->gaji,
            'pengalaman' => $r->pengalaman,
            'deadline_recruitment' => $r->deadline,
            'nama_perusahaan' => $r->nama_perusahaan,
            'industri' => $r->industri,
            'tentang_perusahaan' => $r->tentangperusahaan,
            'alamat' => $r->alamat,
            'desc_pekerjaan' => $r->desc,
            'lokasi' => $r->lokasi,
            'total_butuh' => $r->jumlah_butuh,
            'logo' => $logoname,
            'form_data' => $r->formData, // Save form data
            'status' => $r->status
        ]);

        job_config::where('id_job', $id)->update([
            'tampilkan_nama_perusahaan' => $r->tampilkan,
            'foto_profil' => $r->pp,
            'status_pernikahan' => $r->statusnikah,
            'agama' => $r->agama,
            'tinggi_badan' => $r->tinggibadan,
            'berat_badan' => $r->beratbadan,
            'pendidikan' => $r->pendidikan,
            'pengalaman_kerja' => $r->pengalamankerja
        ]);

        job_activity::insert([
            'id_job' => $id,
            'action' => 'Mengedit Job',
            'person' => 'Admin'
        ]);
    
        session()->flash('jd', ['job_name' => $r->job_name, 'ads' => $r->ads, 'lokasi' => $r->lokasi, 'foto_name' => $logoname, 'id_job'  => $id]);
        return redirect()->route('jobs.success')->with('success_edit', 'Job updated successfully.');
    }
    
    public function JobsSc(){
        return view('jobs.sukses');
    }


    public function prsAddJobs(Request $r){
        if($r->hasFile('logo')){
            $logo = $r->file('logo');
            $logoname = $logo->hashName();
            $logo->move(public_path('logo'), $logoname);
        } else {
            $logoname = null;
        }
    
        $maxId = DB::table('job')->max('id_job');
        $autoId = $maxId + 1;
    
        job::insert([
            'id_job' => $autoId,
            'nama_job' => $r->job_name,
            'nomor_job' => $r->ads,
            'job_category' => $r->job_category,
            'job_level' => $r->job_level,
            'gaji' => $r->gaji,
            'pengalaman' => $r->pengalaman,
            'deadline_recruitment' => $r->deadline,
            'nama_perusahaan' => $r->nama_perusahaan,
            'industri' => $r->industri,
            'tentang_perusahaan' => $r->tentangperusahaan,
            'alamat' => $r->alamat,
            'desc_pekerjaan' => $r->desc,
            'lokasi' => $r->lokasi,
            'total_butuh' => $r->jumlah_butuh,
            'logo' => $logoname,
            'form_data' => $r->formData, // Save form data
            'status' => $r->status
        ]);

        job_config::insert([
            'id_job' => $autoId,
            'tampilkan_nama_perusahaan' => $r->tampilkan,
            'foto_profil' => $r->pp,
            'status_pernikahan' => $r->statusnikah,
            'agama' => $r->agama,
            'tinggi_badan' => $r->tinggibadan,
            'berat_badan' => $r->beratbadan,
            'pendidikan' => $r->pendidikan,
            'pengalaman_kerja' => $r->pengalamankerja
        ]);

        job_activity::insert([
            'id_job' => $autoId,
            'action' => 'Membuat Job',
            'person' => 'Admin'
        ]);

        job_setting::insert([
            'id_job' => $autoId
        ]);
    
        session()->flash('jd', ['job_name' => $r->job_name, 'ads' => $r->ads, 'lokasi' => $r->lokasi, 'foto_name' => $logoname, 'id_job' => $autoId]);
    
        return redirect()->route('jobs.success')->with('success_tambah', 'Job added successfully.');
    }

    public function addJobs(){
        return view('jobs.tambah');
    }


    public function activity($id){
        $activity = job_activity::where('id_job', $id)->get();
        $job = job::where('id_job', $id)->first();

        return view('jobs.activity', ['activity' => $activity, 'job' => $job]);
    }


    public function updateJobs(Request $request)
{
    $selectedCandidates = $request->input('candidates', []); 
    $jobId = $request->input('id_job'); 

    foreach ($selectedCandidates as $candidateId) {
        $candidate = Candidate::where('id_candidate', $candidateId)->first();
        if ($candidate) {
            $candidate->id_job = $jobId;
            $candidate->save();
        }
    }

    job_activity::insert([
        'id_job' => $jobId,
        'action' => 'Mengubah Candidate',
        'person' => 'Admin'
    ]);

    return redirect()->back()->with('success', 'Candidates updated successfully.');
}


    public function jobsetting($id){
        $pic = pic::get();

        $job_settings = job_setting::where('id_job', $id)->first();
        return view('jobs.setting', [
            'pic' => $pic,
            'id' => $id,
            'job_setting' => $job_settings
        ]);
    }


    public function addpic(request $r){
        pic::insert([
            'nama' => $r->nama,
            'role' => $r->role,
            'email' => $r->email,
            'office' => $r->office
        ]);

        return redirect()->back();
    }

    public function updateStatus(Request $request) {
        try {
            // Debugging statements
            \Log::info('Request Data:', $request->all());
    
            $jobId = $request->input('id_job');
            $field = $request->input('field');
            $status = $request->input('status');
    
            // Additional debugging
            \Log::info('Job ID: ' . $jobId);
            \Log::info('Field: ' . $field);
            \Log::info('Status: ' . $status);
    
            $settings = job_setting::where('id_job', $jobId)->first();
    
            if ($settings && in_array($field, ['screening', 'psikotest', 'interview_hr', 'interview_user', 'hiring', 'peralihan', 'medical_check_up'])) {
                job_setting::where('id_job',$jobId)->update([
                    $field => $status,
                ]);
            }
    
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error updating status: ' . $e->getMessage());
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function duplicateJob(request $r){
        $idOri = $r->id_job;

        $maxId = DB::table('job')->max('id_job');
        $autoId = $maxId + 1;

        $dt = job::where('id_job', $idOri)->first();
        $jc = job_config::where('id_job', $idOri)->first();
        $js = job_setting::where('id_job', $idOri)->first();

        job::insert([
            'id_job' => $autoId,
            'nama_job' => $dt->nama_job,
            'job_category' => $dt->job_category,
            'job_level' => $dt->job_level,
            'gaji' => $dt->gaji,
            'pengalaman' => $dt->pengalaman,
            'deadline_recruitment' => $dt->deadline_recruitment,
            'nama_perusahaan' => $dt->nama_perusahaan,
            'industri' => $dt->industri,
            'tentang_perusahaan' => $dt->tentang_perusahaan,
            'alamat' => $dt->alamat,
            'logo' => $dt->logo,
            'desc_pekerjaan' => $dt->desc_pekerjaan,
            'nomor_job' => $dt->nomor_job,
            'lokasi' => $dt->lokasi,
            'total_butuh' => $dt->total_butuh,
            'status' => 0,
            'form_data' => is_array($dt->form_data) ? json_encode($dt->form_data) : $dt->form_data
        ]);

        job_activity::insert([
            'id_job' => $autoId,
            'action' => 'Membuat Job',
            'person' => 'Admin'
        ]);

        job_config::insert([
            'id_job' => $autoId,
            'tampilkan_nama_perusahaan' => $jc->tampilkan_nama_perusahaan,
            'foto_profil' => $jc->foto_profil,
            'status_pernikahan' => $jc->status_pernikahan,
            'agama' => $jc->agama,
            'tinggi_badan' => $jc->tinggi_badan,
            'berat_badan' => $jc->berat_badan,
            'pendidikan' => $jc->pendidikan,
            'pengalaman_kerja' => $jc->pengalaman_kerja
        ]);

        job_setting::insert([
            'id_job' => $autoId,
            'subject' => $js->subject,
            'body' => $js->body,
            'screening' => $js->screening,
            'psikotest' => $js->psikotest,
            'interview_hr' => $js->interview_hr,
            'interview_user' => $js->interview_user,
            'hiring' => $js->hiring,
            'peralihan' => $js->peralihan,
            'medical_check_up' => $js->medical_check_up
        ]);



        return redirect()->back();
    }
    
    public function deleteJob(request $r){
        $id = $r->id_job;

        job_activity::where('id_job', $id)->delete();
        job_config::where('id_job', $id)->delete();
        job_setting::where('id_job', $id)->delete();
        candidate::where('id_job', $id)->update(['id_job' => 0]);
        job::where('id_job', $id)->delete();
        return redirect()->back();
    }

    public function addStatus(request $r){
        $id = $r->id_job;

        job::where('id_job', $id)->update(['status' => $r->status]);
        return redirect()->back()->with('update_status_success', 'Berhasil Mengubah Status');
    }

}