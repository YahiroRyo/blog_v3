<?php

namespace App\Console\Commands;

use Aws\DynamoDb\DynamoDbClient;
use Illuminate\Console\Command;
use Packages\Domain\Blog\ValueObjects\UserAgent;

class AddBrowserColumnToBlogAccessesTable extends Command {
    private DynamoDbClient $dynamoDbClient;
    protected $signature   = 'addColumn:blogAccesses:browser';
    protected $description = 'Command description';

    public function __construct(DynamoDbClient $dynamoDbClient) {
        parent::__construct();

        $this->dynamoDbClient = $dynamoDbClient;
    }

    public function handle(): int {
        $response = $this->dynamoDbClient->getItem([
            'TableName' => 'blogAccessesSequence',
            'Key'       => [
                'name'  => ['S' => 'sequence'],
            ]
        ]);

        $response = $this->dynamoDbClient->scan([
            'TableName'                 => 'blogAccesses',
            'FilterExpression'          => '#id BETWEEN :fromId AND :toId',
            'ExpressionAttributeNames'  => [
                '#id'       => 'id',
                '#blogId'   => 'blogId'
            ],
            'ExpressionAttributeValues' => [
                ':fromId'               => ['N' => '1'],
                ':toId'                 => ['N' => $response['Item']['currentNumber']['N']],
            ]
        ]);

        foreach ($response['Items'] as $item) {
            $this->dynamoDbClient->updateItem([
                'TableName' => 'blogAccesses',
                'Key'       => [
                    'id'  => ['N' => $item['id']['N']],
                ],
                'UpdateExpression'          => 'SET #browser = :val',
                'ExpressionAttributeNames'  => ['#browser' => 'browser'],
                'ExpressionAttributeValues' => [':val' => ['S' => UserAgent::of($item['userAgent']['S'])->browser()->value]],
            ]);
        }

        return Command::SUCCESS;
    }
}
