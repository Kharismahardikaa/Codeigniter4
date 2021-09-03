<?php namespace App\models;

use CodeIgniter\Model;

class PostModel extends Model {
    
    protected $table = "posts";

    protected $allowedFields = [
        'title', 'content'
    ];

}