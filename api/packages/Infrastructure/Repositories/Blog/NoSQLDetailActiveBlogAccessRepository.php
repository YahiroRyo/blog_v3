<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Aws\DynamoDb\DynamoDbClient;

use Carbon\Carbon;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogAccessRepository;
use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;

final class NoSQLDetailActiveBlogAccessRepository implements DetailActiveBlogAccessRepository {
    private DynamoDbClient $dynamoDbClient;

    public function __construct(DynamoDbClient $dynamoDbClient) {
        $this->dynamoDbClient = $dynamoDbClient;
    }

    public function access(DetailActiveBlogAccess $detailActiveBlogAccess): void {
        $response = $this->dynamoDbClient->updateItem([
            'TableName' => 'blogAccessesSequence',
            'Key'       => [
                'name'  => ['S' => 'sequence'],
            ],
            'UpdateExpression'          => 'SET #currentNumber = #currentNumber + :val',
            'ExpressionAttributeNames'  => ['#currentNumber' => 'currentNumber'],
            'ExpressionAttributeValues' => [':val' => ['N' => '1']],
            'ReturnValues'              => 'UPDATED_NEW'
        ]);

        $this->dynamoDbClient->putItem([
            'TableName' => 'blogAccesses',
            'Item'      => [
                'id'                => ['N' => $response['Attributes']['currentNumber']['N']],
                'blogId'            => ['S' => $detailActiveBlogAccess->blogId()->value()],
                'headers'           => ['S' => $detailActiveBlogAccess->headers()->value()],
                'userAgent'         => ['S' => $detailActiveBlogAccess->userAgent()->value()],
                'referer'           => ['S' => $detailActiveBlogAccess->referer()->value()],
                'from'              => ['S' => $detailActiveBlogAccess->from()->value()],
                'accessedAt'        => ['S' => Carbon::now()->toDateString()],
            ]
        ]);
    }
}
