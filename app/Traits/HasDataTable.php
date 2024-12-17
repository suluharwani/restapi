<?php

namespace App\Traits;

trait HasDataTable
{
    protected function getDataTableConfig($columns)
    {
        return [
            'columns' => $columns,
            'language' => [
                'emptyTable' => 'No data available',
                'info' => 'Showing _START_ to _END_ of _TOTAL_ entries',
                'infoEmpty' => 'Showing 0 to 0 of 0 entries',
                'infoFiltered' => '(filtered from _MAX_ total entries)',
                'lengthMenu' => 'Show _MENU_ entries',
                'loadingRecords' => 'Loading...',
                'processing' => 'Processing...',
                'search' => 'Search:',
                'zeroRecords' => 'No matching records found'
            ],
            'pageLength' => 10,
            'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, 'All']],
            'order' => [[0, 'desc']]
        ];
    }
}