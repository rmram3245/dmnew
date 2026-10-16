<?php
session_start();

require_once __DIR__ . '/db_config.php';

ini_set('log_errors', '1');
ini_set('display_errors', '0');
error_reporting(E_ALL);

$product_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$product_id || $product_id < 1) {
    http_response_code(400);
    exit('Invalid product ID.');
}

try {
    $stmt = $conn->prepare(
        "SELECT id, name, description, regular_price, final_price,
                discount_percent, image_url, rating, ratings_count
         FROM products
         WHERE id = :id"
    );

    $stmt->execute(['id' => $product_id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        http_response_code(404);
        exit('Product not found.');
    }
} catch (Throwable $e) {
    error_log('Product page error: ' . $e->getMessage());
    http_response_code(500);
    exit('Unable to load product. Please try again later.');
}

function h($value) {
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

$name = $product['name'] ?? 'Product';
$image = $product['image_url'] ?? '';
$description = $product['description'] ?? '';
$regularPrice = (float)($product['regular_price'] ?? 0);
$finalPrice = (float)($product['final_price'] ?? 0);
$discount = (float)($product['discount_percent'] ?? 0);
$rating = $product['rating'] ?? null;
$ratingsCount = $product['ratings_count'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($name) ?> | Dmart Store</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #222;
        }
        .product {
            max-width: 950px;
            margin: 25px auto;
            padding: 24px;
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 30px;
            background: #fff;
            border-radius: 12px;
        }
        .product img {
            display: block;
            width: 100%;
            max-height: 440px;
            object-fit: contain;
        }
        .price { font-size: 26px; font-weight: bold; }
        .old-price {
            margin-left: 8px;
            color: #777;
            text-decoration: line-through;
            font-size: 17px;
        }
        .discount { color: #16803c; margin-top: 10px; }
        .buy {
            display: inline-block;
            margin-top: 20px;
            padding: 13px 24px;
            background: #087b3e;
            color: white;
            border: 0;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }
        .description { line-height: 1.6; white-space: pre-wrap; }
        @media (max-width: 650px) {
            .product { grid-template-columns: 1fr; padding: 16px; }
        }
    </style>
</head>
<body>
    <main class="product">
        <div>
            <?php if ($image !== ''): ?>
                <img src="<?= h($image) ?>" alt="<?= h($name) ?>">
            <?php else: ?>
                <p>Product image unavailable.</p>
            <?php endif; ?>
        </div>

        <section>
            <h1><?= h($name) ?></h1>

            <?php if ($rating !== null): ?>
                <p>Rating: <?= h($rating) ?>
                    (<?= h($ratingsCount) ?> reviews)</p>
            <?php endif; ?>

            <p class="price">
                ₹<?= number_format($finalPrice, 2) ?>
                <?php if ($regularPrice > $finalPrice): ?>
                    <span class="old-price">
                        ₹<?= number_format($regularPrice, 2) ?>
                    </span>
                <?php endif; ?>
            </p>

            <?php if ($discount > 0): ?>
                <p class="discount">
                    <?= number_format($discount, 0) ?>% discount
                </p>
            <?php endif; ?>

            <h3>Description</h3>
            <p class="description"><?= h($description) ?></p>

            <a class="buy" href="/check-out?id=<?= (int)$product['id'] ?>">
                BUY NOW
            </a>
        </section>
    </main>
</body>
</html>
