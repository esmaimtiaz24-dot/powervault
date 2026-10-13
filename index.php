
<?php
require_once __DIR__ . '/config.php';

$pageTitle = 'Power Up Your Ride';

try {
    $products = db()->query(
        "SELECT * FROM products
         WHERE active=1
         ORDER BY featured DESC, id ASC
         LIMIT 6"
    )->fetchAll();
} catch (Throwable $ex) {
    $products = [];
}

require __DIR__ . '/includes/header.php';
?>

<style>
/* Uploaded product images */
.product-card .product-art {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    min-height: 240px;
    background: #f6f8f7;
    border-radius: 18px;
    text-decoration: none;
}

.product-card .product-image {
    position: relative;
    z-index: 1;
    display: block;
    width: 100%;
    height: 250px;
    object-fit: contain;
    padding: 16px;
    transition: transform .35s ease;
}

.product-card:hover .product-image {
    transform: scale(1.06);
}

.product-card .product-placeholder {
    position: relative;
    z-index: 1;
    margin: 40px auto;
}

.product-card .product-badge {
    z-index: 2;
}

@media (max-width: 575px) {
    .product-card .product-art {
        min-height: 220px;
    }

    .product-card .product-image {
        height: 220px;
    }
}
</style>

<section class="hero-section">
    <div class="hero-orb orb-one"></div>
    <div class="hero-orb orb-two"></div>

    <div class="container hero-grid">
        <div class="hero-copy reveal">
            <div class="eyebrow">
                <span class="pulse-dot"></span>
                POWERVAULT PREMIUM COLLECTION
            </div>

            <h1>SEE MORE.<br>RIDE <span class="gradient-text">SAFER.</span></h1>
            <h2>Powerful Light. Confident Rides.</h2>

            <p>
                Discover premium lighting and power accessories designed
                for visibility, reliability and everyday performance.
            </p>

            <div class="d-flex flex-wrap gap-3 mt-4">
                <a class="btn btn-neon" href="/powervault/shop.php">
                    Shop Collection <span>→</span>
                </a>
                <a class="btn btn-outline-glow" href="#features">
                    Explore Features
                </a>
            </div>

            <div class="hero-points">
                <span>✦ Bright Illumination</span>
                <span>✦ Ride Visibility</span>
                <span>✦ Everyday Power</span>
            </div>
        </div>

        <div class="hero-visual reveal">
            <div class="image-halo"></div>

            <div class="hero-image-wrap">
                <img
                    src="/powervault/assets/images/hero.jpeg"
                    alt="POWERVAULT premium bicycle headlight with red safety light details">
            </div>

            <div class="floating-tag tag-top">
                <span class="tag-icon">✧</span>
                <span>
                    <b>Premium Design</b>
                    <small>Built for the ride</small>
                </span>
            </div>

            <div class="floating-tag tag-bottom">
                <span class="tag-icon">ϟ</span>
                <span>
                    <b>Smart Visibility</b>
                    <small>See more. Ride safer.</small>
                </span>
            </div>
        </div>
    </div>

    <div class="hero-bottom-line"></div>
</section>

<section class="benefits">
    <div class="container benefits-grid">
        <div>
            <span class="benefit-icon">↗</span>
            <span><b>Reliable Delivery</b><small>TCS courier support</small></span>
        </div>
        <div>
            <span class="benefit-icon">⌁</span>
            <span><b>Secure Ordering</b><small>Order records stored safely</small></span>
        </div>
        <div>
            <span class="benefit-icon">ϟ</span>
            <span><b>Flexible Payments</b><small>COD, Easypaisa &amp; JazzCash</small></span>
        </div>
        <div>
            <span class="benefit-icon">◎</span>
            <span><b>Customer Support</b><small>WhatsApp and email</small></span>
        </div>
    </div>
</section>

