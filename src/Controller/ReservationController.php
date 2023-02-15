<?php 
namespace app\Controller;

use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
use symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ReservationController extends AbstractController
{

    public function reserver(Request $request): Response 
    {   
        return $this->render('reservation.html.twig');
    }
  
}