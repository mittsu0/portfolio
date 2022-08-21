<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class DeleteOldImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:old_images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 's3のimageから、24時間以上経過したファイルを削除します';

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
        $now = Carbon::now();
        $files = \Storage::disk('s3')->files('temp/');
        foreach($files as $file){
            $file_time = new Carbon(\Storage::disk('s3')->lastModified($file));
            if($now->diffInDays($file_time) >= 1){
                \Storage::disk('s3')->delete($file);
            }
        }
    }
}
