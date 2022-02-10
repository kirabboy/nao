<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InfoUser implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View 
    {   
        $user = User::with('getIdDad.getNameDad')->get();
        return view('admin.download.InfoUser',[
            'user' => $user,
        ]);
    }
}
