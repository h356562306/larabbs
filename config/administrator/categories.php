<?php

return [
  'title'=>'分类',
    'single'=>'分类',
    'model'=>\App\Models\Category::class,
    'action_permissions'=>[
        'delete'=>function(){
            return Auth::user()->hasRole("Founder");
        }
    ],
    'columns' => [
        'id' => [
            'title'=>'ID'
        ],
        'name' => [
            'title'=>'名称',
            'sortable'=>false
        ],
        'description'=>[
            'title'=>'描述',
            'sortable'=>false
        ],
        'operation' => [
            'title'=>'管理',
            'sortable'=>false,
        ]
    ],
    'edit_fields'=>[
        'name'=>[
            'title'=>'名称',
        ],
        'description'=>[
            'title'=>'描述',
            'type'=> 'textarea'
        ]
    ],
    'filters'=>[
        'id'=>[
            'title'=>'分类id'
        ],
        'name'=>[
            'title'=>'名称'
        ],
        'description'=>[
            'title'=>'描述'
        ]
    ],
    'rules'=>[
        'name'=>'required|min:1|unique:categories'
    ],
    'message'=>[
        'name.required'=>'请确保名称在一个字符以上',
        'name.unique'=>'名称已使用'
    ]
];
