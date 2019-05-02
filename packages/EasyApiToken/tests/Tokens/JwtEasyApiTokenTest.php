<?php
declare(strict_types=1);

namespace LoyaltyCorp\EasyApiToken\Tests\Tokens;

use LoyaltyCorp\EasyApiToken\Exceptions\InvalidArgumentException;
use LoyaltyCorp\EasyApiToken\Tests\AbstractTestCase;
use LoyaltyCorp\EasyApiToken\Tokens\JwtEasyApiToken;

final class JwtEasyApiTokenTest extends AbstractTestCase
{
    /**
     * JwtEasyApiToken should return identical payload as input.
     *
     * @return void
     */
    public function getPayloadSuccessfully(): void
    {
        $payload = ['claim' => 'claim'];

        self::assertEquals($payload, (new JwtEasyApiToken($payload))->getPayload());
    }

    /**
     * JwtEasyApiToken should return expected claim value.
     *
     * @return void
     *
     * @throws \LoyaltyCorp\EasyApiToken\Exceptions\InvalidArgumentException
     */
    public function testGetClaimSuccessfully(): void
    {
        self::assertEquals('claim', (new JwtEasyApiToken(['claim' => 'claim']))->getClaim('claim'));
    }

    /**
     * JwtEasyApiToken should check successfully if claim exists.
     *
     * @return void
     */
    public function testHasClaimSuccessfully(): void
    {
        $token = new JwtEasyApiToken(['claim' => 'claim']);

        self::assertTrue($token->hasClaim('claim'));
        self::assertFalse($token->hasClaim('invalid'));
    }

    /**
     * JwtEasyApiToken should throw an exception when getting a claim which doesn't exist.
     *
     * @return void
     *
     * @throws \LoyaltyCorp\EasyApiToken\Exceptions\InvalidArgumentException
     */
    public function testInvalidClaimException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new JwtEasyApiToken([]))->getClaim('invalid');
    }
}

\class_alias(
    JwtEasyApiTokenTest::class,
    'StepTheFkUp\EasyApiToken\Tests\Tokens\JwtEasyApiTokenTest',
    false
);