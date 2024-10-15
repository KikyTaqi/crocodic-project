<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\candidate;
use App\Models\job;
use App\Models\activity;
use App\Models\notes;
use App\Models\User;

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
        foreach ($first as $f) {
            $job = job::where('id_job','=',$f->id_job)->get();
            $activity = activity::where('id_candidate','=',$f->id_candidate)->orderBy('id','ASC')->get();
            $notes = notes::select('notes.*', 'candidate.nama as candidate_name', 'users.name as user_name', 'users.foto_profile as user_profile')
            ->join('candidate', 'notes.id_candidate', '=', 'candidate.id_candidate')
            ->join('users', 'notes.id_user', '=', 'users.id')
            ->where('notes.id_candidate', '=', $f->id_candidate)
            ->orderBy('notes.time', 'DESC')
            ->get();
        }
        $jobs = job::get();
        return view('candidate.detail_candidates', ['user' => $user,'activity' => $activity,'users' => $users,'notes' => $notes,'candidateDetail' => $first,'candidates' => $candidates,'jobs' => $jobs,'job' => $job,'first' => $first]);
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
        foreach ($candidate as $c) {    
            $job = job::where('id_job','=',$c->id_job)->get();
            $activity = activity::where('id_candidate','=',$c->id_candidate)->orderBy('id','DESC')->get();
            $notes = notes::select('notes.*', 'candidate.nama as candidate_name', 'users.name as user_name', 'users.foto_profile as user_profile')
            ->join('candidate', 'notes.id_candidate', '=', 'candidate.id_candidate')
            ->join('users', 'notes.id_user', '=', 'users.id')
            ->where('notes.id_candidate', '=', $c->id_candidate)
            ->orderBy('notes.time', 'DESC')
            ->get();
        }
        $jobs = job::get();
        // dd($candidate);
        return view('candidate.detail_candidates', ['activity' => $activity,'users' => $users,'notes' => $notes,'user' => $user,'candidateDetail' => $candidate,'jobs' => $jobs,'job' => $job,'first' => '','candidates' => $candidates]);
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
}
