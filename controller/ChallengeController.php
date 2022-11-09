
<?php

class ChallengeController extends ChallengeDAO
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Asigno los challenges a una variable que estará esperando la vista
        $challenges = $this->getChallenge();
        //Le paso los datos a la vista
        require("view/Challenge.php");
    }
}
