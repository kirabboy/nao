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

class QuanLyDaiLyController extends Controller
{
    public function canhan(Request $request){
        $items = $request->items ?? 5;
        $user = User::with('id_dad.name_dad')->paginate($items);
        $province = Province::get();
        $district = District::get();
        $ward = Ward::get();
        return view('admin.quanly.listcanhan',[
            'user' => $user,
            'items'=>$items, 
            'province'=>$province, 
            'district'=>$district,
            'ward'=> $ward,
        ]);
    }

    public function dowListUser(Excel $excel) {
        return $excel->download(new InfoUser, 'listUser.xlsx');
    }

    public function chitietcanhan($id){
        $user = User::find($id);
        $user_age = Carbon::parse($user->birthday)->diff(Carbon::now())->format('%y');
        $customer = User::with('getIdCustomers')->get();
        $count_customer = $customer->find($id)->getIdCustomers->count();
        $user_child = User::with('getIdSon.getNameSon','pointNAO')->first();
        $count_child = $user_child->find($id)->getIdSon->count();
        $tongdiemNAO = User::with('pointNAO')->where('id',$user->id)->first();
        $tongNhanhNAO = $user_child->getIDSon->where('nhanh',$user->id)->count() - 1;
        $list_child_nhanh = $user_child->getIdSon->whereNotIn('id_child',1);
        
        //dd($list_child_nhanh->getNameSon);
        $sum = 0;
        foreach($list_child_nhanh as $value) {
            $sum += $value->getNameSon->pointNAO->point;
        }
        echo $sum;

        $idDuocPoint = User::with('getIdDad')->find($id);
        //dd(User::with('getIdDad')->find($id)->getIdDad->getNameDad);
        
        $user_parent = User::with('getIdDad.getNameDad')->find($id);

        return view('admin.quanly.detailcanhan',[
            'user' => $user,
            'user_age' => $user_age,
            'tongdiemNAO' => $tongdiemNAO,
            'count_customer' => $count_customer,
            'count_child' => $count_child,
        ]);
    }

    public function fix($id_child, $NAO_POINT) {
        $son = UsersParent::where('id_child',$id_child)->first();
        $point_son = User::where('id',$id_child)->with('pointNAO')->first()->pointNAO;
        $dieukien_tachnhanh = 120;
        if($son->id_dad > 1) {
            $value = $son->id_dad;
            $point_dad = User::where('id',$value)->with('pointNAO')->first()->pointNAO;
            $checkCondition = $point_son->point + $NAO_POINT;
            $point_son->point += $NAO_POINT;
            $point_son->save();
            // Neu child thoa man dieu kien nho hon 120tr -> Dad + NAO_POINT
            if($checkCondition <= $dieukien_tachnhanh) {
                return self::fix($value, $NAO_POINT);
            } 
            // Neu child lon hon 120tr tach nhanh -> recursive tach may thang DAD
            else {
                $son->nhanh = $son->id_child; 
                $son->save();
                $point_dad->point -= $NAO_POINT;
                $point_dad->save();
                if($point_dad->point <= $dieukien_tachnhanh) {
                    $this->tachNhanh($value, $NAO_POINT, $dieukien_tachnhanh);
                }
                else {
                    //do_nothing
                }
            }
        } else { 
            $point_dad = User::where('id',1)->with('pointNAO')->first()->pointNAO;
            $point_son->point += $NAO_POINT;
            $point_son->save();
            if($point_son->point <= $dieukien_tachnhanh) {
                $point_dad->point = $NAO_POINT;
                $point_dad->save();
            } else {
                
            }
        }
    }
    //id_child = 6
    public function tachNhanh($id_child, $NAO_POINT, $dieukien_tachnhanh) {
        $son = UsersParent::where('id_child',$id_child)->first();
        $point_son = User::where('id',$id_child)->with('pointNAO')->first()->pointNAO;
        if($son->id_dad > 1){
            //id_dad = 5
            $value = $son->id_dad;
            $point_dad = User::where('id',$value)->with('pointNAO')->first()->pointNAO;
            //Xet dieu kien neu thang so 5 < dieukien tachnhanh thi gop nhanh lai voi bo no
            if($son->nhanh == $son->id_child) {
                $point_dad->point += $point_son->point;
                $point_dad->save();
                $son->nhanh = $value; 
                $son->save();
                return self::tachNhanh($point_dad->id, $NAO_POINT, $dieukien_tachnhanh);
            } else {
                $id_dad_or_dad = UsersParent::where('id_child',$value)->first();
                $point_dad_or_dad = 20; // id = 4
            }
        }
    }


    public function doinhom(){
        $user = User::with('id_dad.name_dad')->get();
        return view('admin.quanly.doinhom', ['user'=>$user]);
    }

    public function detailDoiNhom($id) {
        $boss = User::find($id);
        $user = UsersParent::with('getNameSon')->where('id_dad','=',$id)->get();
        return view('admin.quanly.detailDoinhom', [
            'user'=>$user,
            'boss'=>$boss
        ]);
    }

    public function downDanhSach(Excel $excel,$id) {
        return $excel->download(new DanhSachDoiNhom($id), 'DanhSachDoiNhom.xlsx');
    }

    public function nangcapdaily() {
        $user = User::with('getNangcap')->get();
        //dd($user->find(1)->getNangcap->where('status','=',0));
        // $nangcap = UserUpgrade::
        
        return view('admin.quanly.nangcapdaily',['user' => $user]);
    }

    public function detailNangcap($id) {
        $user = User::with('getNangcap')->find($id);
        return view('admin.quanly.detailNangcap',['user' => $user]);
    }

    public function nangcap_ctv($id) {
        $user = User::with('getNangcap')->find($id);
        $user->level = 1;
        foreach($user->getNangcap->where('status','=',0) as $value) {
            $value->status = 1;
            $value->save();
        }
        $user->save();
        return redirect()->back();
    }

    public function dailytamthoi($id) {
        $user = User::with('getNangcap')->find($id);
        $user->level = 3;
        $ngayhethan_daily = today()->addMonths(1)->format('Y-m-d');
        $user->ngayhethan = $ngayhethan_daily;
        $user->save();
        foreach($user->getNangcap->where('status','=',0) as $value) {
            $value->status = 1;
            $value->save();
        }
        return redirect()->back();
    }
}