<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Finval;
use App\Repository\FinvalRepository;
use App\Entity\Company;
use App\Repository\CompanyRepository;
use App\Entity\Indicator;
use App\Repository\IndicatorRepository;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function index(): Response {
        $entityManager = $this->getDoctrine()->getManager();
        $dql = 'SELECT DISTINCT f.companyID, f.indicatorID from App\Entity\Finval f WHERE f.indicatorID>100';
        $query = $entityManager->createQuery($dql);
        $company_indicator_arr = $query->getResult();
        $company_list = $this->getDoctrine()->getRepository(Company::class)->findAll();
        $indicator_list = $this->getDoctrine()->getRepository(Indicator::class)->findAll();

        return $this->render('home/index.html.twig', [
                    'controller_name' => 'HomeController',
                    'company_indicator_arr' => $company_indicator_arr,
                    'company' => $company_list,
                    'indicator' => $indicator_list,
        ]);
    }

    /**
     * @Route("/reportByCompany/{indicatorID}/{companyID}", name="byCompany")
     */
    public function reportByCompany(int $indicatorID, int $companyID): Response {

        $companyName = $this->getDoctrine()
                ->getRepository(Company::class)
                ->companyName($companyID);
      
        $indicatorName = $this->getDoctrine()
                ->getRepository(Indicator::class)
                ->indicatorName($indicatorID);
       

        $finvalues = $this->getDoctrine()
                ->getRepository(Finval::class)
                ->findByCompany($indicatorID, $companyID);

        foreach ($finvalues as $id => $val) {
            $finvalues[$id]['strDate'] = $finvalues[$id]['reportedDate']->format('Y-m-d');
        }
        $labels = array();
        $data = array();
        $i=0;
        foreach ($finvalues as $id => $val) {
            $labels[$i] =($finvalues[$id]['reportedDate']->format('Y-m-d')).'';
            $data[$i]=$finvalues[$id]['finValue'];
            $i++;
        }
       
        return $this->render('home/reportByCompany.html.twig',
                        ['companyID' => $companyID,
                            'finvalues' => $finvalues,
                            'companyName' => $companyName[0]['companyName'],
                            'indicatorName' => $indicatorName[0]['indicatorName'],
                            'percentage' => $indicatorName[0]['percentage'],
                            'labels' => $labels,
                            'data' => $data,
        ]);
    }

}
