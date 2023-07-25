<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\match_result;
use Illuminate\Http\Request;

class PertandinganController extends Controller
{
    public function viewpertandingan()
    {
        $clubs = Club::orderBy('nama_club', 'asc')->get();
        return view('pertandingan.club-skor', compact('clubs'));
    }

    public function simpanPertandingan(Request $request)
    {
        $request->validate([
            'club1_id' => 'required|different:club2_id', // Pastikan club1_id berbeda dari club2_id
            'club2_id' => 'required',
            'skor1' => 'required|numeric|min:0|max:10',
            'skor2' => 'required|numeric|min:0|max:10',
        ]);

        // Simpan data pertandingan ke database
        $pertandingan = new match_result();
        $pertandingan->club1_id = $request->input('club1_id');
        $pertandingan->club2_id = $request->input('club2_id');
        $pertandingan->skor1 = $request->input('skor1');
        $pertandingan->skor2 = $request->input('skor2');
        $pertandingan->save();

        // Lakukan perhitungan data seperti jumlah pertandingan, jumlah menang, jumlah seri, dll.
        $club1Id = $request->input('club1_id');
        $club2Id = $request->input('club2_id');

        $jumlahPertandinganClub1 = match_result::where('club1_id', $club1Id)
            ->orWhere('club2_id', $club1Id)
            ->count();

        $jumlahMenangClub1 = match_result::where(function ($query) use ($club1Id) {
            $query->where('club1_id', $club1Id)
                ->whereColumn('skor1', '>', 'skor2');
        })->orWhere(function ($query) use ($club1Id) {
            $query->where('club2_id', $club1Id)
                ->whereColumn('skor2', '>', 'skor1');
        })->count();

        $jumlahSeriClub1 = match_result::where(function ($query) use ($club1Id) {
            $query->where('club1_id', $club1Id)
                ->whereColumn('skor1', '=', 'skor2');
        })->orWhere(function ($query) use ($club1Id) {
            $query->where('club2_id', $club1Id)
                ->whereColumn('skor2', '=', 'skor1');
        })->count();

        $jumlahKalahClub1 = $jumlahPertandinganClub1 - $jumlahMenangClub1 - $jumlahSeriClub1;

        // Menghitung jumlah goal yang dicetak oleh klub 1
        $goalDicetakClub1 = match_result::where('club1_id', $club1Id)->sum('skor1');
        // Menghitung jumlah goal menang (goal klub 1 > goal klub 2)
        // $goalDicetakClub1 = match_result::where('club1_id', $club1Id)
        //     ->whereColumn('skor1', '>', 'skor2')
        //     ->orWhere('club2_id', $club1Id)
        //     ->whereColumn('skor2', '>', 'skor1')
        //     ->sum('skor1');

        // // Menghitung jumlah goal yang kemasukan oleh klub 1 (goal yang dicetak oleh klub 2)
        $goalKemasukanClub1 = match_result::where('club1_id', $club1Id)->sum('skor2');
        // // Menghitung jumlah goal kalah (goal klub 2 > goal klub 1)
        // $goalKemasukanClub1 = match_result::where('club1_id', $club1Id)
        //     ->whereColumn('skor1', '<', 'skor2')
        //     ->orWhere('club2_id', $club1Id)
        //     ->whereColumn('skor2', '<', 'skor1')
        //     ->sum('skor2');

        // Hitung poin berdasarkan perhitungan jumlah menang, jumlah seri, dan jumlah kalah
        $poinClub1 = $jumlahMenangClub1 * 3 + $jumlahSeriClub1 * 1;

        $id_club = Club::where('id', $club1Id);

        $id_club->update([
            "main" => $jumlahPertandinganClub1,
            "menang" => $jumlahMenangClub1,
            "seri" => $jumlahSeriClub1,
            "kalah" => $jumlahKalahClub1,
            "goal_menang" => $goalDicetakClub1,
            "goal_kalah" => $goalKemasukanClub1,
            "point" => $poinClub1,
        ]);
        // $club1 = Club::find($club1Id);
        // $club1->main = $jumlahPertandinganClub1;
        // $club1->menang = $jumlahMenangClub1;
        // $club1->seri = $jumlahSeriClub1;
        // $club1->kalah = $jumlahKalahClub1;
        // $club1->goal_menang = $goalDicetakClub1;
        // $club1->goal_kalah = $goalKemasukanClub1;
        // $club1->point = $poinClub1;
        // $club1->save();



        //  pertandingan 2
        $jumlahPertandinganClub2 = match_result::where('club2_id', $club2Id)
            ->orWhere('club1_id', $club2Id)
            ->count();

        $jumlahMenangClub2 = match_result::where(function ($query) use ($club2Id) {
            $query->where('club2_id', $club2Id)
                ->whereColumn('skor2', '>', 'skor1');
        })->orWhere(function ($query) use ($club2Id) {
            $query->where('club1_id', $club2Id)
                ->whereColumn('skor1', '>', 'skor2');
        })->count();

        $jumlahSeriClub2 = match_result::where(function ($query) use ($club2Id) {
            $query->where('club2_id', $club2Id)
                ->whereColumn('skor2', '=', 'skor1');
        })->orWhere(function ($query) use ($club2Id) {
            $query->where('club1_id', $club2Id)
                ->whereColumn('skor1', '=', 'skor2');
        })->count();

        $jumlahKalahClub2 = $jumlahPertandinganClub2 - $jumlahMenangClub2 - $jumlahSeriClub2;

        // Menghitung jumlah goal yang dicetak oleh klub 2
        $goalDicetakClub2 = match_result::where('club2_id', $club2Id)->sum('skor2');
        // // Menghitung jumlah goal menang (goal klub 1 > goal klub 2)
        // $goalDicetakClub2 = match_result::where('club2_id', $club2Id)
        //     ->whereColumn('skor2', '>', 'skor1')
        //     ->orWhere('club2_id', $club2Id)
        //     ->whereColumn('skor1', '>', 'skor2')
        //     ->sum('skor2');

        // // Menghitung jumlah goal yang kemasukan oleh klub 2 (goal yang dicetak oleh klub 1)
        $goalKemasukanClub2 = match_result::where('club2_id', $club2Id)->sum('skor1');
        // $goalKemasukanClub2 = match_result::where('club2_id', $club2Id)
        //     ->whereColumn('skor2', '<', 'skor1')
        //     ->orWhere('club2_id', $club2Id)
        //     ->whereColumn('skor1', '<', 'skor2')
        //     ->sum('skor1');

        // Hitung poin berdasarkan perhitungan jumlah menang, jumlah seri, dan jumlah kalah
        $poinClub2 = $jumlahMenangClub2 * 3 + $jumlahSeriClub2 * 1;


        $id_club2 = Club::where('id', $club2Id);

        $id_club2->update([
            "main" => $jumlahPertandinganClub2,
            "menang" => $jumlahMenangClub2,
            "seri" => $jumlahSeriClub2,
            "kalah" => $jumlahKalahClub2,
            "goal_menang" => $goalDicetakClub2,
            "goal_kalah" => $goalKemasukanClub2,
            "point" => $poinClub2,
        ]);
        // $club2 = Club::find($club2Id);
        // $club2->main = $jumlahPertandinganClub2;
        // $club2->menang = $jumlahMenangClub2;
        // $club2->seri = $jumlahSeriClub2;
        // $club2->kalah = $jumlahKalahClub2;
        // $club2->goal_menang = $goalDicetakClub2;
        // $club2->goal_kalah = $goalKemasukanClub2;
        // $club2->point = $poinClub2;

        // $club2->save();

        $notification = array(
            'message' => 'Pertandingan Berhasil Disimpan',
            'alert-type' => 'success'
        );

        // Setelah melakukan perhitungan dan menyimpan data statistik, redirect kembali dengan pesan sukses
        return redirect()->route('view.klasemen')->with($notification);
    }

    // public function multiplePertandingan(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'club_id.*' => 'required|different:club_id.*', // Pastikan setiap club_id berbeda dari yang lain
    //         'skor.*' => 'required|numeric|min:0|max:10',
    //     ]);

    //     // Loop melalui setiap inputan dan simpan ke dalam database
    //     $clubs = $request->input('club_id');
    //     $skors = $request->input('skor');

    //     dd($clubs);

    //     foreach ($clubs as $index => $clubId) {
    //         $skor = $skors[$index];

    //         // Simpan data pertandingan ke database
    //         $pertandingan = new match_result();
    //         $pertandingan->club1_id = $clubId;
    //         $pertandingan->skor1 = $skor;
    //         $pertandingan->save();
    //     }

    //     $notification = array(
    //         'message' => 'Pertandingan Berhasil Disimpan',
    //         'alert-type' => 'success'
    //     );

    //     // Redirect kembali dengan pesan sukses
    //     return redirect()->route('view.klasemen')->with($notification);
    // }

    public function viewklasemen()
    {
        $clubs = Club::orderBy('point', 'desc')->get();
        return view('pertandingan.view-klasemen', compact('clubs'));
    }
}
