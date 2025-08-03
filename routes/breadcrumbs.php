<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Trang chủ', route('home'));
});

// Trang danh sách sản phẩm
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Sản phẩm', route('products.index'));
});

// Home > Giới thiệu
Breadcrumbs::for('introduction', function ($trail) {
    $trail->push('Trang chủ', route('home')); // or use your route name for home
    $trail->push('Giới thiệu', route('introduction'));
});

// Trang chi tiết sản phẩm
Breadcrumbs::for('products.show', function (BreadcrumbTrail $trail, $productId) {
    $trail->parent('products.index');
    $product = \App\Models\Product::query()->find($productId);
    $trail->push($product->name, route('products.show', $product->id));
});

// Trang sản phẩm (du-an)
Breadcrumbs::for('news.product', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dự án', route('news.product'));
});
