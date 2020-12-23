<?php

namespace App\Mail;


use App\Orders;
use App\Accounts;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CourierTakenOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Order
     */
    protected $order;
    protected $courier;

    public $subject = 'Заказ уже в пути';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Orders $order, Accounts $courier)
    {
        $this->order = $order;
        $this->courier = $courier;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.courier_taken_order')->with([
            'order' => $this->order,
            'courier' => $this->courier,
        ]);
    }
}
