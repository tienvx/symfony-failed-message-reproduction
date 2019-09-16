<?php

namespace App\MessageHandler;

use App\Message\FailedMessage;
use Exception;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class FailedMessageHandler implements MessageHandlerInterface
{
    public function __invoke(FailedMessage $message)
    {
        throw new Exception('Something wrong happened!');
    }
}
