<?php 
namespace Mailing;

use Mailing\SendpulseProvider;
use Mailing\AmoCrmProvider;
use Mailing\Post;

class Bot 
{
    private $amo_crm;
    private $sendpulse;

    public function __construct() {
        $this->amo_crm = new AmoCrmProvider();
        $this->sendpulse = new SendpulseProvider();
        $this->post = new Post();
    }

    public function uploadContactsFromAmoCrmToSendpulse() {
        $emails = [];
        $response = $this->amo_crm->getContacts();
        $contacts = json_decode($response);
        foreach ($contacts->_embedded->items as $contact) {
            foreach ($contact->custom_fields as $field) {
                if ($field->name == 'Email') {
                    $emails = array_merge($emails, array_column($field->values, 'value'));
                }
            }
        }
        $this->sendpulse->mails = $emails;
        $this->sendpulse->addEmailToAddressBook();
    }

    public function sendPostsToSendpulseProvider() {
        $material = '<div>';
        $posts = $this->post->getNewPosts();
        foreach ($posts as $post) {
            $material .= '<div>
                <h3>' . $post->title . '</h3>
                <p>' . $post->description . '</p>
                <a href="' . $post->youtube . '">Ссылка на youtube.com</a>
                <a href="' . $post->vc . '">Ссылка на vc.ru</a>
            </div>';
            $this->post->id = $post->id;
            $this->post->setOldPost();
        }
        $material .= '</div>';

        $this->sendpulse->subject = 'Рассылка постов за ' . date('d.m.Y');
        $this->sendpulse->material = $material;
        $this->sendpulse->createCampaign();
    }
}