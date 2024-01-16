
<?php
require_once 'classes/Product.php';
require_once 'classes/Category.php';
require_once 'classes/Food.php';
require_once 'classes/Toy.php';
require_once 'classes/Bed.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Animal Shop</h1>

        <!-- Mini Navbar -->
        <ul class="nav nav-pills mb-4" id="category-navbar">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-category="all">Tutti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-category="dog">Cani</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-category="cat">Gatti</a>
            </li>
        </ul>

        <!-- Product Display Section -->
        <div class="row" id="product-list">
            <?php
            $foodCategory = new Category('Cibo', 'food');
            $toyCategory = new Category('Giocattoli', 'toy');
            $bedCategory = new Category('Cucce', 'bed');

            $dogProducts = [
                new Food('Crocchette per Cani', 15.99, $foodCategory, 'dog'),
                new Toy('Palla da Lancio', 9.99, $toyCategory, 'dog'),
                new Bed('Cuccia Comoda', 29.99, $bedCategory, 'dog'),
                
            ];

            $catProducts = [
                new Food('Scatolette Gatto', 12.99, $foodCategory, 'cat'),
                new Toy('Topo Peluche', 7.99, $toyCategory, 'cat'),
            
            ];

            $allProducts = array_merge($dogProducts, $catProducts);

            foreach ($allProducts as $product):
            ?>
                <div class="col-md-4 mb-4" data-category="<?php echo $product->getCategory()->getTag(); ?>">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product->getName(); ?></h5>
                            <p class="card-text"><?php echo $product->getCategory()->getName(); ?></p>
                            <p class="card-text">Prezzo: $<?php echo $product->getPrice(); ?></p>
                            <p class="card-text">Tipo: <?php echo $product->getProductType(); ?></p>
                            <a href="#" class="btn btn-primary">Aggiungi al Carrello</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var categoryNavbar = document.getElementById('category-navbar');
            var productList = document.getElementById('product-list');

            categoryNavbar.addEventListener('click', function(event) {
                if (event.target.tagName === 'A') {
                    event.preventDefault();
                    var category = event.target.getAttribute('data-category');
                    filterProducts(category);
                }
            });

            function filterProducts(category) {
                var productItems = productList.getElementsByClassName('col-md-4');

                for (var i = 0; i < productItems.length; i++) {
                    var productCategory = productItems[i].getAttribute('data-category');
                    if (category === 'all' || category === productCategory) {
                        productItems[i].style.display = 'block';
                    } else {
                        productItems[i].style.display = 'none';
                    }
                }
            }
        });
    </script>
</body>
</html>
