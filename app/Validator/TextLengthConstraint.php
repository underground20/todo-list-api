<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraints as Assert;

class TextLengthConstraint
{
    /**
     * @Assert\NotBlank(message = "Parameter text should not be blank")
     * @Assert\Length(min = 4, max = 1000, maxMessage = "Text does not much over than {{ limit }} symbols")
     */
    public ?string $text;

    public function __construct($textData)
    {
        $this->text = $textData;
    }

}