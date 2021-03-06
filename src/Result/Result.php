<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOLIT GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\CommandBus\Result;

use Ixocreate\CommandBus\Command\CommandInterface;

final class Result implements ResultInterface
{
    /**
     * @var string
     */
    private $status;

    /**
     * @var CommandInterface
     */
    private $command;

    /**
     * @var array
     */
    private $messages;

    /**
     * Result constructor.
     * @param string $status
     * @param CommandInterface $command
     * @param array $messages
     */
    public function __construct(string $status, CommandInterface $command, array $messages = [])
    {
        $this->status = $status;
        $this->command = $command;
        $this->messages = $messages;
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        return \in_array($this->status, [ResultInterface::STATUS_DONE]);
    }

    /**
     * @return string
     */
    public function status(): string
    {
        return $this->status;
    }

    /**
     * @return CommandInterface
     */
    public function command(): CommandInterface
    {
        return $this->command;
    }

    /**
     * @inheritdoc
     */
    public function messages(): array
    {
        return $this->messages;
    }
}
