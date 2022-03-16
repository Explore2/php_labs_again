<?php

require_once (__DIR__ . '/User.php');
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class Comment
{
    private $user;
    private $text;
    function __construct($user, $text)
    {
        $validator = Validation::createValidator();

        $this->user = $user;
        $violations = $validator->validate($text, [
            new NotBlank(), 
        ]);
        if (count($violations) == 0)
        {
            $this->text = $text;
        }
        else
        {
            foreach ($violations as $violation)
            {
                echo $violation->getMessage() . '<br>';
            }
        }
    }
    function getUser()
    {
        return $this->user;
    }
    function getText()
    {
        return $this->text;
    }
}

