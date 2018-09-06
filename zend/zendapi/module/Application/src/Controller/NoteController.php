<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use Zend\Json\Json;
use Doctrine\ORM\EntityManager;
use Application\Entity\Note;
use Application\Entity\Repository\NoteRepository;
use Application\Form\NoteForm;
use Application\InputFilter\FormNoteFilter;

class NoteController extends AbstractRestfulController
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getList()
    {
        $notes = $this->entityManager->getRepository(Note::class)->findAll();

        if (!$notes) {
            return new JsonModel(['message' => 'There are currently no Notes stored.']);
        }

        $data = [];

        foreach($notes as $note) {
            $data[] = $note->toArray();
    	}

        return new JsonModel([
            'notes' => $data,
        ]);
    }

    public function get($id)
    {
        $note = $this->entityManager->getRepository(Note::class)->find($id);

        if (!$note) {
            return new JsonModel(['message' => 'ID not found']);
        }

        return new JsonModel([
            'note' => $note->toArray(),
        ]);
    }

    public function create($data)
    {
        $note = new Note();
        $form = new NoteForm();
        $inputfilter = new FormNoteFilter();
        $form->setInputFilter($inputfilter);
        $form->setData($data);

        if ($form->isValid()) {
            $note->setHeadline($data['headline']);
            $note->setBody($data['body']);
            $this->entityManager->persist($note);
            $this->entityManager->flush();
        } else {
            return new JsonModel([
                'error' => $form->getMessages(),
                'message' => 'Note failed to save'
            ]);
        }

        return new JsonModel([
            'note' => $note->toArray(),
            'message' => 'Note created successfully'
        ]);
    }

    public function update($id, $data)
    {
        if (!$id) {
            return new JsonModel(['message' => 'ID not found']);
        }

        $form  = new NoteForm();
        $inputfilter = new FormNoteFilter();
        $form->setInputFilter($inputfilter);
        $note = $this->entityManager->getRepository(Note::class)->findOneBy(['id' => $id]);
        $form->bind($note);
        $form->setData($data);

        if ($form->isValid()) {
            $this->entityManager->persist($note);
            $this->entityManager->flush();
        } else {
            return new JsonModel([
                'error' => $form->getMessages(),
                'message' => 'Note failed to save'
            ]);
        }

        return new JsonModel([
            'note' => $note->toArray(),
            'message' => 'Note updated successfully'
        ]);
    }

    //@todo implement patch (Only have full update route working)

    public function delete($id)
    {
        if (!$id) {
            return new JsonModel(['message' => 'ID not found']);
        }

        $note = $this->entityManager->getRepository(Note::class)->findOneBy(['id' => $id]);

        if ($note) {
            $this->entityManager->remove($note);
            $this->entityManager->flush();
        }

        return new JsonModel([
            'message' => 'Note deleted successfully'
        ]);
    }
}
