<?php
function Calculate_Bill($elementcont)
{
    $Total_bill = 0;
    for ($a = 0; $a < $elementcont; $a++) {
        $Total_bill += ($_POST["price-" . ($a + 1)] * $_POST["Quantity-" . ($a + 1)]);
    }
    return $Total_bill;
}
function supermarket_discount($bill)
{
    if ($bill > 0 && $bill < 1000) {
        return $bill;
    }
    if ($bill >= 1000 && $bill < 3000) {
        return $bill * 0.1;
    }
    if ($bill >= 3000 && $bill < 4500) {
        return $bill * 0.15;
    }
    if ($bill >= 4500) {
        return $bill * 0.2;
    }
}
$currency = "EGP";
$cities = ['Cairo', 'Giza', 'Alex', 'Other'];
$cities_cost = [0, 30, 50, 100];
$options = "";
for ($i = 0; $i < count($cities); $i++) {
    $options .= "<option value=";
    $options .= $cities_cost[$i] . " ";
    $options .= ($cities[array_search($_POST['city'], $cities_cost)] == $cities[$i]) ? "selected" : "";
    $options .= " >" . $cities[$i] . "</option>";
}
// $x=($cities[array_search($_POST['city'],$cities_cost)]=="Giza") ? "selected" : "unselected";

if ($_POST) {
    if (isset($_POST['enter-product'])) {
        if (empty($_POST['name'])) {
            $error['name'] = "<div class='alert alert-warning'>Name is Required</div>";
        }
        if (empty($_POST['products_n'])) {
            $error['products_n'] = "<div class='alert alert-warning'>Loan Year is Required</div>";
        }
        if (empty($error)) {
            $name = $_POST['name'];
            $product_n = $_POST['products_n'];
            $city = $_POST['city'];
            $btndisable = "disabled";
            $proudts_input = "<div><form method='post' ><table class='table table-striped table'><thead><tr><th>Product Name</th><th>Price</th><th>Quantity</th> </tr></thead><tbody>";
            for ($i = 0; $i < $product_n; $i++) {
                $proudts_input .= "<tr><td><input type='text' name=product-" . ($i + 1) . "></td><td><input type='number' name=price-" . ($i + 1) . "></td><td><input type='number' name=Quantity-" . ($i + 1) . "><input type='hidden' name='name' value=$name><input type='hidden' name='product_n' value=$product_n><input type='hidden' name='city' value=$city></td></tr>";
            }
            $proudts_input .= "</tbody></table><button type='submit' class='btn btn-dark' class='form-control' name='show-bill' >Show Bill</button></form></div>";
        }
    }
    if (isset($_POST['show-bill'])) {
        $name = $_POST['name'];
        $product_n = $_POST['product_n'];
        $city = $_POST['city'];
        $Total_bill = Calculate_Bill($product_n);
        $Discount = supermarket_discount($Total_bill);
        $Tableofproduct = "<table class='table table-striped table-primary table-bordered'><thead><tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Sub Total</th> </tr></thead><tbody>";
        for ($i = 0; $i < $product_n; $i++) {
            $Tableofproduct .= "<tr><td>" . $_POST["product-" . ($i + 1)] . "</td><td>" . $_POST["price-" . ($i + 1)] . "</td><td>" . $_POST["Quantity-" . ($i + 1)] . "</td><td>" . ($_POST["Quantity-" . ($i + 1)] * $_POST["price-" . ($i + 1)]) . "</td><tr>";
        }

        $Tableofproduct .= "</tbody></table>";
        $billResult = "<table class='table table-dark'><thead><tr><th>Client Name</th><th>$name</th></thead><tbody>
        <tr><td>City</td><td>$cities[$cityindex]</td></tr>
        <tr><td>Total</td><td>" . $Total_bill . " $currency</td></tr>
        <tr><td>Discount</td><td>" . $Discount . " $currency</td></tr>
        <tr><td>Total After Discount</td><td>" . ($Total_bill - $Discount) . " $currency</td></tr>
        <tr><td>Delevery Cost</td><td>" . $city . " $currency</td></tr>
        <tr><td>Total Paymet Bill</td><td>" . ($Total_bill - $Discount + $city) . " $currency</td></tr>
        </tbody></table>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>SuperMarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-secondary">
    <div class="row">
        <div calss="col-6">
            <img src="sm.jpg" alt="supermarket image" class="rounded  m-5" width="500px" height="700px">
        </div>
        <div class="col-6 ml-2 mt-5 text-center text-white-50">
            <div class="bg-dark text-danger rounded text-left">
                <h1><i class="fas fa-shopping-cart text-white p-5"></i> <span class="text-white display-4">&Scedil;</span>upermarket</h1>
            </div>
            <form method="post" class="mb-4">
                <div class="form-group">
                    <label for="name" class="h3">
                        User Name
                    </label>
                    <input type="text" name="name" id="name" class="form-control" value=<?= $name ?>>
                    <?= $error['name']; ?>
                </div>
                <div class="form-group">
                    <label for="city" class="h3">City</label>
                    <select class="form-control" name="city" id="city">
                        <?= $options; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_n" class="h3">
                        Number of Products
                    </label>
                    <input type="number" name="products_n" id="products_n" class="form-control" value=<?= $product_n ?>>
                    <?= $error['products_n']; ?>
                </div>
                <button type="submit" class="btn btn-dark" class="form-control " name="enter-product" <?php if (isset($btndisable)) {
                                                                                                            echo $btndisable;
                                                                                                        } ?>>Enter Products <i class="fas fa-angle-double-down text-danger p-2"></i></button>
            </form>
            <?= $proudts_input; ?>
            <?= $Tableofproduct; ?>
            <?= $billResult; ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>