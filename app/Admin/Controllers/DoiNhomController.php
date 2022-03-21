<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Exports\DanhSachDoiNhom;
use App\Models\UsersParent;

use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;

class DoiNhomController extends Controller
{
    public function downDanhSach(Excel $excel,$id) {
        return $excel->download(new DanhSachDoiNhom($id), 'DanhSachDoiNhom.xlsx');
    }

    public function doinhom(){
        $user = User::with('id_dad.name_dad')->get();
        return view('admin.quanly.doinhom', ['user'=>$user]);
    }

    public function detailDoiNhom($id) {
        $boss = User::find($id);
        $user = UsersParent::with('getNameSon')->where('id_dad','=',$id)->get();
        $listGroup = [];
        $listGroup = $this->tong_thanh_vien_doi_nhom($listGroup, $id);
        //dd($listGroup);
        //$test = $this->listDoiNhom($listGroup, $id);
        return view('admin.quanly.detailDoinhom', [
            'user'=>$user,
            'boss'=>$boss,
            'listGroup'=>$listGroup,
        ]);
    }

    public function listDoiNhom($listGroup, $id) {
        $dad = User::with('get');
        return $id;
    }


    // Function tim tat ca thanh vien doi nhom
    public function tong_thanh_vien_doi_nhom (&$listGroup = [], $id_dad) {
        $id_son = User::where('id',$id_dad)->with('getIdSon.getNameSon','PointNAO')->first()
                ->getIdSon->whereNotIn('id_child',1)->whereNotIn('id_child','nhanh');
        if(count($id_son) > 0) {
            foreach ($id_son as $value) {
                //dieu kien neu nhanh tach thi khong gop phan nay vao
                    $point = $value->getNameSon->PointNAO;
                    $save = $value->getNameSon;
                    $listGroup[] = $save;
                    self::tong_thanh_vien_doi_nhom($listGroup, $point->user_id);
            }
        } 
        return $listGroup;
    }
}