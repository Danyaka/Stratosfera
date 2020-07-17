<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Login;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Password;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $PlainPassword;

    public function setId(int $Id):self
    {
        $this->id = $Id;
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): self
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getPlainPassword(): ?string
    {
        return $this->PlainPassword;
    }

    public function setRepeatedPassword(string $PlainPassword): self
    {
        $this->PlainPassword = $PlainPassword;

        return $this;
    }


    public static function CreateTestList(){
        $user1 = new User();
        $user1->setId(1);
        $user1->setLogin('danya1313');
        $user1->setPassword('12345677');

        $user2 = new User();
        $user2->setId(2);
        $user2->setLogin('margku');
        $user2->setPassword('10wo29qp');

        $user3 = new User();
        $user3->setId(3);
        $user3->setLogin('super_lex');
        $user3->setPassword('tratata79');



        return [ $user1, $user2, $user3 ];
    }

}
