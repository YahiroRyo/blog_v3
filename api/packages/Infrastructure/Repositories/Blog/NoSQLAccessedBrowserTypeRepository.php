<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Aws\DynamoDb\DynamoDbClient;
use Carbon\Carbon;
use Packages\Domain\Blog\Entities\AccessedBrowserType;
use Packages\Domain\Blog\Entities\ForGetAccessedBrowserType;
use Packages\Domain\Blog\ValueObjects\Browser;
use Packages\Infrastructure\Repositories\Blog\AccessedBrowserTypeRepository;

final class NoSQLAccessedBrowserTypeRepository implements AccessedBrowserTypeRepository {
    private DynamoDbClient $dynamoDbClient;

    public function __construct(DynamoDbClient $dynamoDbClient) {
        $this->dynamoDbClient = $dynamoDbClient;
    }

    public function get(ForGetAccessedBrowserType $forGetAccessedBrowserType): AccessedBrowserType {
        $result = AccessedBrowserType::of([]);

        $response = $this->dynamoDbClient->getItem([
            'TableName' => 'blogAccessesSequence',
            'Key'       => [
                'name'  => ['S' => 'sequence'],
            ]
        ]);

        $response = $this->dynamoDbClient->scan([
            'TableName'                 => 'blogAccesses',
            'FilterExpression'          => '#id BETWEEN :fromId AND :toId AND #blogId = :blogId',
            'ExpressionAttributeNames'  => [
                '#id'       => 'id',
                '#blogId'   => 'blogId'
            ],
            'ExpressionAttributeValues' => [
                ':fromId'               => ['N' => '1'],
                ':toId'                 => ['N' => $response['Item']['currentNumber']['N']],
                ':blogId'               => ['S' => $forGetAccessedBrowserType->blogId()->value()]
            ]
        ]);

        foreach ($response['Items'] as $item) {
            $result = $result->increment(Browser::from($item['browser']['S']));
        }

        return $result;
    }
}
