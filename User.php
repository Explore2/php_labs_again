<?php
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Validation;

class User
{
    private $id = 0;
    private $name = "null";
    private $email = "null";
    private $password = "null";

    private $creationDate;
    function __construct($id, $name, $email, $password)
    {
        $validator = Validation::createValidator();
        $violations = $validator->validate($id, [new NotBlank() , new GreaterThanOrEqual(
            ['value' => 0]) , ]);

        if (count($violations) == 0)
        {
            $this->id = $id;
        }
        else
        {
            foreach ($violations as $vialation)
            {
                echo $vialation->getMessage() . '<br>';
            }
        }
        $violations = $validator->validate($name, [new NotBlank() , new Length(['min' => 2]) ]);
        if (count($violations) == 0)
        {
            $this->name = $name;
        }
        else
        {
            foreach ($violations as $vialation)
            {
                echo $vialation->getMessage() . '<br>';
            }
        }
        $violations = $validator->validate($email, [new NotBlank() , new Email() , ]);
        if (count($violations) == 0)
        {
            $this->email = $email;
        }
        else
        {
            foreach ($violations as $vialation)
            {
                echo $vialation->getMessage() . '<br>';
            }
        }
        $violations = $validator->validate($password, [new NotBlank() , new Length(['min' => 8]) , new Length(['max' => 32]) , ]);
        if (count($violations) == 0)
        {
            $this->password = $password;
        }
        else
        {
            foreach ($violations as $vialation)
            {
                echo $vialation->getMessage() . '<br>';
            }
        }
        $this->creationDate = new DateTime();
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }
}

