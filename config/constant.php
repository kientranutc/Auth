<?php
/**
 * Created by Trần Chung Kiên.
 * User: admin
 * Date: 5/28/2018
 * Time: 9:25 AM
 */
return [
    'permission' => [
        'user'=> [
            'title' => 'user',
            'key' => 'user',
            'child'=>[
                'user.index'=> 'List User',
                'user.add'=> 'Add User',
                'user.update' => 'Update User'
            ]
        ],
        'role' => [
            'title' => 'role',
            'key' => 'role',
            'child'=> [
                    'role.index'=> 'List Role',
                    'role.add'=> 'Add Role',
                    'role.update' => 'Update Role'
            ]
        ]
    ]
];