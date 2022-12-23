<?php

namespace App\Controller\Credit;

use App\Entity\AmortissementFixe;
use App\Repository\AmortissementFixeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route; 
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Persistence\ManagerRegistry;

class AmortissementController extends AbstractController
{
    ///Amortissement Lineaire
    #[Route('/demande/tableau/amortissement', name: 'app_tableau_amortissement')]
    public function lineaire(Request $request ,AmortissementFixeRepository $repoAmortisssement): Response
    {

        /********Les tableau d'amortissement */
        $codecredit = $request->query->get('codecredit');
        $info = $repoAmortisssement->findInfoCredit($codecredit);

       // dd($info);
        $tableau_amortissement = $repoAmortisssement->findAmortissement($codecredit);
        $sumMontant = array_sum(array_column($tableau_amortissement,'principale'));
        $sumInteret = array_sum(array_column($tableau_amortissement,'interet'));
        $sumNet = array_sum(array_column($tableau_amortissement,'montanttTotal'));

        $form = $this->createFormBuilder()
            ->add('submit', SubmitType::class,[
                'label' => 'Terminer',
                'attr' => [
                    'class' => 'btn btn-primary btn-sm'
                ]
            ])
            ->getForm();


    
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()){
            $this->addFlash('success', "Demande de credit terminée !!!!");
            return $this->redirectToRoute('app_demande_credit_new', [], Response::HTTP_SEE_OTHER);

        }
        return $this->render('demande_credit/amortissement/index.html.twig', [
            'info' => $info,
            'amortissement' =>$tableau_amortissement,
            'totalMontant' => $sumMontant,
            'totalInteret' => $sumInteret,
            'totalNet' => $sumNet,
            'form' => $form->createView(),
             'codecredit' => $codecredit,
        ]);
    }

    
    ///Amortissement Lineaire
    #[Route('/demande/tableau/amortissement/annuite_constante', name: 'app_tableau_amortissement_annuite_constante')]
    public function annuite_constante(Request $request,AmortissementFixeRepository $repoAmortisssement): Response
    {

        $codecredit = $request->query->get('codecredit');
        $tableau_amortissement = $repoAmortisssement->findAmortissement($codecredit);

        $info = $repoAmortisssement->findInfoCredit($codecredit);
        //dd($info);


        $form = $this->createFormBuilder()
        ->add('submit', SubmitType::class,[
            'label' => 'Terminer',
            'attr' => [
                'class' => 'btn btn-primary btn-sm'
            ]
        ])
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
                $this->addFlash('success', "Demande de credit terminée !!!!");
                return $this->redirectToRoute('app_demande_credit_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('demande_credit/amortissement/annuite_constante.html.twig', [
            'info' => $info,
            // 'montant' => $montant,
            // 'periode' => $periode,
            // 'tauxInteret' => $taux,
            // 'annuite' => $annuite_constante,
            'tableau_amortissement' => $tableau_amortissement,
            // 'totalMontant' => $sumMontant,
            // 'totalInteret' => $sumInteret,
            'form' => $form->createView(),
        ]);
    }
}
