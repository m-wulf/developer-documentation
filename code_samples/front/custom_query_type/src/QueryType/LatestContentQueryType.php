<?php

namespace App\QueryType;

use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query;
use eZ\Publish\Core\QueryType\QueryType;

class LatestContentQueryType implements QueryType
{
    public static function getName()
    {
        return 'LatestContent';
    }

    public function getQuery(array $parameters = [])
    {
        $criteria[] = new Query\Criterion\Visibility(Query\Criterion\Visibility::VISIBLE);
        if (isset($parameters['contentType'])) {
            $criteria[] = new Query\Criterion\ContentTypeIdentifier($parameters['contentType']);
        }

        return new LocationQuery([
            'filter' => new Query\Criterion\LogicalAnd($criteria),
            'sortClauses' => [
                new Query\SortClause\DatePublished(Query::SORT_DESC)
            ],
            'limit' => isset($parameters['limit']) ? $parameters['limit'] : 10,
        ]);
    }

    public function getSupportedParameters()
    {
        return ['contentType', 'limit'];
    }
}
