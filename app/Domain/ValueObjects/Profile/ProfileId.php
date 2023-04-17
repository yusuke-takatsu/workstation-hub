<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Profile;

class ProfileId
{
    /**
     * @var string
     */
    private string $value;

    /**
     * @param  string  $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
      return $this->value;
    }
}