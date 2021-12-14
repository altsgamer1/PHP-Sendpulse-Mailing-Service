<?php 
namespace Mailing;

class Post extends Model
{
    const TABLENAME = 'posts';
    
    public $title;
    public $description;
    public $youtube;
    public $vc;
    public $not_returnable;
    public $id = 0;
    private $new = 1;
    private $created;
    private $modified;

    public function __construct() {
        parent::__construct();
    }

    public function save() {
        $this->created = date('Y-m-d H:i:s');
        $this->modified = date('Y-m-d H:i:s');

        $stmt = $this->model->prepare("INSERT INTO " . self::TABLENAME . " VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('issssiiss', $this->id, $this->title, $this->description, $this->youtube, $this->vc, $this->not_returnable, $this->new, $this->created, $this->modified);
        $stmt->execute();
    }

    public function getNewPosts() {
        $posts = [];
        $new_result = $this->model->query("
            SELECT * FROM (SELECT * FROM " . self::TABLENAME . " WHERE new = 1 LIMIT 4) p1
            UNION 
            SELECT * FROM (SELECT * FROM " . self::TABLENAME . " WHERE new = 0 AND not_returnable = 0) p2
            ORDER BY modified ASC
            LIMIT 4
        ");
        while ($row = $new_result->fetch_object()){
            $posts[] = $row;
        }
        return $posts;
    }

    public function setOldPost() {
        $stmt = $this->model->prepare("UPDATE " . self::TABLENAME . " SET new = 0 WHERE id = ?");
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
    }

    public function setNewPostAfterNineMonths() {
        
    }
}