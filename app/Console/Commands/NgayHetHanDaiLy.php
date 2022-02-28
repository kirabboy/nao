<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\PointNAO;

class NgayHetHanDaiLy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'NgayHetHanDaiLy:cron';

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
        $user = User::all();
        $ngayhomnay = today()->format('Y-m-d');
        foreach ($user as $value) {
            $point = PointNAO::where('user_id',$value->id)->first();
            if (($value->level == 3) 
                && ($point->doanhthu < 140000000) 
                && ($value->ngayhethan < $ngayhomnay)) {
                $value->level = 1;
                $value->save();
            } 
            
            elseif (($value->level == 3) 
                && ($point->doanhthu >= 140000000)
                && ($value->ngayhethan > $ngayhomnay)){
                $value->level = 2;
                $value->save();
            }
        }
    }
}
