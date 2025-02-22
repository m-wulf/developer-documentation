# Random Sort Clause

The [`Random` Sort Clause](https://github.com/ezsystems/ezplatform-kernel/blob/v1.0.0/eZ/Publish/API/Repository/Values/Content/Query/SortClause/Random.php)
orders search results randomly.

## Arguments

- `seed` (optional) - int representing the random seed
- `sortDirection` (optional) - Query or LocationQuery constant, either `Query::SORT_ASC` or `Query::SORT_DESC`.

## Limitations

The `Random` Sort Clause is not available in [Repository filtering](../../../api/public_php_api_search.md#repository-filtering).
In Elasticsearch engine, you cannot combine the `Random` Sort Clause with any other Sort Clause.

## Example

``` php
$query = new LocationQuery();
$query->sortClauses = [new SortClause\Random()];
```
