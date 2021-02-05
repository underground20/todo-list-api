<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @@ORM\Table(name="tasks")
 */
class Task implements \JsonSerializable
{
    public const STATUS_IN_WORK = 0;
    public const STATUS_DONE = 1;

    private const TEXT_MAX_LENGTH = 1000;
    /**
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=1000, nullable=false)
     */
    private string $text;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default" : 0})
     */
    private int $status;

    public function getId()
    {
        return $this->id;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        if (mb_strlen($text) < self::TEXT_MAX_LENGTH) {
            $this->text = $text;
        } else {
            throw new \InvalidArgumentException('Parameter text over than ' . self::TEXT_MAX_LENGTH . ' symbols', 404);
        }
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatusActive()
    {
        $this->status = self::STATUS_IN_WORK;
    }

    public function setStatusDone()
    {
        $this->status = self::STATUS_DONE;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->getId(),
            'text' => $this->getText(),
        ];
    }
}