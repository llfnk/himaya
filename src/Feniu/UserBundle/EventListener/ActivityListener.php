<?php
namespace Feniu\UserBundle\EventListener;

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\HttpKernel;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Model\UserInterface;

/**
 * Listener that updates the last activity of the authenticated user
 */
class ActivityListener
{
    protected $securityContext;
    protected $userManager;

    public function __construct(SecurityContext $securityContext, UserManagerInterface $userManager)
    {
        $this->securityContext = $securityContext;
        $this->userManager = $userManager;
    }

    /**
    * Update the user "lastActivity" on each request
    * @param FilterControllerEvent $event
    */
    public function onCoreController(FilterControllerEvent $event)
    {
        // Check that the current request is a "MASTER_REQUEST"
        // Ignore any sub-request
        if ($event->getRequestType() !== HttpKernel::MASTER_REQUEST) {
            return;
        }

        // Check token authentication availability
        if ($this->securityContext->getToken()) {
            $user = $this->securityContext->getToken()->getUser();

            if ( ($user instanceof UserInterface) && !($user->isActiveNow()) ) {
                $user->setLastActivityAt(new \DateTime());
                $this->userManager->updateUser($user);
            }
        }
    }
}