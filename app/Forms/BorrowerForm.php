<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class BorrowerForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('title', 'text', [
                'label' => 'Post title',
                'rules' => 'required|min:5',
                'error_messages' => [
                    'title.required' => 'The title field is mandatory.'
                ]
            ])
            ->add('lyrics', 'textarea')
	    ->add('publish', 'checkbox')
   	    ->add('submit', 'submit', ['label' => 'Save form'])
	    ->add('clear', 'reset', ['label' => 'Clear form']);
    }
}
