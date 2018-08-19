<?php
/**
 * Created by IntelliJ IDEA.
 * User: tsa
 * Date: 8/18/18
 * Time: 8:06 AM
 */

namespace App\Controller;


class NotesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $notes = $this->Notes->find('all');
        $this->set([
            'notes' => $notes,
            '_serialize' => ['notes']
        ]);
    }

    public function view($id)
    {
        $note = $this->Notes->get($id);
        $this->set([
            'note' => $note,
            '_serialize' => ['note']
        ]);
    }

    public function add()
    {
        $note = $this->Notes->newEntity($this->request->getData());
        if ($this->Notes->save($note)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'note' => $note,
            '_serialize' => ['message', 'note']
        ]);
    }

    public function edit($id)
    {
        $note = $this->Notes->get($id);
        if ($this->request->is(['post', 'put'])) {
            $note = $this->Notes->patchEntity($note, $this->request->getData());
            if ($this->Notes->save($note)) {
                $message = 'Saved';
            } else {
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }

    public function delete($id)
    {
        $note = $this->Notes->get($id);
        $message = 'Deleted';
        if (!$this->Notes->delete($note)) {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            '_serialize' => ['message']
        ]);
    }
}
