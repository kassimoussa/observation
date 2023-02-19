<?php

namespace App\Exports;

use App\Models\Fiche;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FicheExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $fiches, $nivo;

    public function __construct($fiches, $nivo)
    {
        $this->fiches = $fiches;
        $this->nivo = $nivo;
    }

    public function view(): View
    {
        $filename = 'exports.fiches_n'.$this->nivo;
        
        return view($filename, [
            'fiches' => $this->fiches 
        ]);
    }
}
