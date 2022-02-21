<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Exports\InfoUser;
use App\Exports\DanhSachDoiNhom;
use App\Models\UsersParent;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;

use Carbon\Carbon;
use Maatwebsite\Excel\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    public function chitietcanhan($id){
        $user = User::find($id);
        $user_age = Carbon::parse($user->birthday)->diff(Carbon::now())->format('%y');
        $customer = User::with('getIdCustomers')->get();
        //Tổng khách hàng = count_customer
        $count_customer = $customer->find($id)->getIdCustomers->count();
        //user_child = reveal tất cả thằng con kèm theo số điểm của từng thằng
        $user_child = User::with('getIdSon.getNameSon','pointNAO')->first();
        //Tổng số thằng con của $id
        $count_child = $user_child->find($id)->getIdSon->count();
        
        //List công thức thống kê point
        //$tongdiemNAO = lấy điểm NAO cá nhân 
        $tongdiemNAO = User::with('pointNAO')->where('id',$user->id)->first();

        //Lấy điểm nhánh NAO, từng nhánh trong NAO, tru nhanh tach
        $listPoint = [];
        $listPoint = $this->point_child_id($listPoint, $id);
        $tong_so_F1 = count($listPoint);

        //Tông điểm tất cả các nhánh
        $sumPoint_all_nhanh = 0;
        foreach($listPoint as $value) {
            $sumPoint_all_nhanh += $value->point;
        }
        $sumPoint_all_nhanh = $sumPoint_all_nhanh;
        
        //Tổng doanh thu tất cả các nhánh
        $sumDT_all_nhanh = 0;
        foreach($listPoint as $value) {
            $sumDT_all_nhanh += $value->doanhthu;
        }
        $sumDT_all_nhanh = $sumDT_all_nhanh;
        
        //Lấy info doi nhom, tong doi nhom hien co bao nhieu F
        $listGroup = [];
        $listGroup = $this->tong_thanh_vien_doi_nhom($listGroup, $id);


        $tongNhanhNAO = $user_child->getIDSon->where('nhanh',$user->id)->count() - 1;
        $list_child_nhanh = $user_child->getIdSon->whereNotIn('id_child',1);


        return view('admin.quanly.detailcanhan',[
            'user' => $user,
            'user_age' => $user_age,
            'tongdiemNAO' => $tongdiemNAO,
            'count_customer' => $count_customer,
            'count_child' => $count_child,
            'sumPoint_all_nhanh' => $sumPoint_all_nhanh,
            'sumDT_all_nhanh' => $sumDT_all_nhanh,
            'tong_so_F1' => $tong_so_F1,
            'listGroup' => $listGroup,
            'listPoint' => $listPoint,
        ]);
    }
    /*  
        Nếu là nhánh tách thì table user_parent-> nhanh sẽ có value = id_child
        Nếu chung nhánh với id_dad thì value nhánh = id_dad
    */

    // Function chứa điểm từng Child của $id (không bao gồm nhánh tách)
    public function point_child_id (&$listPoint = [], $id_dad) {
        $id_son = User::where('id',$id_dad)->with('getIdSon.getNameSon','pointNAO')->first()
                ->getIdSon->whereNotIn('id_child',1)->whereNotIn('id_child','nhanh');
        if(count($id_son) > 0) {
            foreach ($id_son as $value) {
                //dieu kien neu nhanh tach thi khong gop phan nay vao
                if($value->nhanh != $value->id_child) {
                    $point = $value->getNameSon->pointNAO;
                    $listPoint[] = $point;
                    self::point_child_id($listPoint, $point->user_id);
                }
            }
        } 
        return $listPoint;
    }


    // Function tim tong thanh vien doi nhom
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
}