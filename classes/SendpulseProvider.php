<?php 
namespace Mailing;

use Sendpulse\RestApi\ApiClient;
use Sendpulse\RestApi\Storage\FileStorage;

class SendpulseProvider 
{
    public $subject;
    public $material;
    public $mails;
    private $sender_name = 'Имя отправителя';
    private $sender_email = 'Email отправителя';
    private $list_id = 105301;
    private $client_id = 'ID приложения';
    private $secret = 'Секретный ключ приложения';
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
