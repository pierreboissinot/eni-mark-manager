<?php
declare(strict_types=1);

namespace Pb\MarkManagement\Infrastructure\Framework;

use Pb\MarkManagement\Domain\Event\MarkEntered;
use Symfony\Component\HttpFoundation\Session\Session;

final class FlashMessageSubscriber
{
    /** @var Session */
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * @param MarkEntered $event
     */
    public function sendHiredFlashMassage(MarkEntered $event)
    {
        $this->sendFlashMessage(
            sprintf('%s new mark entered %s!', $event->getMarkValue(), $event->getMarkId())
        );
    }

    /**
     * @param string $message
     */
    private function sendFlashMessage(string $message)
    {
        $this->session->getFlashBag()->add('success', $message);
    }
}
