<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('navs.backend.dashboard'), route('admin.dashboard'));
});

require __DIR__.'/Search.php';
require __DIR__.'/Access/User.php';
require __DIR__.'/Access/Role.php';
require __DIR__.'/Access/Permission.php';
require __DIR__.'/Page.php';
require __DIR__.'/Setting.php';
require __DIR__.'/Blog_Category.php';
require __DIR__.'/Blog_Tag.php';
require __DIR__.'/Blog_Management.php';
require __DIR__.'/Faqs.php';
require __DIR__.'/Menu.php';
require __DIR__.'/LogViewer.php';

require __DIR__.'/Product.php';
require __DIR__.'/Customerorder.php';
require __DIR__.'/Customerorderdetail.php';
require __DIR__.'/Factory.php';
require __DIR__.'/Purchaseorder.php';
require __DIR__.'/Purchaseorderdetail.php';
require __DIR__.'/Supplier.php';
require __DIR__.'/Warehouse.php';