<?php


namespace App\Form;

use App\Entity\Email;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class MessageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sender', EmailType::class,
                [
                    'label' => false,
                    'constraints' => [
                        new NotBlank(),
                    ],
                ]
            )
            ->add('message', TextareaType::class,
                [
                    'label' => false,
                    'constraints' => [
                        new NotBlank(),
                        new Length(['min' => 8]),
                    ],
                ]
            )
            ->add('submit', SubmitType::class,
                [
                    'label' => 'Siųsti',
                    'attr' =>
                        [
                            'class' => 'btn btn-secondary',
                            'style' => 'min-width: 10vw',
                        ],
                ])
            ->getForm();
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Email::class,
            ]
        );
    }
}