<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Aws\DynamoDb\DynamoDbClient;
use Carbon\Carbon;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogAccessRepository;
use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;
use Illuminate\Support\Str;

final class NoSQLDetailActiveBlogAccessRepository implements DetailActiveBlogAccessRepository {
    private DynamoDbClient $dynamoDbClient;

    public function __construct(DynamoDbClient $dynamoDbClient) {
        $this->dynamoDbClient = $dynamoDbClient;
    }

    public function access(DetailActiveBlogAccess $detailActiveBlogAccess): void {
        $this->dynamoDbClient->putItem([
            'TableName' => 'blogAccesses',
            'Item'      => [
                'id'                => ['S' => (string) Str::uuid()],
                'blogId'            => ['S' => $detailActiveBlogAccess->blogId()->value()],
                'headers'           => ['S' => $detailActiveBlogAccess->headers()->value()],
                'userAgent'         => ['S' => $detailActiveBlogAccess->userAgent()->value()],
                'referer'           => ['S' => $detailActiveBlogAccess->referer()->value()],
                'from'              => ['S' => $detailActiveBlogAccess->from()->value()],
                'accessedAt'        => ['S' => Carbon::now()->toDateTimeString()],
            ]
        ]);
    }
}