<section class="section-pad" id="products">
    <div class="container">

        <div class="section-heading">
            <div>
                <div class="eyebrow">THE COLLECTION</div>
                <h2>Featured <span class="gradient-text">Products</span></h2>
                <p>
                    Explore our collection of premium accessories.
                    Product images and prices are managed by the administrator.
                </p>
            </div>

            <a href="/powervault/shop.php" class="text-link">
                View all products ↗
            </a>
        </div>

        <div class="row g-4">

            <?php foreach ($products as $p): ?>
                <?php
                $imageName = basename($p['image'] ?? '');
                $imagePath = __DIR__ . '/uploads/products/' . $imageName;
                $imageUrl = '/powervault/uploads/products/'
                    . rawurlencode($imageName);

                $hasImage = $imageName !== ''
                    && is_file($imagePath);
                ?>

                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="product-card">

                        <a
                            class="product-art"
                            href="/powervault/product.php?id=<?= (int)$p['id'] ?>"
                            aria-label="View <?= e($p['name']) ?>">

                            <div class="art-glow"></div>

                            <?php if ($hasImage): ?>
                                <img
                                    class="product-image"
                                    src="<?= e($imageUrl) ?>"
                                    alt="<?= e($p['name']) ?>"
                                    loading="lazy">
                            <?php else: ?>
                                <div class="product-placeholder">
                                    <span class="device-screen"></span>
                                    <span class="device-port"></span>
                                    <span class="device-bolt">ϟ</span>
                                </div>
                            <?php endif; ?>

                            <span class="product-badge">POWERVAULT</span>
                        </a>

                        <div class="product-info">

                            <div class="product-category">
                                <?= e($p['category'] ?: 'TECH ACCESSORY') ?>
                            </div>

                            <h3><?= e($p['name']) ?></h3>

                            <p>
                                <?= e(
                                    $p['description']
                                    ?: 'Premium accessory. Details coming soon.'
                                ) ?>
                            </p>

                            <div class="product-bottom">
                                <strong>
                                    <?= $p['price'] === null
                                        || $p['price'] === ''
                                        ? 'Price not set'
                                        : money($p['price']) ?>
                                </strong>

                                <a
                                    class="btn-mini"
                                    href="/powervault/product.php?id=<?= (int)$p['id'] ?>">
                                    View ↗
                                </a>
                            </div>

                            <?php if (
                                $p['price'] !== null &&
                                (float)$p['price'] > 0 &&
                                (int)$p['stock'] > 0
                            ): ?>
                                <form
                                    method="post"
                                    action="/powervault/cart.php"
                                    class="mt-3">

                                    <input type="hidden" name="csrf"
                                           value="<?= e(csrf_token()) ?>">
                                    <input type="hidden" name="action"
                                           value="add">
                                    <input type="hidden" name="product_id"
                                           value="<?= (int)$p['id'] ?>">

                                    <button type="submit"
                                            class="btn btn-neon w-100">
                                        Add to Cart
                                    </button>
                                </form>
                            <?php else: ?>
                                <button class="btn btn-disabled w-100 mt-3"
                                        disabled>
                                    <?= (int)$p['stock'] === 0
                                        ? 'Out of Stock'
                                        : 'Price Not Set' ?>
                                </button>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if (!$products): ?>
                <div class="col-12">
                    <div class="empty-state">
                        Products will appear here after database setup.
                        Run setup.php and import database.sql.
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<section class="feature-band" id="features">
    <div class="container feature-inner">
        <div>
            <div class="eyebrow">WHY POWERVAULT</div>
            <h2>
                Designed for your<br>
                <span class="gradient-text">everyday momentum.</span>
            </h2>
            <p>
                Clean design, dependable support and a smooth shopping
                experience—from browsing to delivery.
            </p>
        </div>

        <div class="feature-cards">
            <div class="feature-tile">
                <span>ϟ</span>
                <h3>Modern Design</h3>
                <p>Premium dark interface with electric-blue accents.</p>
            </div>

            <div class="feature-tile">
                <span>◈</span>
                <h3>Easy Checkout</h3>
                <p>Cart, shipping details and payment options in one flow.</p>
            </div>

            <div class="feature-tile">
                <span>◎</span>
                <h3>Helpful Support</h3>
                <p>Reach the team through WhatsApp or email.</p>
            </div>
        </div>
    </div>
</section>

<section class="section-pad payment-strip">
    <div class="container">
        <div class="section-heading">
            <div>
                <div class="eyebrow">CHECKOUT YOUR WAY</div>
                <h2>Simple, flexible <span class="gradient-text">payments.</span></h2>
            </div>
        </div>

        <div class="payment-methods">
            <div><b>COD</b><span>Cash on Delivery</span></div>
            <div><b>EP</b><span>Easypaisa</span><small>03273822228</small></div>
            <div><b>JC</b><span>JazzCash</span><small>03074364067</small></div>
            <div><b>TCS</b><span>Courier delivery</span></div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
