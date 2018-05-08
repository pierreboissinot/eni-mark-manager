<?php

namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Pb\MarkManagement\Application\Command\EditMark;
use Pb\MarkManagement\Application\Command\EnterMark;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MarkController extends Controller
{
    public function enterAction(Request $request): Response
    {
        $form = $this->createForm(MarkType::class, new EnterMark());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $markCommand = $form->getData();

            try {
                $this->get('command_bus')->handle($markCommand);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Une erreur est survenue !');
            }
            return $this->redirectToRoute('mark_list');
        }

        return $this->render('mark/enter.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function listAction(Request $request): Response
    {
        $marks = $this->get('pb.mark.query')->findAll(
            (int) $request->get('page', 1),
            (int) $request->get('limit', 10)
        );

        return $this->render('mark/list.html.twig', [
            'marks' => $marks
        ]);
    }

    public function editAction(Request $request, $id): Response
    {
        $form = $this->createForm(MarkType::class, new EditMark($id));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $markCommand = $form->getData();
            try {
                $this->get('command_bus')->handle($markCommand);
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }
        }

        return $this->render('mark/edit.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
