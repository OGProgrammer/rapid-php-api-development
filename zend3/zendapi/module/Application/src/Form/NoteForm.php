<?php

namespace Application\Form;

use Zend\Form\Form;

class NoteForm extends Form
{
    public function __construct($name = 'note', $options = array())
    {
        parent::__construct($name, $options);

        $this->add([
            'name' => 'id',
            'attributes' => [
                'type'  => 'hidden',
            ],
        ]);

        $this->add([
            'name' => 'headline',
            'attributes' => [
                'type'  => 'text',
            ],
            'options' => [
                'label' => 'Headline',
            ],
        ]);

		$this->add([
            'name' => 'body',
            'attributes' => [
                'type'  => 'text',
            ],
            'options' => [
                'label' => 'Body',
            ],
        ]);
	}
}
