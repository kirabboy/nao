<?php

namespace App\Admin\Controllers;

use App\Models\User;
use App\Exports\InfoUser;
use App\Exports\DanhSachDoiNhom;
use App\Models\UsersParent;
use App\Models\PointNAO;
use App\Models\District;
use App\Models\Ward;
use App\Models\DoanhThuNgay;

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

        //Phần lịch sử theo tháng và ngày 
        $history = User::with('DoanhThuNgay')->where('id', $id)->first();
        $history_month = User::with('DoanhThuThang')->where('id', $id)->first();

        $tongNhanhNAO = $user_child->getIDSon->where('nhanh',$user->id)->count() - 1;
        $list_child_nhanh = $user_child->getIdSon->whereNotIn('id_child',1);

        // $amount = 100;
        // $point = 50;
        // $tinh = $this->tinhtienmuahang($id, $amount, $point);

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
            'history' => $history,
            'history_month' => $history_month,
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


    public function tinhtienmuahang ($id, $amount, $point) {
        $doanhthu_thang = PointNAO::where('id', $id)->first();
        $doanhthu_thang->doanhthu += $amount;
        $doanhthu_thang->save();

        $doanhthu_ngay = User::with('DoanhThuNgay')->where('id',$id)->first()
            ->DoanhThuNgay->where('created_at','>=', Carbon::today())->first();
        $doanhthu_ngay->amount += $amount;
        $doanhthu_ngay->save();
        
        $this->congTien($point, $id);
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

    // Hàm cộng điểm khi mua hàng
    public function congTien($point, $id) {
        $check_have_dad = User::with('getIdDad.getNameDad','pointNAO','DoanhThuNgay')
            ->where('id',$id)->get();
        $dieukien_point = 140000000;

        $congTien = $check_have_dad->first()->pointNAO;
        $pointbandau = $congTien->point;
        $congTien->point += $point;
        $congTien->save();
        
        $thongKe_point = $check_have_dad->first()->DoanhThuNgay
            ->where('created_at','>=', Carbon::today())->first();
        $thongKe_point->point += $point;
        $thongKe_point->save();
        
        if ((($check_have_dad->count() > 0) || 
            ($check_have_dad->first()->getIdDad->id_child != 1)) && ($congTien->user_id != 1))
        {
            $id_child = $check_have_dad->where('id','!=',1)->first();
            
            if($id_child->getIdDad->id_dad != 1) {
                $id_dad = $id_child->getIdDad->getNameDad->pointNAO;
            } elseif ($id_child->getIdDad->id_dad == 1) {
                $id_dad = User::with('pointNAO')->where('id',1)->first()->pointNAO;
            }
            
            if($congTien->point >= $dieukien_point) {
                $parent = UsersParent::where('id_child',$id_child->id)->first();
                
                if($parent->nhanh != $parent->id_child){
                    $parent->nhanh = $id_child->id;
                    $parent->save();
                    
                    $this->truTien($pointbandau, $parent->id_dad, $dieukien_point);
                }
                // else if ($parent->nhanh == $parent->id_child) {
                    
                // }
            } else if ($congTien->point < $dieukien_point){
                self::congTien($point, $id_dad->user_id);
            }
        }
    }

    // Hàm trừ tiền Dad nếu Child đủ điểm tách nhánh
    public function truTien($point, $id, $dieukien_point) {
        $check_have_dad = User::with('getIdDad.getNameDad','pointNAO','DoanhThuNgay')
            ->where('id',$id)->get();
        $id_child = $check_have_dad->first();
            
        $point_child = $id_child->pointNAO;
        $point_child->point -= $point;
        $point_child->save();
        
        $thongKe_point = $check_have_dad->first()->DoanhThuNgay
            ->where('created_at','>=', Carbon::today())->first();
        $thongKe_point->point -= $point;
        $thongKe_point->save();
        
        if(($check_have_dad->count() > 0) && ($point_child->user_id != 1)) {
            if($point_child->point < $dieukien_point) {
                $parent = UsersParent::where('id_child',$id_child->id)->first();
                // Điều kiện VD: id_dad = 2 id_child = 5 va nhanh = 5
                if (($parent->id_dad != $parent->nhanh) && ($parent->id_child != 1)){
                    // Neu id_dad == 1
                    if($parent->id_dad == 1) {
                        $parent->nhanh = $parent->id_dad;
                        $parent->save();

                        $id_1 = User::with('getIdDad.getNameDad','pointNAO','DoanhThuNgay')
                        ->where('id',1)->first()->pointNAO;
                        $id_1->point += $point_child->point;
                        $id_1->save();
                        $thongKe_point_id_1 = User::with('DoanhThuNgay')->where('id',1)->first()
                            ->DoanhThuNgay->where('created_at','>=', Carbon::today())->first();
                        $thongKe_point_id_1->point += $point_child->point;
                        $thongKe_point_id_1->save();
                    }
                    else {
                        $parent_child = UsersParent::where('id_child',$id_child->id)->first();
                        $amount_child = $point_child->point;
                        
                        $parent_child->nhanh = $parent_child->id_dad;
                        $parent_child->save();
                        
                        $this->congTien($amount_child, $parent_child->id_dad);
                    }
                } 

                // Điều kiện khác nhánh VD: id_child = 2 va nhanh = 5 va id_dad = 2
                else if ($parent->id_dad == $parent->nhanh) {
                    if($parent->id_dad == 1) {
                        $id_1 = User::with('getIdDad.getNameDad','pointNAO','DoanhThuNgay')
                        ->where('id',1)->first()->pointNAO;
                        $id_1->point -= $point;
                        $id_1->save();

                        $thongKe_point_id_1 = User::with('DoanhThuNgay')->where('id',1)->first()
                        ->DoanhThuNgay->where('created_at','>=', Carbon::today())->first();
                        $thongKe_point_id_1->point -= $point;
                        $thongKe_point_id_1->save();
                    } 
                    else {
                        self::truTien($point, $parent->id_dad, $dieukien_point);
                    }
                }
            }
        }
    }
}