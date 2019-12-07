<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\Test\Helper;

use function array_filter;
use function http_build_query;

class UriBuilder
{
    private const PATH = '/v1/ads?';

    private array $query = [];

    public function __construct(string $channel)
    {
        $this->query['channel'] = $channel;
    }

    public function withUserType(?string $userType): self
    {
        $this->query['user']['type'] = $userType;

        return $this;
    }

    public function withUserLastLoggedOnMemberType(?string $lastLoggedOnMemberType): self
    {
        $this->query['user']['lastLoggedOnMemberType'] = $lastLoggedOnMemberType;

        return $this;
    }

    public function withUserVisitorId(?string $visitorId): self
    {
        $this->query['user']['visitorId'] = $visitorId;

        return $this;
    }

    public function withUserMemberId(?string $memberId): self
    {
        $this->query['user']['memberId'] = $memberId;

        return $this;
    }

    public function withUserFingerprint(string $fingerprint): self
    {
        $this->query['user']['fingerprint'] = $fingerprint;

        return $this;
    }

    public function withUserIp(string $ip): self
    {
        $this->query['user']['ip'] = $ip;

        return $this;
    }

    public function withLuckyWheelRewardToken(string $luckyWheelRewardToken): self
    {
        $this->query['user']['luckyWheelRewardToken'] = $luckyWheelRewardToken;

        return $this;
    }

    public function getUrl(): string
    {
        $user = array_filter(
            $this->query['user'] ?? [],
            function ($data): bool {
                return null !== $data;
            }
        );

        $querystring = [
            'channel' => $this->query['channel'],
            'user' => $user,
        ];

        return self::PATH . http_build_query($querystring);
    }

    public function __toString(): string
    {
        return $this->getUrl();
    }
}
