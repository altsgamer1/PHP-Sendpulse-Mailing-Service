<?php 
namespace Mailing;

use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;

class SendpulseProvider 
{
    public $subject;
    public $material;
    public $mails;
    private $sender_name = 'Assylkhan Myrzaliyev';
    private $sender_email = 'assylkhan.mm@gmail.com';
    private $list_id = 105301;
    private $client_id = '9995c92edb9ec6db2d02dda87ad094b8';
    private $secret = 'b236c89c525e0bc80a0ec1808c1404a7';
    private $sendpulse;

    public function __construct() {
        $this->sendpulse = new ApiClient($this->client_id, $this->secret, new FileStorage());
    }

    public function addEmailToAddressBook() {
        $this->sendpulse->addEmails($this->list_id, $this->mails, []);
    }

    public function createCampaign() {
        $this->sendpulse->createCampaign(
            $this->sender_name,
            $this->sender_email,
            $this->subject,
            $this->material,
            $this->list_id
        );
    }
}