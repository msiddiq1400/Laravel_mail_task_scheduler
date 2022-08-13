<?php

namespace App\Console\Commands;

use App\Services\MailSendingService;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    protected $mailSendingService;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to users';

    public function __construct(MailSendingService $mailSendingService)
    {
        $this->mailSendingService = $mailSendingService;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info("called every min");
        $this->mailSendingService->sendEmails();
    }
}