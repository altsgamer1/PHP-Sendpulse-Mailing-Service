<?php 
namespace Mailing;

class AmoCrmProvider 
{
    private $client_id;
    private $client_secret;
    private $access_token;

    public function __construct() {
        $this->authorization();
    }

    public function getContacts() {
        //взял ответ API из официальной документации и положил в файл JSON
        return file_get_contents('json/amocrm_contacts.json');
    }

    private function authorization() {
        //невозможно реализовать в рамках тестового задания
    }
}