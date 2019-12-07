<?php declare(strict_types=1);

namespace Wazelin\TestTakersApi\User\Business\Domain;

use Wazelin\TestTakersApi\User\Business\Domain\User\Gender;

class User
{
    private int $id;
    private string $login;
    private string $password;
    private string $title;
    private string $firstName;
    private string $lastName;
    private Gender $gender;
    private string $email;
    private string $pictureUri;
    private string $address;

    public function __construct(
        int $id,
        string $login,
        string $password,
        string $title,
        string $firstName,
        string $lastName,
        Gender $gender,
        string $email,
        string $pictureUri,
        string $address
    ) {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
        $this->email = $email;
        $this->pictureUri = $pictureUri;
        $this->address = $address;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): Gender
    {
        return $this->gender;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPictureUri(): string
    {
        return $this->pictureUri;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function hasSimilarName(string $value): bool
    {
        return strpos($this->firstName, $value) !== false
            || strpos($this->lastName, $value) !== false;
    }
}
