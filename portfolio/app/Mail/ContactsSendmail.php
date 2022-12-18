<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactsSendmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $email;
    protected $title;
    protected $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$title,$body)
    {
        // コンストラクタで値を格納
        $this->email = $email;
        $this->title = $title;
        $this->body = $body;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            //メール内容
            //件名
            subject: 'Trip report Sendmail',
            //送信者のemailアドレス
            from: new Address('',$this->email),
            //管理人のemailアドレス
            to: 'nagaikytk4009@gmail.com'
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'finish',
            with: [
                'title' => $this->title,
                'body' => $this->body,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
