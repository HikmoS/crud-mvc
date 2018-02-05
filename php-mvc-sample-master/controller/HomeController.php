<?php

/**
 * HelloController
 * Says hello to a person.
 *
 * @author Damien Walsh <me@damow.net>
 */
class HomeController extends GeneralController
{
    /**
     * Say hello to a person.
     * $params will be an array of parameters passed by the Front Controller.
     *
     * For this example, the /hello/<ID> route will pass:
     *
     *      $params[0]  -  The whole route, E.g. /hello/1
     *      $params[1]  -  Just the ID, E.g. 1
     *
     * @param array $params The parameters from the URL.
     */
    public function welcome()
    {

        $persons = new Person();
        $persons = $persons->getUser();
        echo $this->twig->render('anasayfa.twig', array(
            'persons' => $persons,
        ));

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $lname= $_POST['lastname'];
            $fname= $_POST['firstname'];
            $user=[];
            $user[0]=$fname;
            $user[1]=$lname;

        }
        $insertPerson= new Person();
        $insertPerson =$insertPerson->insertUser($user);
    }
}