<?php


namespace App\Controller\users;


use App\Controller\main\BaseController;
use App\Entity\User;
use App\Form\UserCreateFormType;
//use http\Env\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Validator\Constraints\UserPassword;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DbController extends BaseController
{
    /**
     * @Route("/Users/CreatingUser", name="user_create")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return RedirectResponse|Response
     */
    public function createUser(Request $request, UserPasswordEncoderInterface $passwordEncoder){
        $user = new User();
        $table = parent::getUsers();


        $form = $this->createForm(UserCreateFormType::class, $user);
        $form->handleRequest($request);

        if(($form->isSubmitted()) && ($form->isValid())){
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setId((int)array_key_last($table) + 1);
            $user->setRepeatedPassword($password);

            $table->addRecord($user);

            return $this->redirectToRoute('load_table');
        }

        $renderParams = parent::renderParams();
        $renderParams['title'] = 'Создание пользователя';
        $renderParams['form'] = $form->createView();

        return $this->render('user/create.html.twig', $renderParams);
    }
}