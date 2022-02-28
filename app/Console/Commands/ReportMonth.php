<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\UsersParent;
use App\Models\PointNAO;
use App\Models\DoanhThuThang;

class ReportMonth extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReportMonth:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::with('PointNAO')->get();
        foreach ($user as $value) {
            $user_doanhthu = $value->PointNAO;
            $sum_point = $user_doanhthu->point;
            $sum_amount = $user_doanhthu->doanhthu;

            $doanh_thu_thang = new DoanhThuThang;
            $doanh_thu_thang->user_id = $value->PointNAO->user_id;
            $doanh_thu_thang->amount = $sum_amount;
            $doanh_thu_thang->point = $sum_point;
            $doanh_thu_thang->hoahong_banle = $sum_amount;
            
            // Mốc điểm
            $moc120 = 120000000;
            $moc60 = 60000000;
            $moc30 = 30000000;

            // Tinh Hoa Hong Nhom
            $point_dad = PointNAO::where('id',$value->id)->first()->point;
            if($point_dad >= $moc120) {
                $chietKhau = 0.12;
            } elseif (($point_dad < $moc120) && ($point_dad >= $moc60)) {
                $chietKhau = 0.09;
            } elseif (($point_dad < $moc60) && ($point_dad >= $moc30)) {
                $chietKhau = 0.06;
            } elseif ($point_dad < $moc30) {
                $chietKhau = 0;
            }
            $listMem = [];
            $tonghoahong_child = $this->hoahongnhom($tonghoahong = 0, $value->id, $listMem, $moc120, $moc60, $moc30);
            $tonghoahong_child = array_sum($listMem);
    
            $tonghoahong = ($chietKhau * $point_dad) + $tonghoahong_child;
            $doanh_thu_thang->hoahong_nhom = $tonghoahong;

            //Luu Doanh Thu Thang
            $doanh_thu_thang->save();
        }
    }

    public function hoahongnhom ($tonghoahong, $id_dad, &$listMem, $moc120, $moc60, $moc30) {
        $id_son = User::where('id',$id_dad)->with('getIdSon.getNameSon','pointNAO')->first()
                ->getIdSon->whereNotIn('id_child',1)->whereNotIn('id_child','nhanh');

                
        if(count($id_son) > 0) {
            
            foreach ($id_son as $value) {
                //dieu kien neu nhanh tach thi khong gop phan nay vao
                if($value->nhanh != $value->id_child) {
                    $point = $value->getNameSon->pointNAO;
                    $kiemtra = UsersParent::where('id',$value->id)->first();
                    $point_dad = PointNAO::where('id',$id_dad)->first()->point;
                    
                    if($kiemtra->nhanh == $id_dad) {
                        $point_id_child = PointNAO::where('user_id', $kiemtra->id_child)->first()->point;
                        if($point_id_child < $moc120 && $point_id_child >= $moc60) {
                            $chietKhauNhanh = 0.03;
                        } elseif ($point_id_child < $moc60 && $point_id_child >= $moc30) {
                            $chietKhauNhanh = 0.06;
                        } elseif ($point_id_child < $moc30) {
                            $chietKhauNhanh = 0.12;
                        }
                        
                        $hoahong = $point_id_child*$chietKhauNhanh;
                        
                        $tonghoahong += $hoahong;
                        $listMem[] = $hoahong;
                    }
                }
                //dd(self::hoahongnhom($tonghoahong, $point->user_id));
                self::hoahongnhom($tonghoahong, $point->user_id, $listMem, $moc120, $moc60, $moc30);
            }
        } 
        return $listMem;
    }
}
