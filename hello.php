<?php

use Symfony\Component\Validator\Constraints\Date;

require_once(__DIR__.'/User.php');
    require_once(__DIR__.'/Comment.php');
    require_once(__DIR__.'/vendor/autoload.php');
    $user1 = new User(0, "name1", "user1@yandex.ru", "1234dfad");
    $datetime = new DateTime();
    echo $datetime->format("Y-m-d H-m-s").'<br>';
    $user2 = new User(1, "name2", "user2@yandex.ru", "1234dfad");
    $user3 = new User(2, "name3", "user3@yandex.ru", "1234dfad");
    
    $comment1 = new Comment($user1, "text from user1");
    $comment2 = new Comment($user2, "text from user2");
    $comment3 = new Comment($user3, "text from user3");
    $comments = [$comment1, $comment2, $comment3];
    foreach($comments as $com){
        if($com->getUser()->getCreationDate() > $datetime){
            echo $com->getText().'<br>';
        }
        
    }