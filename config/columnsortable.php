<?php

return [

    /*
    spec columns
    */
    'columns'                       => [
        'alpha'   => [
            'rows'  => ['underlying', 'asset_class', 'action', 'status'],
            'class' => 'fa fa-sort-alpha',
        ],
        'amount'  => [
            'rows'  => ['strike', 'profit',],
            'class' => 'fa fa-sort-amount',
        ],
        'numeric' => [
            'rows'  => [ 'id','expiration','open_date', 'close_date'],
            'class' => 'fa fa-sort-numeric',
        ],
    ],

    /*
    defines icon set to use when sorted data is none above (alpha nor amount nor numeric)
     */
    'default_icon_set'              => 'fa fa-sort',

    /*
    icon that shows when generating sortable link while column is not sorted
     */
    'sortable_icon'                 => 'fa fa-sort',

    /*
    generated icon is clickable non-clickable (default)
     */
    'clickable_icon'                => false,

    /*
    icon and text separator (any string)
    in case of 'clickable_icon' => true; separator creates possibility to style icon and anchor-text properly
     */
    'icon_text_separator'           => ' ',

    /*
    suffix class that is appended when ascending order is applied
     */
    'asc_suffix'                    => '-asc',

    /*
    suffix class that is appended when descending order is applied
     */
    'desc_suffix'                   => '-desc',

    /*
    default anchor class, if value is null none is added
     */
    'anchor_class'                  => null,

    /*
    relation - column separator ex: detail.phone_number means relation "detail" and column "phone_number"
     */
    'uri_relation_column_separator' => '.',

    /*
    formatting function applied to name of column, use null to turn formatting off
     */
    'formatting_function'           => 'ucfirst',

    /*
    inject title parameter in query strings, use null to turn injection off
    example: 'inject_title' => 't' will result in ..user/?t="formatted title of sorted column"
     */
    'inject_title_as'               => null,

    /*
    allow request modification, when default sorting is set but is not in URI (first load)
     */
    'allow_request_modification'    => true,

    /*
    default order for: $user->sortable('id') usage
     */
    'default_direction'             => 'desc',

    /*
    default order for non-sorted columns
     */
    'default_direction_unsorted'    => 'asc',

    /*
    join type: join vs leftJoin (default leftJoin)
    for more information see https://github.com/Kyslik/column-sortable/issues/59
    */
    'join_type'                          => 'leftJoin',
];
