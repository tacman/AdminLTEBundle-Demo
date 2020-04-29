<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use KevinPapst\AdminLTEBundle\Event\KnpMenuEvent;

class SurvosMenuSubscriber implements EventSubscriberInterface
{
    public function onSidebarEvent(KnpMenuEvent $event)
    {
        $menu = $event->getMenu();
        $childOptions = $event->getChildOptions();

        $publicMenu = $menu->addChild('public', [
            'childOptions' => $childOptions,
        ]);
        $publicMenu->addChild('public_surveys',
            [
                'childOptions' => $childOptions,
                'route' => 'app'])
            ->setAttribute('icon', 'fas fa-home');

        $publicMenu->addChild('survos_landing', [
            'childOptions' => $childOptions,
            'route' => 'app'])
            ->setAttribute('icon', 'fas fa-home');

        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            KnpMenuEvent::class => 'onSidebarEvent',
        ];
    }
}
