<?php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class FormSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        // return the subscribed events, their methods and priorities
        // Si l'événement à lieu tu appelles la méthode onPreSetData
        return [
            FormEvents::PRE_SET_DATA => 'onPreSetData',
        ];
    }

    public function onPreSetdata(FormEvent $event) : void
    {
        $form = $event->getForm();
        $userRoles = $form->getConfig()->getOption('user_roles');

        if(in_array('ROLE_MANAGER', $userRoles) === true) {
            $form->add('avisManager') ;
            $form->add('commentaireManager') ;
        }

        if(in_array('ROLE_ADMIN', $userRoles) === true) {
            $form->add('avisDrh') ;
            $form->add('commentaireDrh') ;
        }
    }
}