<?php

namespace App\Controller;

use App\Entity\Note;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class NotesController extends AbstractController
{

    /**
     * @Route("/api/note", methods={"GET"})
     */
    public function index()
    {
        $notes = $this->getDoctrine()
            ->getRepository(Note::class)
            ->findAll();

        $responseData = [];

        foreach ($notes as $note) {
            /**
             * @var $note Note
             */
            $responseData[] = $note->toArray();
        }

        return $this->json($responseData);
    }

    /**
     * @Route("/api/note/{id}", methods={"GET","HEAD"})
     */
    public function read(Note $note)
    {
        return $this->json($note->toArray());
    }

    /**
     * @Route("/api/note/{id}", methods="PUT")
     */
    public function update(Note $note, Request $request, EntityManagerInterface $em)
    {
        if ($headline = $request->get('headline')) {
            $note->setHeadline($headline);
        }

        if ($body = $request->get('body')) {
            $note->setBody($body);
        }

        $em->persist($note);
        $em->flush(); // save it to the database

        return $this->json($note->toArray());
    }

    /**
     * @Route("/api/note", methods="POST")
     */
    public function create(Request $request, EntityManagerInterface $em)
    {
        $note = new Note();
        $headline = $request->request->get('headline');
        $body = $request->request->get('body');

        if (!$headline || !$body) {
            throw $this->createNotFoundException(
                'The note headline or body is missing'
            );
        }
        $note->setHeadline($headline);
        $note->setBody($body);

        // May not need to call persist but just in case
        $em->persist($note);
        $em->flush(); // save it to the database

        return $this->json($note->toArray());
    }

    /**
     * @Route("/api/note/{id}", methods="DELETE")
     */
    public function delete(Note $note, EntityManagerInterface $em)
    {
        $em->remove($note);
        $em->flush();
        return $this->json('Note Deleted');
    }
}
