<?php
declare(strict_types=1);

namespace StepTheFkUp\Pagination\Tests\Resolvers;

use StepTheFkUp\Pagination\Resolvers\StartSizeAsArrayInQueryResolver;
use StepTheFkUp\Pagination\Tests\AbstractResolversTestCase;

final class StartSizeAsArrayInQueryResolverTest extends AbstractResolversTestCase
{
    /**
     * StartSizeAsArrayInQueryResolver should resolve pagination data successfully with custom config.
     *
     * @return void
     */
    public function testCustomConfigResolveSuccessfully(): void
    {
        $config = $this->createConfig('page', null, 'perPage');
        $data = (new StartSizeAsArrayInQueryResolver($config, 'page'))->resolve($this->createServerRequest([
            'page' => [
                'page' => 5,
                'perPage' => 100
            ]
        ]));

        self::assertEquals(5, $data->getStart());
        self::assertEquals(100, $data->getSize());
    }

    /**
     * StartSizeAsArrayInQueryResolver should return data with defaults if query attribute not an array.
     *
     * @return void
     */
    public function testDefaultWhenQueryAttrNotArray(): void
    {
        $config = $this->createConfig();
        $data = (new StartSizeAsArrayInQueryResolver($config, 'page'))->resolve($this->createServerRequest([
            'page' => 'im-not-an-array'
        ]));

        self::assertEquals($config->getStartDefault(), $data->getStart());
        self::assertEquals($config->getSizeDefault(), $data->getSize());
    }

    /**
     * StartSizeAsArrayInQueryResolver should return data with defaults if query attribute not set.
     *
     * @return void
     */
    public function testDefaultWhenQueryAttrNotSet(): void
    {
        $config = $this->createConfig();
        $data = (new StartSizeAsArrayInQueryResolver($config, 'page'))->resolve($this->createServerRequest());

        self::assertEquals($config->getStartDefault(), $data->getStart());
        self::assertEquals($config->getSizeDefault(), $data->getSize());
    }
}
