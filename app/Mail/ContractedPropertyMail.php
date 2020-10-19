<?php

namespace App\Mail;

use App\Models\Contract;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContractedPropertyMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $contract;
    public $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Contract $contract, string $address)
    {
        $this->address = $address;
        $this->contract = $contract;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.contracted-property')->with(['address' => $this->address, 'name' => $this->contract->name]);
    }
}
