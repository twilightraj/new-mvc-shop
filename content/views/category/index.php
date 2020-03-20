<?php require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">

        <hr class="tall">

        <div class="row">
            <div class="col-md-9">

                <div class="row">
                    <div class="col-md-6">
                        <h1 class="shorter"><strong><?php echo $category['subcategory_name'];?></strong></h1>
                        <p>Hiển thị <?php if($total_rows>=9) echo '1–9 trong ';?><?php echo $total_rows;?> kết quả.</p>
                    </div>
                </div>

                <div class="row">
                    <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
                        <?php
                        foreach ($products as $product) : ?>
                            <li class="col-md-4 col-sm-6 col-xs-12 product">
                                <?php if ($product['saleoff'] != 0) : ?>
                                    <a href="shop-product-sidebar.html">
                                        <span class="onsale">-<?php echo $product['percentoff']; ?>%</span>
                                    </a>
                                <?php endif; ?>
                                <span class="product-thumb-info">
                                    <a href="cart/add/<?php echo $product['id']; ?>" class="add-to-cart-product">
                                        <span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
                                    </a>
                                    <a href="product/<?php echo $product['id']; ?>-<?php echo $product['slug']; ?>">
                                        <span class="product-thumb-info-image">
                                            <span class="product-thumb-info-act">
                                                <span class="product-thumb-info-act-left"><em>View</em></span>
                                                <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                            </span>
                                            <img alt="" class="img-responsive" src="img/products/product-1.jpg">
                                        </span>
                                    </a>
                                    <span class="product-thumb-info-content">
                                        <a href="product/<?php echo $product['id']; ?>-<?php echo $product['slug']; ?>">
                                            <h4><?php echo $product['product_name']; ?></h4>
                                            <span class="price">
                                                <?php if ($product['saleoff'] != 0) { ?>
                                                    <del><span class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?></span></del>
                                                    <ins><span class="amount"><?php echo number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.'); ?> VNĐ</span></ins>
                                                <?php } else { ?>
                                                    <ins><span class="amount"><?php echo number_format($product['product_price'], 0, ',', '.');  ?> VNĐ</span></ins>
                                                <?php } ?>
                                            </span>
                                        </a>
                                    </span>
                                </span>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php require('content/views/shared/sidebar.php'); ?>
            </div>
        </div>
    </div>
</div>
<?php
require('content/views/shared/footer.php');