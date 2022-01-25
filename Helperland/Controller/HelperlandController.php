<?php
class HelperlandController
{
    function __construct()
    {
        include('Models/Connection.php');
        $this->model = new Helperland();
        session_start();
        $_SESSION['error'] = '';
    }
    public function HomePage()
    {
        include("./Views/index.php");
    }

    
    
}
