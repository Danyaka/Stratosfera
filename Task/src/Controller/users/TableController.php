<?php


namespace App\Controller\users;


use App\Controller\main\BaseController;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;

class TableController extends BaseController
{
    /**
     * @Route("/Users", methods={"GET"}, name="load_table")
     */
    public function index(){

        foreach (User::CreateTestList() as $user){
            parent::getUsers()->addRecord($user);
        }

        $params = parent::renderParams();
        $params['title'] = 'Пользователи';

        return $this->render('user/table.html.twig', $params);
    }


}