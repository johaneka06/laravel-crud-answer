<?php

namespace App\Mail;

use App\Item;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewItemNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $items;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('mailer@crud.com')
            ->view('views.mail.email')
            ->with([
                'name' => $this->items->name,
                'stock' => $this->items->stock,
                'price' => $this->items->price
            ]);
    }
}
