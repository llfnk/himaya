<?php

namespace Feniu\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Feniu\UserBundle\Entity\UserData;

/**
 * Description of EmailType
 *
 * @author llewandowski
 */
class UserDataType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array( 'attr' => array('placeholder' => 'Twoje imie*', 'id' => 'mailtag')))
                ->add('surname', 'text', array( 'attr' => array('placeholder' => 'Twoje nazwisko *', 'id' => 'mailtag')))
                ->add('zapisz', 'submit');
    }

    public function getName() {
        return 'user_data';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Feniu\UserBundle\Entity\UserData'
        ));
    }

}