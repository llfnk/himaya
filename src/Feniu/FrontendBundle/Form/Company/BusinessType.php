<?php

namespace Feniu\FrontendBundle\Form\Company;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Feniu\CompanyBundle\Entity\Business;

/**
 * Description of CompanyType
 *
 * @author llewandowski
 */
class BusinessType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array('attr' => array('placeholder' => 'Twoje imie*', 'id' => 'mailtag')))
                ->add('foo_choices', 'choice', array(
                    'choices' => array('foo' => 'Foo', 'bar' => 'Bar', 'baz' => 'Baz'),
                    'preferred_choices' => array('baz'),
                ))
                ->add('zapisz', 'submit');
    }

    public function getName() {
        return 'company';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'data_class' => 'Feniu\CompanyBundle\Entity\Business'
//        ));
    }

}
