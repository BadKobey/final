<div>
        <input wire:model="search" type="search" placeholder="Поиск товара..">


            <table class="table">
                <thead>
                <tr>
                    <th class="product-thumbnail">фото</th>
                    <th class="cart-product-name">Артикул</th>
                    <th class="product-price">Наименование</th>
                    <th class="product-quantity">Цена (руб.)</th>
                    <th class="product-remove"></th>
                </tr>
                </thead>
            <tbody>
            @foreach ($products as $product)
                <tr >
                    <td class="product-thumbnail"><a href="product-details.html"><img src="assets/img/zagl.jpg" alt="Без фото"></a></td>
                    <td class="product-name"><a href="product-details.html">{{ $product['article'] }}</a></td>
                    <td class="product-price"><span class="amount">{{ $product['nomenclature'] }}</span></td>
                    <td class="product-subtotal"><span class="amount">{{ $product['price'] }} руб.</span></td>
                    <td class="product-quantity">
                        <a @click.prevent="addToCart(product.id)" href="cart.html" class="btn-tp">В корзину</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</div>
