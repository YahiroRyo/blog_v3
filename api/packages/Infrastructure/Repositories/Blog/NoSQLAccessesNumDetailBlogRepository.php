<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Aws\DynamoDb\DynamoDbClient;
use Carbon\Carbon;
use Packages\Domain\Blog\Entities\AccessesNumDetailBlog;
use Packages\Domain\Blog\ValueObjects\Access;
use Packages\Domain\Blog\ValueObjects\AccessDate;
use Packages\Domain\Blog\ValueObjects\AccessesNum;
use Packages\Domain\Blog\ValueObjects\AccessList;
use Packages\Infrastructure\Repositories\Blog\AccessesNumDetailBlogRepository;

final class NoSQLAccessesNumDetailBlogRepository implements AccessesNumDetailBlogRepository {
    private DynamoDbClient $dynamoDbClient;

    public function __construct(DynamoDbClient $dynamoDbClient) {
        $this->dynamoDbClient = $dynamoDbClient;
    }

    public function get(AccessesNumDetailBlog $accessesNumDetailBlog): AccessList {
        $result = AccessList::of([]);

        $date = $accessesNumDetailBlog->start()->value()->diffInDays($accessesNumDetailBlog->end());
        for ($i = 0; $i < $date; $i++) {
            $result = $result->add(new Access(
                AccessDate::of((new Carbon($accessesNumDetailBlog->start()))->addDays($i)->toDateString()),
                AccessesNum::of(0)
            ));
        }

        $response = $this->dynamoDbClient->getItem([
            'TableName'                 => 'blogAccesses',
            'KeyConditionExpression'    => '#id = :blogId',
            'ExpressionAttributeValues' => ['blogId' => $accessesNumDetailBlog->blogId()->value()],
        ]);

        foreach ($response['Items'] as $item) {
            $result = $result->increment(AccessDate::of($item['accessedAt']));
        }

        return $result;
    }
}
