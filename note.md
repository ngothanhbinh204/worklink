
## 1. Quản lý Roles

### Gán role cho user
```php
$user->assignRole('admin'); // Gán role 'admin' cho user
$user->assignRole(['admin', 'editor']); // Gán nhiều roles cùng lúc
$user->syncRoles(['admin', 'editor']); 
 

$user->removeRole('admin'); // Xóa role 'admin' khỏi user
$user->removeRole(['admin', 'editor']); // Xóa nhiều roles cùng lúc

$user->syncRoles(['admin', 'editor']); // Gán roles mới và xóa các roles cũ

if ($user->hasRole('admin')) {
    // User có role 'admin'
}

if ($user->hasAnyRole(['admin', 'editor'])) {
    // User có ít nhất một trong các roles
}

if ($user->hasAllRoles(['admin', 'editor'])) {
    // User có tất cả các roles
}

$roles = $user->roles; // Lấy danh sách roles của user

$roleNames = $user->getRoleNames(); // Lấy tên các roles của user


2. Quản lý Permissions

$user->givePermissionTo('edit-posts'); // Gán permission 'edit-posts' cho user
$user->givePermissionTo(['edit-posts', 'delete-posts']); // Gán nhiều permissions cùng lúc

$user->revokePermissionTo('edit-posts'); // Thu hồi permission 'edit-posts' từ user
$user->revokePermissionTo(['edit-posts', 'delete-posts']); // Thu hồi nhiều permissions cùng lúc

$user->syncPermissions(['edit-posts', 'delete-posts']); // Gán permissions mới và xóa các permissions cũ

if ($user->hasPermissionTo('edit-posts')) {
    // User có permission 'edit-posts'
}

if ($user->hasAnyPermission(['edit-posts', 'delete-posts'])) {
    // User có ít nhất một trong các permissions
}

if ($user->hasAllPermissions(['edit-posts', 'delete-posts'])) {
    // User có tất cả các permissions
}

$allPermissions = $user->getAllPermissions(); // Lấy tất cả permissions của user
