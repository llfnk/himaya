<?php

namespace Feniu\FrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Feniu\UserBundle\Entity\UserMails;

/**
 * Description of EmailType
 *
 * @author llewandowski
 */

//CKEDITOR.editorConfig = function( config ) {
//	config.toolbarGroups = [
//		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
//		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
//		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
//		{ name: 'forms', groups: [ 'forms' ] },
//		'/',
//		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
//		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
//		{ name: 'links', groups: [ 'links' ] },
//		{ name: 'insert', groups: [ 'insert' ] },
//		'/',
//		{ name: 'styles', groups: [ 'styles' ] },
//		{ name: 'colors', groups: [ 'colors' ] },
//		{ name: 'tools', groups: [ 'tools' ] },
//		{ name: 'others', groups: [ 'others' ] },
//		{ name: 'about', groups: [ 'about' ] }
//	];




class MailType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('to', 'text', array( 'attr' => array('placeholder' => 'Nazwisko odbiorcy*', 'id' => 'mailtag')))
                ->add('text', 'ckeditor', array(
    'config' => array(
        'toolbar' => array(
            '/',
            array(
                'name'  => 'office2013',
                'items' => array('Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat', 'Smiley', 'Image', 'Flash'),
            ),
            array(
                
                'name' => 'colors',
                'items' => array('colors'),
                
                
            )
            
        ),
        'uiColor' => '#ffffff',
        //...
    ),
))
                ->add('wyslij', 'submit');
    }

    public function getName() {
        return 'user_email';
    }

//    public function setDefaultOptions(OptionsResolverInterface $resolver) {
//        $resolver->setDefaults(array(
//            'data_class' => 'Feniu\UserBundle\Entity\UserMails'
//        ));
//    }

}


