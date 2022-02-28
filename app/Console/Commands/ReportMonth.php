<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
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
        $user = User::with('DoanhThuNgay')->get();
        foreach ($user as $value) {
            $user_doanhthu = $value->DoanhThuNgay;
            $sum_point = 0;
            $sum_amount = 0;
            foreach ($user_doanhthu as $key) {
                $sum_point += $key->point;
                $sum_amount += $key->amount;
            }
            $sum_point = $sum_point;
            $sum_amount = $sum_amount;

            $doanh_thu_thang = new DoanhThuThang;
            $doanh_thu_thang->amount = $sum_amount;
            $doanh_thu_thang->point = $sum_point;
            $doanh_thu_thang->save();
        }
    }
}
