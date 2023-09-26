<?php

namespace App\Form;

use App\Entity\DailyResult;
use App\Repository\DailyResultRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\ParentEntityAutocompleteType;

#[AsEntityAutocompleteField]
class DailyResultAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'class' => DailyResult::class,
            'placeholder' => 'Choose a DailyResult',
            'choice_label' => 'value',

            'query_builder' => function(DailyResultRepository $dailyResultRepository) {
                return $dailyResultRepository->createQueryBuilder('dailyResult');
            },
            //'security' => 'ROLE_SOMETHING',
        ]);
    }

    public function getParent(): string
    {
        return ParentEntityAutocompleteType::class;
    }
}
