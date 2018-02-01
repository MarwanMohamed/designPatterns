<?php

class BookPrototype
{
    
    protected $title;
    protected $category;


    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
}

class HistoryBook extends BookPrototype
{
    protected $category = 'Bar';
}

class ArtsBook extends BookPrototype
{
    protected $category = 'Foo';
}

$art = new ArtsBook();
$history = new HistoryBook();

for ($i = 1; $i <= 10; $i++) {
    $book = clone $art;
    $book->setTitle('Art Book No ' . $i);
    var_dump($book);
}

for ($i = 1; $i < 10; $i++) {
    $book = clone $history;
    $book->setTitle('History Book No ' . $i);
    var_dump($book);
}

////////////////////////////////////////////////////////////////////////////////////////////

class User
{
    public $name;
    public $age;
    protected $typ;
}

class Support extends User
{
    protected $typ = 'Support';
    public function __clone(){}
}

class Admin extends User
{
    protected $typ = 'Admin';
}


$supports = ['Mohamed', 'Mustafa', 'Eslam'];
$age = [20, 25, 23];

$support = new Support();

for ($i=0; $i < count($supports); $i++) { 
    $support = clone $support;
    $support->name = $supports[$i];
    $support->age = $age[$i];
    var_dump($support); echo "<br>";
}