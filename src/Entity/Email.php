<?php

namespace App\Entity;

class Email
{
    /**
     * @var string|null $sender
     */
    private $sender;

    /**
     * @var string|null $message
     */
    private $message;

    /**
     * @return string|null
     */
    public function getSender(): ?string
    {
        return $this->sender;
    }

    /**
     * @param string|null $sender
     * @return Email
     */
    public function setSender(?string $sender): Email
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     * @return Email
     */
    public function setMessage(?string $message): Email
    {
        $this->message = $message;

        return $this;
    }
}