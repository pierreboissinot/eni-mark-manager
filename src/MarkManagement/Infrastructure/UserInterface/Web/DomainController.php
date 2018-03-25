<?php

namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Pb\MarkManagement\Application\Command\EnterDomain;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DomainController extends Controller
{
    public function enterAction(Request $request)
    {
        $form = $this->createForm(DomainType::class, new EnterDomain());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $markCommand = $form->getData();

            try {
                $this->get('command_bus')->handle($markCommand);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue !');
            }
            return $this->redirectToRoute('domain_list');
        }

        return $this->render('domain/enter.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction(Request $request)
    {
        $domains = $this->get('pb.domain.query')->findAll(
            (int) $request->get('page', 1),
            (int) $request->get('limit', 10)
        );

        return $this->render('domain/list.html.twig', [
            'domains' => $domains
    ]);
    }
}
