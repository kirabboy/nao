<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UsersParent;
use App\Models\PointNAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoinhomController extends Controller
{
    public function index()
    {
        $user = auth::user();
        $user_id = $user->id;
        $child_id = UsersParent::where('id_dad','=',$user_id)->pluck('id_child');
        $info_child = User::whereIn('id', $child_id)->get();

        //Lấy điểm nhánh NAO, từng nhánh trong NAO, tru nhanh tach
        $listPoint = [];
        $listPoint_getGroup = [];
        $listPoint = $this->point_child_id($listPoint, $user->id, $listPoint_getGroup);

        // Tim tat ca cac thanh vien trong doi nhom
        $listGroup = [];
        $listGroup = $this->tong_thanh_vien_doi_nhom($listGroup, $user->id);

        return view('public.users.doinhom.doinhom',
            compact('info_child', 'listPoint_getGroup'));
    }

    public function chitietthanhvien($id)
    {
        $thanhvien = User::find($id);
        $point = PointNAO::find($thanhvien->id);
        //Lấy điểm nhánh NAO, từng nhánh trong NAO, tru nhanh tach
        $listPoint = [];
        $listPoint_getGroup = [];
        $listPoint = $this->point_child_id($listPoint, $thanhvien->id, $listPoint_getGroup);
        $tong_so_nhanh = count($listPoint);

        // Tim tat ca cac thanh vien trong doi nhom
        $listGroup = [];
        $listGroup = $this->tong_thanh_vien_doi_nhom($listGroup, $thanhvien->id);
        $tong_so_nhom = count($listGroup);
        
        $soF1 = UsersParent::where('id_dad',$id)->where('id_child','!=',$id)->get()->count();
        return view('public.users.doinhom.chitietthanhvien',[
            'thanhvien' => $thanhvien,
            'point' => $point,
            'tong_so_nhanh' => $tong_so_nhanh,
            'tong_so_nhom' => $tong_so_nhom,
            'soF1' => $soF1,
        ]);
    }
    
    // Function tim tong thanh vien doi nhom (Tính cả nhánh tách)
    public function tong_thanh_vien_doi_nhom (&$listGroup = [], $id_dad) {
        $id_son = User::where('id',$id_dad)->with('getIdSon.getNameSon','pointNAO')->first()
                ->getIdSon->whereNotIn('id_child',1)->whereNotIn('id_child','nhanh');
        if(count($id_son) > 0) {
            foreach ($id_son as $value) {
                //dieu kien neu nhanh tach thi khong gop phan nay vao
                    $point = $value->getNameSon->pointNAO;
                    $listGroup[] = $point;
                    self::tong_thanh_vien_doi_nhom($listGroup, $point->user_id);
            }
        } 
        return $listGroup;
    }

    // Function chứa điểm từng Child của $id (không bao gồm nhánh tách)
    public function point_child_id (&$listPoint = [], $id_dad, &$listPoint_getGroup = []) {
        $id_son = User::where('id',$id_dad)->with('getIdSon.getNameSon','pointNAO')->first()
                ->getIdSon->whereNotIn('id_child',1)->whereNotIn('id_child','nhanh');
        if(count($id_son) > 0) {
            foreach ($id_son as $value) {
                //dieu kien neu nhanh tach thi khong gop phan nay vao
                if($value->nhanh != $value->id_child) {
                    $point = $value->getNameSon->pointNAO;
                    $group = $value;
                    $listPoint[] = $point;
                    $listPoint_getGroup[] = $group->getNameSon;
                    self::point_child_id($listPoint, $point->user_id, $listPoint_getGroup);
                }
            }
        } 
        return $listPoint;
    }
}