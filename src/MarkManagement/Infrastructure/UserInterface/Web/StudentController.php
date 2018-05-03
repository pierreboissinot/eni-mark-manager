<?php
namespace Pb\MarkManagement\Infrastructure\UserInterface\Web;

use Pb\MarkManagement\Application\Command\EnterStudent;
use Ramsey\Uuid\UuidInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends Controller
{
    public function listAction(Request $request): Response
    {
        $students = $this->get('pb.student.query')->findAll(
            (int) $request->get('page', 1),
            (int) $request->get('limit', 10)
        );
        return $this->render('student/list.html.twig', [
                'students' => $students
            ]);
    }

    public function enterAction(Request $request): Response
    {
        $form = $this->createForm(StudentType::class, new EnterStudent());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $studentCommand = $form->getData();
            try {
                $this->get('command_bus')->handle($studentCommand);
            } catch (\Exception $e) {
                $this->addFlash('error', $e->getMessage());
            }

            return $this->redirectToRoute('student_list');
        }

        return $this->render('student/enter.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function academicTranscriptAction(Request $request, string $id): Response
    {
	    $domains = $this->get('pb.academic_transcript.query')->find($id);
	    return $this->render('student/academic_transcript.html.twig', [
		    'domains' => $domains
	    ]);
    }
}
