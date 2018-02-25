<?php

namespace App\Froms;

use Kris\LaravelFormBuilder\Form;

class ScheidsrechterForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('approved', 'submit', [
                'label' => 'Goedgekeurd',
                'attr' => [
                    'name' => 'gehaald',
                    'value' => 'approved',
                ],
            ])
            ->add('disapproved', 'submit', [
                'label' => 'Afgekeurd',
                'attr' => [
                    'name' => 'gehaald',
                    'value' => 'disapproved',
                ],
            ]);
    }
}
