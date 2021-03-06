<?php
return [
    'title'=>'站点配置',
    'permission'=>function(){
        return Auth::user()->hasRole("Founder");
    },
    'edit_fields'=>[
        'site_name'=>[
            'title'=>'站点名称',
            'type'=>"text",
            'limit'=>50
        ],
        'contact_email'=>[
            'title'=>'联系人邮箱',
            'type'=>'text',
            'limit'=>50
        ],
        'seo-description'=>[
            'title'=>'SEO - Description',
            'type'=>'textarea',
            'limit'=>250
        ],
        'seo_keyword'=>[
            'title'=>'SEO - Keywords',
            'type'=>'textarea',
            'limit'=>250
        ]
    ],
    'rules' =>[
        'site_name'=>'required|max:50',
        'contact_email'=>'email',
    ],
    'message'=>[
        'site_name.required'=>"请填写站点名称",
        'contact_email.email'=>"请填写正确的联系人邮箱格式"
    ],
    'before_save' => function(&$data){
        if (strpos($data['site_name'],'Powered By LaraBBS') === false){
            $data['site_name'] .= " - Powered By LaraBBS";
        }
    },
    'actions'=>[
        'clear_cache'=>[
            'title'=>'更新系统缓存',
            'message'=>[
                'active'=>'正在清空缓存。。。。',
                'success'=>'缓存已清空。。。。。',
                'error'=>'清理缓存出错。。。。。'
            ],
            'action'=>function(&$data){
                \Illuminate\Support\Facades\Artisan::call("cache:clear");
                return true;
            }
        ]
    ]
];
