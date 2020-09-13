<?php

use App\Model\Admin\Category;
use App\Model\Admin\Exhibition;
use App\Model\Admin\OfferComponents;
use App\Model\Admin\Offers;
use App\Model\Admin\Paintings;
use App\Model\Admin\PermissionComponents;
use App\Model\Admin\Permissions;
use App\Model\Admin\Role;
use App\Model\Customer\Order;
use App\User;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// home page
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// breadcrumbs for permission components
// for index page
Breadcrumbs::for('permission_component.index', function($trail) {
    $trail->parent('home');
    $trail->push('Permission Components', route('permission_component.index'));
});

// create breadcrumbs for permission components
Breadcrumbs::for('permission_component.create', function($trail){
    $trail->parent('permission_component.index');
    $trail->push('Add Permission Component', route('permission_component.create'));
});

// breadcrumb to edit permission components
Breadcrumbs::for('permission_component.edit', function ($trail, $id) {
    $permissionCom = PermissionComponents::find($id);
    $trail->parent('permission_component.index');
    $trail->push($permissionCom->permission_component, route('permission_component.edit', $permissionCom->permission_component));
});

// Role Breadcrumb
// for index page
Breadcrumbs::for('role.index', function($trail) {
    $trail->parent('home');
    $trail->push('Roles', route('role.index'));
});

// for adding new role
Breadcrumbs::for('role.create', function($trail){
    $trail->parent('role.index');
    $trail->push('Add Role', route('role.create'));
});

// for editing roles
Breadcrumbs::for('role.edit', function ($trail, $id) {
    $role = Role::find($id);
    $trail->parent('role.index');
    $trail->push($role->role, route('role.edit', $role->role));
});

// Permission Breadcrumb
// for index page of permission
Breadcrumbs::for('permission.index', function($trail) {
    $trail->parent('home');
    $trail->push('Permission', route('permission.index'));
});

// Breadcrumb for creating permission
Breadcrumbs::for('permission.create', function($trail){
    $trail->parent('permission.index');
    $trail->push('Add Permission', route('permission.create'));
});

// Breadcrumb to edit permission
Breadcrumbs::for('permission.edit', function ($trail, $id) {
    $permission = Permissions::find($id);
    $trail->parent('permission.index');
    $trail->push($permission->permission, route('permission.edit', $permission->permission));
});

// Breadcrumb to view the list of category
Breadcrumbs::for('category.index', function($trail) {
    $trail->parent('home');
    $trail->push('Category', route('category.index'));
});

// Breadcrumb to create new category
Breadcrumbs::for('category.create', function($trail) {
    $trail->parent('home');
    $trail->push('Category', route('category.create'));
});

// Breadcrumb to edit category
Breadcrumbs::for('category.edit', function ($trail, $id) {
    $category = Category::find($id);
    $trail->parent('category.index');
    $trail->push($category->name, route('category.edit', $category->name));
});

// Breadcrumb for users
// for index page of user
Breadcrumbs::for('user.index', function($trail) {
    $trail->parent('home');
    $trail->push('Users', route('user.index'));
});

// Breadcrumbs for creating user
Breadcrumbs::for('user.create', function($trail) {
    $trail->parent('home');
    $trail->push('User', route('user.create'));
});

// Breadcrumb fro editing user
Breadcrumbs::for('user.edit', function ($trail, $id) {
    $user = User::find($id);
    $trail->parent('user.index');
    $trail->push($user->name, route('user.edit', $user->name));
});

// for listing customer
Breadcrumbs::for('user.list', function($trail) {
    $trail->parent('home');
    $trail->push('Customer', route('user.list'));
});


// breadcrumbs for painting
// for adding painting
Breadcrumbs::for('painting.create', function($trail) {
    $trail->parent('home');
    $trail->push('Painting', route('painting.create'));
});

// for index page of paintings
Breadcrumbs::for('painting.index', function($trail) {
    $trail->parent('home');
    $trail->push('Painting', route('painting.index'));
});

// breadcrumb to edit the painting
Breadcrumbs::for('painting.edit', function ($trail, $id) {
    $painting = Paintings::find($id);
    $trail->parent('painting.index');
    $trail->push($painting->name, route('painting.edit', $painting->name));
});

// Breadcrumb for offer components
// for creating offer components
Breadcrumbs::for('offer_component.create', function($trail) {
    $trail->parent('home');
    $trail->push('Offer Component', route('offer_component.create'));
});

// index page of offer component
Breadcrumbs::for('offer_component.index', function($trail) {
    $trail->parent('home');
    $trail->push('Offer Component', route('offer_component.index'));
});

// breadcrumb to edit offer component
Breadcrumbs::for('offer_component.edit', function ($trail, $id) {
    $offerCom = OfferComponents::find($id);
    $trail->parent('offer_component.index');
    $trail->push($offerCom->offerComponents, route('offer_component.edit', $offerCom->offerComponents));
});

// breadcrumb for offers
// for creating offer
Breadcrumbs::for('offers.create', function($trail) {
    $trail->parent('home');
    $trail->push('Offers', route('offers.create'));
});

// for index page of offers
Breadcrumbs::for('offers.index', function($trail) {
    $trail->parent('home');
    $trail->push('Offers', route('offers.index'));
});

// for editing offers
Breadcrumbs::for('offers.edit', function ($trail, $id) {
    $offers = Offers::find($id);
    $trail->parent('offers.index');
    $trail->push($offers->title, route('offers.edit', $offers->title));
});

// breadcrumbs for enquiries
// for index page of enquiries
Breadcrumbs::for('enquiry.index', function($trail) {
    $trail->parent('home');
    $trail->push('Enquiries', route('enquiry.index'));
});

// breadcrumb to view orders
Breadcrumbs::for('order.index', function($trail) {
    $trail->parent('home');
    $trail->push('Orders', route('order.index'));
});

// breadcrumb to view details of order
Breadcrumbs::for('order.listOrder', function ($trail, $id) {
    $order_detail = Order::find($id);
    $trail->parent('order.index');
    $trail->push($order_detail->name, route('order.listOrder', $order_detail->name));
});

// breadcrumb for exhibition
// for index of exhibition
Breadcrumbs::for('exhibition.index', function($trail) {
    $trail->parent('home');
    $trail->push('Exhibition', route('exhibition.index'));
});

// Breadcrumbs for exhibition
// for adding exhibition
Breadcrumbs::for('exhibition.create', function($trail) {
    $trail->parent('home');
    $trail->push('Exhibition', route('exhibition.create'));
});

// for editing exhibition
Breadcrumbs::for('exhibition.edit', function ($trail, $id) {
    $exhibition = Exhibition::find($id);
    $trail->parent('exhibition.index');
    $trail->push($exhibition->title, route('exhibition.edit', $exhibition->title));
});

// to view the artist requests
Breadcrumbs::for('viewRequest', function($trail) {
    $trail->parent('home');
    $trail->push('View the artist request', route('viewRequest'));
});

?>
