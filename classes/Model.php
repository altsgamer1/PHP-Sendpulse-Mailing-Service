<?php 
namespace Mailing;

use mysqli;

class Model
{
    const HOST = 'localhost';
    const DATABASE = 'mailing_service';
    const USERNAME = 'root';
    const PASSWORD = 'root';

    protected $model;

    public function __construct() {
        $this->model = new mysqli(self::HOST, self::USERNAME, self::PASSWORD, self::DATABASE);
    }
}
