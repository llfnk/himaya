<?php

namespace Feniu\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Feniu\UserBundle\Entity\UserFriends;

/**
 * Description of EmailType
 *
 * @author llewandowski
 */
class AddFriendType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('dodaj przyjaciela', 'submit');
    }

    public function getName() {
        return 'add_friend';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Feniu\UserBundle\Entity\UserFriends'
        ));
    }

}