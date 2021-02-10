<?php

namespace App\Service;

use App\Validator\TextLengthConstraint;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorService
{
    private ValidatorInterface $validator;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param TextLengthConstraint $data
     * @return ConstraintViolationListInterface
     */
    public function validate(TextLengthConstraint $data): ConstraintViolationListInterface
    {
        return $this->validator->validate($data);
    }

    /**
     * @param ConstraintViolationListInterface $errors
     * @return mixed 
     */
    public function getErrorMessage(ConstraintViolationListInterface $errors)
    {
        $message = null;
        foreach ($errors as $error) {
            $message = $error->getMessage();
        }
        return $message;
    }
}