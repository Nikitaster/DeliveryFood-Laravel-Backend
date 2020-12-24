<?php

namespace App\Mail;

use App\Orders;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCompleteMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    
    /**
     * The rate tokne instance for rating.
     *
     * @var string
     */
    protected $rate_token;
    public $subject = 'Заказ завершен';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $order, $rate_token)
    {
        $this->order = $order;
        $this->rate_token = $rate_token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.order_complete')->with([
            'order' => $this->order,
            'rate_token' => $this->rate_token,
        ]);
    }
}
