<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function ViewClub(){
        $clubs = Club::latest()->get();
        return view('club.club-view', compact('clubs'));
    }

    public function tambahclub(Request $request){
        $request->validate([
            'nama_club' => 'required|unique:clubs,nama_club',
            'kota_club' => 'required',
        ], [
            'nama_club.required' => 'Mohon Isi data terlebih dahulu',
            'kota_club.required' => 'Mohon Isi data terlebih dahulu',
        ]);

        Club::insert([
            'nama_club' => $request->nama_club,
            'kota_club' => $request->kota_club,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Club Berhasil Di Tambahkan',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function editclub($id){
        $clubs = Club::findOrFail($id);
        return view('club.club-edit', compact('clubs'));
    }

    public function updateclub(Request $request){
        $club_id = $request->id;

        Club::findOrFail($club_id)->update([
            'nama_club' => $request->nama_club,
            'kota_club' => $request->kota_club,
        ]);

        $notification = array(
            'message' => 'Club Berhasil Di Edit',
            'alert-type' => 'success'
        );
        return redirect()->route('club.view')->with($notification);
    }

    public function deleteclub($id){
        Club::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Club Berhasil Di Hapus',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    
}
