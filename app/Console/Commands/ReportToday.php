<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DoanhThuNgay as DoanhThu;
use App\Models\User as User;

class ReportToday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReportToday:cron';

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
        $user = User::with('pointNAO')->get();
        
        foreach ($user as $value) {
            DoanhThu::create([
                'user_id' => $value->id,
                'point' => '0',
                'amount' => '0',
            ]);
        }
    }
}
