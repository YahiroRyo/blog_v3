<?php

namespace Packages\Infrastructure\Repositories\Blog;

use Aws\DynamoDb\DynamoDbClient;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cookie;
use Packages\Infrastructure\Repositories\Blog\DetailActiveBlogAccessRepository;
use Packages\Domain\Blog\Entities\DetailActiveBlogAccess;

final class NoSQLDetailActiveBlogAccessRepository implements DetailActiveBlogAccessRepository {
    private DynamoDbClient $dynamoDbClient;

    public function __construct(DynamoDbClient $dynamoDbClient) {
        $this->dynamoDbClient = $dynamoDbClient;
    }

    public function access(DetailActiveBlogAccess $detailActiveBlogAccess): void {
        $blog = DB::selectOne('
            SELECT
                blogId
            FROM
                blogs
            WHERE
                blogId = ?
        ', [$detailActiveBlogAccess->blogId()->value()]);

        if (!$blog) {
            throw new ModelNotFoundException('ブログが存在しません');
        }

        session()->put("accessed/blogs/{$detailActiveBlogAccess->blogId()->value()}", true);

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
                'browser'           => ['S' => $detailActiveBlogAccess->userAgent()->browser()->value],
                'userAgent'         => ['S' => $detailActiveBlogAccess->userAgent()->value()],
                'referer'           => ['S' => $detailActiveBlogAccess->referer()->value()],
                'from'              => ['S' => $detailActiveBlogAccess->from()->value()],
                'accessedAt'        => ['S' => Carbon::now()->toDateString()],
            ]
        ]);
    }
}
