<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MailCampaign;
use App\Mail\TestMail;
use App\MailTemplate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails';

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
     * @return mixed
     */
    public function handle()
    {
        //
        $campaigns = MailCampaign::with('recipient_investors','templates')
        ->whereDate('run_at', Carbon::today())
        ->get();
        foreach ($campaigns as $c => $campaign) {
            # code...
            foreach ($campaign['recipient_investors'] as $ir => $recipient_investor) {
                # code...
                if($campaign->sent < $campaign->recipient_investors->count()){
                    foreach ($campaign['templates'] as $t => $template) {
                        # code...
                            $send = Mail::send([], [], function ($message) use ($template,$recipient_investor) {
                            $blade = Blade::compileString($template['body']);
                            $view = $this->render($blade, ['user'=>$recipient_investor]);

                            $message->to($recipient_investor['email'])
                                ->subject($template['subject'])
                                ->setBody($view, 'text/html');
                            });
                    }
                    $campaign->sent += 1;
                    $campaign->save();
                }
            }
        }
    }

    function render($__php, $__data)
    {
        $obLevel = ob_get_level();
        ob_start();
        extract($__data, EXTR_SKIP);
        try {
            eval('?' . '>' . $__php);
        } catch (\Exception $e) {
            while (ob_get_level() > $obLevel) ob_end_clean();
            throw $e;
        } catch (\Throwable $e) {
            while (ob_get_level() > $obLevel) ob_end_clean();
            throw new FatalThrowableError($e);
        }
        return ob_get_clean();
    }
}
