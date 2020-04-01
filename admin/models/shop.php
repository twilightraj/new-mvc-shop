<?php
function categories_delete($id)
{
    $id = intval($id);
    require_once('admin/models/products.php');
    $options = array(
        'select' => 'id',
        'where' => 'category_id=' . $id
    );
    $products = get_all('products', $options);
    foreach ($products as $product) {
        products_delete($product['id']);
    }
    global $linkconnectDB;
    $sql = "DELETE FROM categories WHERE id=$id";
    mysqli_query($linkconnectDB, $sql) or die(mysqli_error($linkconnectDB));
}
function category_uodate()
{
    $category = array(
        'id' => intval($_POST['cate_id']),
        'category_name' => escape($_POST['name']),
        'slug' => slug($_POST['name']),
        'category_position' => intval($_POST['position'])
    );
    save('categories', $category);
    header('location:admin.php?controller=shop');
}
