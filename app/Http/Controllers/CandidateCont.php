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
}
