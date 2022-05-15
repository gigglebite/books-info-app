<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BooksInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'author',
        'description',
        'year'
    ];


    public function getId(){
        return $this->id;
    }

    public function getBookTitle(){
        return $this->book_title;
    }

    public function getAuthor(){
        return $this->author;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getYear(){
        return $this->year;
    }

    public function setBookTitle($value){
        $this->book_title = $value;
        return $this->save();

    }

    public function setAuthor($value){
        $this->author = $value;
        return $this->save();
    }

    public function setDescription($value){
        $this->description = $value;
        return $this->save();
    }

    public function setYear($value){
        $this->year = $value;
        return $this->save();
    }
}
