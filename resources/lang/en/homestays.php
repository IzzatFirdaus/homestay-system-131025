<?php

declare(strict_types=1);

return [
    'index' => [
        'title' => 'Homestay Directory',
        'search_placeholder' => 'Search homestays...',
        'negeri_all' => 'All States',
        'status_all' => 'All Statuses',
        'actions' => [
            'create' => 'Add Homestay',
            'edit' => 'Edit',
        ],
        'table' => [
            'name' => 'Name',
            'state' => 'State',
            'status' => 'Status',
            'actions' => 'Actions',
            'empty' => 'No homestay records found.',
        ],
        'pagination_summary' => 'Showing :from to :to of :total records',
    ],
    'form' => [
        'create_title' => 'Create Homestay',
        'edit_title' => 'Update Homestay',
        'fields' => [
            'name' => 'Homestay Name',
            'address' => 'Address',
            'state' => 'State',
            'status' => 'Status',
            'management_model' => 'Management Model',
            'cooperative' => 'Cooperative',
        ],
        'placeholders' => [
            'state' => 'Select a state',
            'cooperative' => 'Select a cooperative',
        ],
        'helpers' => [
            'cooperative_required' => 'Select a cooperative when the management model is cooperative.',
        ],
        'notifications' => [
            'created' => 'Homestay created successfully.',
            'updated' => 'Homestay updated successfully.',
        ],
        'management_models' => [
            'individu' => 'Individual',
            'koperasi' => 'Cooperative',
        ],
    ],
];
