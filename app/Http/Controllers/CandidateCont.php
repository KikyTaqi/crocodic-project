<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\candidate;
use App\Models\job;

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
        $jobs = job::get();
        return view('candidate.detail_candidates', ['candidateDetail' => $first,'candidates' => $candidates,'jobs' => $jobs,'first' => $first]);
    }
    public function candidateDetailViewId(Request $req){
        $candidates = candidate::get();
        $candidate = candidate::where('id_candidate','=',$req->id)->get();
        // $first = candidate::get()->first();
        // dd($first);
        $jobs = job::get();
        // dd($candidate);
        return view('candidate.detail_candidates', ['candidateDetail' => $candidate,'jobs' => $jobs,'first' => '','candidates' => $candidates]);
    }
}
