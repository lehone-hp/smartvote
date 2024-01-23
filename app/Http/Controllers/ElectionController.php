<?php
/**
 * Created by PhpStorm.
 * User: lehone
 * Date: 2/15/19
 * Time: 11:47 PM
 */

namespace App\Http\Controllers;


use App\Models\Candidate;
use App\Models\Election;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ElectionController extends Controller {

    public function index() {
        $elections = Election::all();
        return view('election.index', compact('elections'));
    }

    public function createElection(Request $request){

        $election = new Election();
        $election->name = $request->name;
        $election->save();

        return redirect(route('election.single', ['election_id'=>$election->id]));
    }

    public function getSingle($election_id) {

        $election = Election::findOrFail($election_id);

        return view('election.single', compact('election'));
    }

    public function addCandidate(Request $request) {

        $election = Election::findOrFail($request->election_id);

        $candidate = new Candidate();
        $candidate->name = $request->name;
        $candidate->election_id = $election->id;

        $path = storage_path('app/public/candidates');
        File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

        $image = $request->file('photo');
        $filename = uniqid() .'_'. time() .'.'. $image->getClientOriginalExtension();

        $oldfile = $candidate->photo;
        if(file_exists($path.'/'.$oldfile)){
            File::delete($path.'/'.$oldfile);
        }

        $image->move($path,$filename);
        $candidate->photo = $filename;
        $candidate->save();

        $election->candidatez += 1;
        $election->save();

        session()->flash('success', 'Candidate Successfully Added');
        return redirect()->back();
    }

    public function editCandidate(Request $request, $candidate_id) {

        $candidate = Candidate::findOrFail($candidate_id);
        $candidate->name = $request->name;

        if ($request->photo) {
            $path = storage_path('app/public/candidates');
            File::isDirectory($path) or File::makeDirectory($path, 0777, true, true);

            $image = $request->file('photo');
            $filename = uniqid() .'_'. time() .'.'. $image->getClientOriginalExtension();

            $oldfile = $candidate->photo;
            if(file_exists($path.'/'.$oldfile)){
                File::delete($path.'/'.$oldfile);
            }

            $image->move($path,$filename);
            $candidate->photo = $filename;
        }
        $candidate->save();

        session()->flash('success', 'Candidate Edited '.$candidate->name);
        return redirect()->back();
    }

    public function addCandidateVote(Request $request) {
        if(request()->ajax()){
            $candidates = $request->candidates;
            foreach ($candidates as $candidate) {
                $candidate = Candidate::find($candidate);
                $candidate->votes += 1;
                $candidate->save();

                $election = $candidate->election;
                $election->votez += 1;
                $election->save();
            }

            return response()->json([
                "success" => "success",
            ], 200);

        }else{
            // trying to access this route via some other method we block ;)
            return response()->json([
                "msg" => __('Server error! Please refresh the page.')
            ], 404);
        }
    }

    public function reduceCandidateVote(Request $request) {
        if(request()->ajax()){
            $candidate = Candidate::find($request->candidate_id);
            if ($candidate->votes <= 0) {
                return response()->json([
                    "msg" => "Candidate's vote is zero, cannot reduce less than that.",
                ], 200);
            }
            $candidate->votes -= 1;
            $candidate->save();

            $election = $candidate->election;
            $election->votez -= 1;
            $election->save();

            return response()->json([
                "vote_count" => $candidate->votes,
            ], 200);

        }else{
            // trying to access this route via some other method we block ;)
            return response()->json([
                "msg" => __('Server error! Please refresh the page.')
            ], 404);
        }
    }

    public function removeCandidate($candidate_id) {
        $candidate = Candidate::find($candidate_id);
        $election = $candidate->election;

        $message = $candidate->name . ' Successfully Removed for this Election';

        $election->votez -= $candidate->votes;
        $election->candidatez -= 1;
        $election->save();

        $candidate->delete();

        session()->flash('success', $message);
        return redirect()->back();
    }

    public function viewResults($election_id) {
        $election = Election::find($election_id);
        return view('election.results', compact('election'));
    }

    public function getCandidatePhoto($photo){
        $path = storage_path('app/public/candidates')  . "/" . $photo;
        if (!File::exists($path)) abort(404);
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = \Response::make($file, 200);
        $response->header('Content-Type', $type);
        return $response;
    }

    public function resetAllElections() {
        if(Auth::id() == 1) {
            $candidates = Candidate::all();
            foreach ($candidates as $candidate) {
                $candidate->votes = 0;
                $candidate->save();
            }

            foreach (Election::all() as $election) {
                $election->votez = 0;
                $election->save();
            }

            return "Completed";
        }
        return "Operation Not Permitted. You need to be the Admin :-(";
    }
}
