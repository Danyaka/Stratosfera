<?php


namespace App\Controller\main;

use App\Entity\User;
use App\Model\Table;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    public $Users;
    public $AuthUser;

    function __construct(){
        $this->Users = new Table();
    }

    public function renderParams(){

        return [
            'title'=> 'ILovePhp',
            'allUsers'=> $this->Users->getRecords(),
            'authUser'=> $this->AuthUser,
            'footerMessage'=> 'Сделано в рамках тестового задания',
        ];
    }

    /**
     * @Route("/")
     */
    public function index(){
        return $this->render('Base/base.html.twig', $this->renderParams());
    }

    /**
     * @return Table
     */
    public function getUsers(): Table
    {
        return $this->Users;
    }
}