<?php

namespace App\Tables;

use App\Models\Country as CountryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class Country extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for(): mixed
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('country_code', 'LIKE', "%{$value}%")
                        ->orWhere('name', 'LIKE', "%{$value}%");
                });
            });
        });

        return QueryBuilder::for(CountryModel::orderBy('id','asc'))
            ->defaultSort('id')
            ->allowedSorts(['id','country_code', 'name','created_at'])
            ->allowedFilters(['country_code', 'name', $globalSearch]);
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table): void
    {
        $table
            ->withGlobalSearch(columns: ['id','country_code', 'name'])
            ->column('id', sortable: true)
            ->column('country_code', sortable: true)
            ->column('name', sortable: true)
            ->column('created_at', sortable: true)
            ->column('action')
            ->paginate(8);
    }
}
