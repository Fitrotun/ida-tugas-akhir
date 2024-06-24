<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\DataAlternatif;
use App\Models\Kriteria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(){
    //     $typeJarak = Kriteria::where('id','1')->first();
    //     $typeJamBuka = Kriteria::where('id','2')->first();
    //     $typeHargaTiket = Kriteria::where('id','3')->first();
    //     $typeFasilitas = Kriteria::where('id','4')->first();
    //     $typeRating = Kriteria::where('id','5')->first();
    //     $typeTransportasi = Kriteria::where('id','6')->first();

    //     if ($typeJarak->atribut == "benefit") {
    //         $C1 = DataAlternatif::min('C1');
    //     } else {
    //         $C1 = DataAlternatif::max('C1');
    //     }
    //     if ($typeJamBuka->atribut == "benefit") {
    //         $C2 = DataAlternatif::min('C2');
    //     } else {
    //         $C2 = DataAlternatif::max('C2');
    //     }
    //     if ($typeHargaTiket->atribut == "benefit") {
    //         $C3 = DataAlternatif::min('C3');
    //     } else {
    //         $C3 = DataAlternatif::max('C3');
    //     }
    //     if ($typeFasilitas->atribut == "benefit") {
    //         $C4 = DataAlternatif::min('C4');
    //     } else {
    //         $C4 = DataAlternatif::max('C4');
    //     }
    //     if ($typeRating->atribut == "benefit") {
    //         $C5 = DataAlternatif::min('C5');
    //     } else {
    //         $C5 = DataAlternatif::max('C5');
    //     }
    //     if ($typeTransportasi->atribut == "benefit") {
    //         $C6 = DataAlternatif::min('C6');
    //     } else {
    //         $C6 = DataAlternatif::max('C6');
    //     }


    //     $bobotJarak = $typeJarak->bobot;
    //     $bobotJamBuka = $typeJamBuka->bobot;
    //     $bobotHargaTiket = $typeHargaTiket->bobot;
    //     $bobotFasilitas = $typeFasilitas->bobot;
    //     $bobotRating = $typeRating->bobot;
    //     $bobotTransportasi = $typeTransportasi->bobot;

    //     $dataAlternatif = DataAlternatif::get();
    //     $hasil = $dataAlternatif->map(function($item) use($C1, $C2, $C3, $C4, $C5, $C6, $bobotJarak, $bobotJamBuka, $bobotHargaTiket, $bobotFasilitas, $bobotRating, $bobotTransportasi){
    //         $typeJarak = Kriteria::where('id', '1')->first();
    //         $typeJamBuka = Kriteria::where('id', '2')->first();
    //         $typeHargaTiket = Kriteria::where('id', '3')->first();
    //         $typeFasilitas = Kriteria::where('id', '4')->first();
    //         $typeRating = Kriteria::where('id', '5')->first();
    //         $typeTransportasi = Kriteria::where('id', '6')->first();

    //         if ($typeJarak->atribut == "benefit") {
    //             $item->C1 = $item->C1 / $C1;
    //         } else {
    //             $item->C1 = $C1 /$item->C1 ;
    //         }

    //         if ($typeJamBuka->atribut == "benefit") {
    //             $item->C2 = $item->C2 / $C2;
    //         } else {
    //             $item->C2 = $C2 /$item->C2 ;
    //         }

    //         if ($typeHargaTiket->atribut == "benefit") {
    //             $item->C3 = $item->C3 / $C3;
    //         } else {
    //             $item->C3 = $C3 /$item->C3 ;
    //         }

    //         if ($typeFasilitas->atribut == "benefit") {
    //             $item->C4 = $item->C4 / $C4;
    //         } else {
    //             $item->C4 = $C4 /$item->C4 ;
    //         }

    //         if ($typeRating->atribut == "benefit") {
    //             $item->C5 = $item->C5 / $C5;
    //         } else {
    //             $item->C5 = $C5 /$item->C5 ;
    //         }

    //         if ($typeTransportasi->atribut == "benefit") {
    //             $item->C6 = $item->C6 / $C6;
    //         } else {
    //             $item->C6 = $C6 /$item->C6 ;
    //         }

    //         $item->total = ($item->C1 * $bobotJarak) + ($item->C2 * $bobotJamBuka) + ($item->C3 * $bobotHargaTiket) + ($item->C4 * $bobotFasilitas) + ($item->C5 * $bobotRating) + ($item->C6 * $bobotTransportasi);
    //         return $item;
    //     });

    //     $rank = $hasil->sortByDesc('total');
    //     return view('backend.pages.admin.perhitungan.index', compact('rank'));
    // }

    public function index() {
        // Fetch all criteria
        $criteria = Kriteria::whereIn('id', [1, 2, 3, 4, 5, 6])->get();
        $criteriaMapping = [];
        foreach ($criteria as $criterion) {
            $criteriaMapping[$criterion->id] = $criterion;
        }

        // Determine min/max for normalization
        $normalizationFactors = [];
        foreach ($criteriaMapping as $criterion) {
            if ($criterion->atribut == "benefit") {
                $normalizationFactors['C' . $criterion->id] = DataAlternatif::min('C' . $criterion->id);
            } else {
                $normalizationFactors['C' . $criterion->id] = DataAlternatif::max('C' . $criterion->id);
            }
        }

        // Get the weights for each criterion
        $weights = [];
        foreach ($criteriaMapping as $criterion) {
            $weights['C' . $criterion->id] = $criterion->bobot;
        }

        // Fetch all alternatives
        $dataAlternatif = DataAlternatif::get();

        // Normalize values and calculate weighted sums
        $hasil = $dataAlternatif->map(function($item) use($normalizationFactors, $weights, $criteriaMapping) {
            foreach ($normalizationFactors as $key => $value) {
                $criterionId = str_replace('C', '', $key);
                if ($criteriaMapping[$criterionId]->atribut == "benefit") {
                    $item->$key = $item->$key / $value;
                } else {
                    $item->$key = $value / $item->$key;
                }
            }
            $item->total = 0;
            foreach ($weights as $key => $weight) {
                $item->total += $item->$key * $weight;
            }
            return $item;
        });

        // Sort by the total score in descending order
        $rank = $hasil->sortByDesc('total');

        return view('backend.pages.admin.perhitungan.index', compact('rank'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function show(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function edit(Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perhitungan $perhitungan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perhitungan  $perhitungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perhitungan $perhitungan)
    {
        //
    }

    public function matriks()
    {
        $typeJarak = Kriteria::where('id', '1')->first();
        // dd($typeJarak);
        $typeJamBuka = Kriteria::where('id', '2')->first();
        $typeHargaTiket = Kriteria::where('id', '3')->first();
        $typeFasilitas = Kriteria::where('id', '4')->first();
        $typeRating = Kriteria::where('id', '5')->first();
        $typeTransportasi = Kriteria::where('id', '6')->first();

        if ($typeJarak->atribut == "benefit") {
            $C1 = DataAlternatif::max('C1');
            // dd($C1);
        } else {
            $C1 = DataAlternatif::min('C1');
            // dd($C1);
        }
        if ($typeJamBuka->atribut == "benefit") {
            $C2 = DataAlternatif::max('C2');
            // dd($C2);
        } else {
            $C2 = DataAlternatif::min('C2');
        }
        if ($typeHargaTiket->atribut == "benefit") {
            $C3 = DataAlternatif::max('C3');
        } else {
            $C3 = DataAlternatif::min('C3');
        }
        if ($typeFasilitas->atribut == "benefit") {
            $C4 = DataAlternatif::max('C4');
        } else {
            $C4 = DataAlternatif::min('C4');
        }
        if ($typeRating->atribut == "benefit") {
            $C5 = DataAlternatif::max('C5');
        } else {
            $C5 = DataAlternatif::min('C5');
        }
        if ($typeTransportasi->atribut == "benefit") {
            $C6 = DataAlternatif::max('C6');
        } else {
            $C6 = DataAlternatif::min('C6');
        }

        $dataAlternatif = DataAlternatif::get();

        $matriks = $dataAlternatif->map(function($item) use($C1, $C2, $C3, $C4, $C5, $C6){
            $typeJarak = Kriteria::where('id', '1')->first();
            $typeJamBuka = Kriteria::where('id', '2')->first();
            $typeHargaTiket = Kriteria::where('id', '3')->first();
            $typeFasilitas = Kriteria::where('id', '4')->first();
            $typeRating = Kriteria::where('id', '5')->first();
            $typeTransportasi = Kriteria::where('id', '6')->first();
            if ($typeJarak->atribut == "benefit") {
                $item->C1 = $item->C1 / $C1;
            } else {
                $item->C1 = $C1 /$item->C1 ;
            }
            if ($typeJamBuka->atribut == "benefit") {
                $item->C2 = $item->C2 / $C2;

            } else {
                $item->C2 = $C2 /$item->C2 ;
            }
            if ($typeHargaTiket->atribut == "benefit") {
                $item->C3 = $item->C3 / $C3;
            } else {
                $item->C3 = $C3 /$item->C3 ;
            }
            if ($typeFasilitas->atribut == "benefit") {
                $item->C4 = $item->C4 / $C4;
            } else {
                $item->C4 = $C4 /$item->C4 ;
            }
            if ($typeRating->atribut == "benefit") {
                $item->C5 = $item->C5 / $C5;

            } else {
                $item->C5 = $C5 /$item->C5 ;
            }

            if ($typeTransportasi->atribut == "benefit") {
                $item->C6 = $item->C6 / $C6;
            } else {
                $item->C6 = $C6 /$item->C6 ;
            }

            return $item;
        });

        return view('backend.pages.admin.matriks.index', compact('matriks'));
    }



}
