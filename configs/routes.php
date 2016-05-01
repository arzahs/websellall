<?php
return array(
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'user/register' => 'user/register',
    'article/detail-([0-9]+)' => 'article/one/$1',
    'article/category-([0-9]+)/city-([0-9]+)/page-([0-9]+)' => 'article/category/$1/$2/$3',
    'article/category-([0-9]+)/city-([0-9]+)' => 'article/category/$1/$2',
    'article/category-([0-9]+)' => 'article/category/$1',
    'article/tag-([0-9]+)' => 'article/tag/$1',
    'article/all' => 'article/all',
    'article/add' => 'article/add',
    'article/my/page-([0-9]+)' => 'article/my/$1',
    'article/my' => 'article/my',
    'article/status' => 'article/status',
    '' => 'article/index',
);