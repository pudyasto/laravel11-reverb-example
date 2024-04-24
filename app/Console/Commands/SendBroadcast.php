<?php

namespace App\Console\Commands;

use App\Events\TestEvent;
use Illuminate\Console\Command;

class SendBroadcast extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:msg {message} {channel?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Percobaan kirim pesan broadcast';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $message = $this->argument('message');

        $msg = new TestEvent();

        $msg->title = "Informasi";
        $msg->message = $message;
        $msg->type = "info";

        if($this->argument('channel')){
            $channel = $this->argument('channel');
            if(stripos($channel,",")!==false){
                $arrChannel = explode(',',$channel);
                foreach($arrChannel as $val){
                    $msg->channel = $val;
                    broadcast($msg);
                }
            }else{
                $msg->channel = $channel;
                broadcast($msg);
            }
        }else{
            for($i=1;$i<=10;$i++){
                $msg->channel = 'all';
                broadcast($msg);
            }
        }
    }
}
