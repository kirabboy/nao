<?php

namespace App\Exports;

use App\Models\User;
use App\Models\UsersParent;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DanhSachDoiNhom implements FromView, ShouldAutoSize
{
    use Exportable;

    protected $id;

    function __construct($id) {
        $this->id = $id;
    }
    
    public function view(): View
    {
        $boss = User::find($this->id);
        $user = UsersParent::with('getNameSon')->where('id_dad','=',$this->id)->get();
        return view('admin.download.DanhSachDoiNhom',[
            'user' => $user,
            'boss' => $boss,
        ]);
    }
}
