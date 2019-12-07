<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\DataAccess\Repository;

use function json_decode;

class StaticUserJsonRepository
{
    private string $filePath;

    private ?array $loadedData = null;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function findAll(): array
    {
        if (null === $this->loadedData) {
            $this->initialize();
        }

        return $this->loadedData;
    }

    private function initialize(): void
    {
        $this->loadedData = json_decode(file_get_contents($this->filePath), true, 512, JSON_THROW_ON_ERROR);
    }
}
