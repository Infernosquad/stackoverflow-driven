<?php

namespace ContentBundle\Form\Type;

use ContentBundle\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title');

        $builder->add('tags', 'collection', array(
            'entry_type'   => TagType::class,
            'allow_add'    => true,
            'label'        => false,
            'allow_delete' => true
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'      => Post::class,
            'csrf_protection' => false,
        ]);
    }

    public function getName()
    {
        return 'content_post';
    }
}