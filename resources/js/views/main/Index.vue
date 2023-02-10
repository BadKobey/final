<template>
    <div>
        <main>
<section class="page__title p-relative d-flex align-items-center" data-background="assets/img/slider/top.jpg" >
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__title-inner text-center">
                    <h1>Интернет-магазин автозапчастей</h1>
                    <div class="page__title-breadcrumb">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- cart-area start -->
    <section class="cart-area pb-120 pt-120">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="container grey-bg-3  d-md-block pt-10 pb-10">
                        <div class="row align-items-center">
                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                <div class="header__search-3">
                                    <form action="#">
                                        <div class="header__search-input-2">
                                            <input type="search" v-model="search" placeholder="Поиск запчастей..">
                                            <p>{{ search }}</p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6">
                                <div class="header__middle-right header__middle-right-d d-flex align-items-center justify-content-end">
                                    <div class="sd-contact">
                                        <span>Есть вопросы? Позвоните нам. <a href="tel:+0889006690">+88613364215</a></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <div class="table-content table-responsive">
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
                                <tr v-for="product in searchHandler" >
                                    <td class="product-thumbnail"><a href="product-details.html"><img src="assets/img/zagl.jpg" alt="Без фото"></a></td>
                                    <td class="product-name"><a href="product-details.html">{{product.article}}</a></td>
                                    <td class="product-price"><span class="amount">{{product.nomenclature}}</span></td>
                                    <td class="product-subtotal"><span class="amount">{{product.price}} руб.</span></td>
                                    <td class="product-quantity">
                                        <a @click.prevent="addToCart(product.id)" href="cart.html" class="btn-tp">В корзину</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- cart-area end -->
</main>
    </div>
</template>

<script>
import { onMounted } from 'vue';

export default{
    name: "Index",
    mounted() {
        $(document).trigger('change')
        this.getProducts()
    },
    data() {
        return {
            search: '',
            products:[]
        }
    },
    methods: {
        addToCart(id) {
            let cart = localStorage.getItem('cart')
            let newProduct = [
                {
                    'id': id,
                    'qty': 1
                }
            ]
              if (!cart) {
                localStorage.setItem('cart', JSON.stringify(newProduct));
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if (productInCart.id === id) {
                        productInCart.qty = Number(productInCart.qty) + 1
                        newProduct = null
                    }
                })
                Array.prototype.push.apply(cart, newProduct)
                localStorage.setItem('cart', JSON.stringify(cart))
              }
        },
        getProducts() {
            this.axios.get('http://127.0.0.1:8000/api/products')
            .then( res => {
            this.products = res.data.data;
            })
        }
    },
    computed: {
        searchHandler(){
            return this.products.filter(elem => {
                return elem.nomenclature.toLowerCase().includes(this.search.toLowerCase());
            });
        }
    }
}
</script>
<style scoped>

</style>
