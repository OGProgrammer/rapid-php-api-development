<?php

namespace Application\InputFilter;

use Zend\InputFilter\InputFilter;

class FormNoteFilter extends InputFilter
{
	public function __construct()
	{
	    $this->add([
            'name'       => 'id',
            'required'   => false,
            'allowEmpty' => false,
            'filters'    => [
            ],
            'validators' => [
            ],
        ]);

        $this->add([
			'name' => 'headline',
			'required' => true,
			'allowEmpty' => true,
			'filters' => [
				['name' => 'StringTrim'],
			],
			'validators' => [
				[
					'name' => 'StringLength',
					'options' => [
						'min' => 4,
						'max' => 255,
					],
				],
			],
		]);

		$this->add([
			'name' => 'body',
			'required' => true,
			'allowEmpty' => true,
			'filters' => [
				['name' => 'StringTrim'],
			],
			'validators' => []
		]);
	}
}
