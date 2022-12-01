@extends('layouts.app')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">Orders</a></li>
        </ol>
    </div>
    <div class="main-container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-body">

                        <form action="{{ route('order.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <select name="customer_id" class="form-control selectpicker" data-live-search="true"
                                        required>
                                        <option value="">Select Customer By Phone</option>
                                        @foreach ($allCustomer as $value)
                                            <option value="{{ $value->id }}">{{ $value->name }} - {{ $value->phone }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-primary" id="" data-toggle="modal"
                                            data-target="#customModalTwoAdvice" title="New Appointments">
                                            <i class="icon-plus"></i></span></button>
                                    </div>
                                </div>
                            </div>
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th data-orderable="false">SL</th>
                                        <th data-orderable="false">Med</th>
                                        <th data-orderable="false">Price</th>
                                        <th data-orderable="false">Qty</th>
                                        <th data-orderable="false">Total</th>
                                        <th data-orderable="false">Ac</th>
                                    </tr>
                                </thead>
                                <tbody class="show-cart">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-right border-right">Total:</td>
                                        <td class="border-right">Qty:<span class="total-count"></span></td>
                                        <td colspan="2">$<span class="total-cart"></span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6" class="text-right border-right">
                                            <button type="submit" class="btn btn-primary btn-sm">Checkout</button>
                                            <button class="clear-cart btn btn-danger btn-sm">Clear Cart</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card m-0">
                    <div class="card-body">
                        <table id="highlightRowColumn" class="table custom-table">
                            <thead>
                                <tr>
                                    <th data-orderable="false">Medicine</th>
                                    <th data-orderable="false">Price/Stock</th>
                                    <th data-orderable="false">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allMedicine as $key => $value)
                                    <tr>
                                        <td>{{ $value->title }}</td>
                                        <td>${{ $value->unit_price }}</td>
                                        <td><a href="#" class="btn btn-primary btn-sm add-to-cart"
                                                data-name="{{ $value->title }}" data-id='{{ $value->id }}'
                                                data-price='{{ $value->unit_price }}'>Add</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table custom-table">
                        <thead>
                            <tr>
                                <th data-orderable="false">SL</th>
                                <th data-orderable="false">Med</th>
                                <th data-orderable="false">Price</th>
                                <th data-orderable="false">Qty</th>
                                <th data-orderable="false">Total</th>
                                <th data-orderable="false">Ac</th>
                            </tr>
                        </thead>
                        <tbody class="show-cart">

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right border-right">Total:</td>
                                <td class="border-right">Qty:<span class="total-count"></span></td>
                                <td colspan="2">$<span class="total-cart"></span></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">Order now</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        // ************************************************
        // Shopping Cart API
        // ************************************************

        var shoppingCart = (function() {
            // =============================
            // Private methods and propeties
            // =============================
            cart = [];

            // Constructor
            function Item(id, name, price, count) {
                this.id = id;
                this.name = name;
                this.price = price;
                this.count = count;
            }

            // Save cart
            function saveCart() {
                sessionStorage.setItem('shoppingCart', JSON.stringify(cart));
            }

            // Load cart
            function loadCart() {
                cart = JSON.parse(sessionStorage.getItem('shoppingCart'));
            }
            if (sessionStorage.getItem("shoppingCart") != null) {
                loadCart();
            }


            // =============================
            // Public methods and properties
            // =============================
            var obj = {};

            // Add to cart
            obj.addItemToCart = function(id, name, price, count) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart[item].count++;
                        saveCart();
                        return;
                    }
                }
                var item = new Item(id, name, price, count);
                cart.push(item);
                saveCart();
            }
            // Set count from item
            obj.setCountForItem = function(id, count) {
                for (var i in cart) {
                    if (cart[i].id === id) {
                        cart[i].count = count;
                        break;
                    }
                }
            };
            // Remove item from cart
            obj.removeItemFromCart = function(id) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart[item].count--;
                        if (cart[item].count === 0) {
                            cart.splice(item, 1);
                        }
                        break;
                    }
                }
                saveCart();
            }

            // Remove all items from cart
            obj.removeItemFromCartAll = function(id) {
                for (var item in cart) {
                    if (cart[item].id === id) {
                        cart.splice(item, 1);
                        break;
                    }
                }
                saveCart();
            }

            // Clear cart
            obj.clearCart = function() {
                cart = [];
                saveCart();
            }

            // Count cart
            obj.totalCount = function() {
                var totalCount = 0;
                for (var item in cart) {
                    totalCount += cart[item].count;
                }
                return totalCount;
            }

            // Total cart
            obj.totalCart = function() {
                var totalCart = 0;
                for (var item in cart) {
                    totalCart += cart[item].price * cart[item].count;
                }
                return Number(totalCart.toFixed(2));
            }

            // List cart
            obj.listCart = function() {
                var cartCopy = [];
                for (i in cart) {
                    item = cart[i];
                    itemCopy = {};
                    for (p in item) {
                        itemCopy[p] = item[p];
                    }
                    itemCopy.total = Number(item.price * item.count).toFixed(2);
                    cartCopy.push(itemCopy)
                }
                return cartCopy;
            }

            // cart : Array
            // Item : Object/Class
            // addItemToCart : Function
            // removeItemFromCart : Function
            // removeItemFromCartAll : Function
            // clearCart : Function
            // countCart : Function
            // totalCart : Function
            // listCart : Function
            // saveCart : Function
            // loadCart : Function
            return obj;
        })();


        // *****************************************
        // Triggers / Events
        // *****************************************
        // Add item
        $('.add-to-cart').click(function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var price = Number($(this).data('price'));
            shoppingCart.addItemToCart(id, name, price, 1);
            displayCart();
        });

        // Clear items
        $('.clear-cart').click(function() {
            shoppingCart.clearCart();
            displayCart();
        });


        function displayCart() {
            var cartArray = shoppingCart.listCart();
            var output = "";
            var j = 1;
            for (var i in cartArray) {
                output += `<tr>
                <td> ${j++}</td>
                <td>${cartArray[i].name}</td>
                <td>${cartArray[i].price}</td>
                <td>
                    <div class='input-group'>
                        <button class='minus-item input-group-addon btn btn-primary btn-sm' data-id=${cartArray[i].id}>-</button>
                        <input type='number' readonly class='item-count input-sm' min='1' data-id='${cartArray[i].id}' value='${cartArray[i].count}' style='width:50px;'>
                        <button class='plus-item btn btn-primary input-group-addon btn-sm' data-id=${cartArray[i].id}>+</button>
                    </div>
                </td>
                <td>${cartArray[i].total}</td>
                <td><button class='delete-item btn btn-danger btn-sm' data-id=${cartArray[i].id}>X</button></td>
                </tr>`;
            }
            $('.show-cart').html(output);
            $('.total-cart').html(shoppingCart.totalCart());
            $('.total-count').html(shoppingCart.totalCount());
        }

        // Delete item button

        $('.show-cart').on("click", ".delete-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.removeItemFromCartAll(id);
            displayCart();
        })


        // -1
        $('.show-cart').on("click", ".minus-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.removeItemFromCart(id);
            displayCart();
        })
        // +1
        $('.show-cart').on("click", ".plus-item", function(event) {
            var id = $(this).data('id')
            shoppingCart.addItemToCart(id);
            displayCart();
        })

        // Item count input
        $('.show-cart').on("change", ".item-count", function(event) {
            var id = $(this).data('id');
            var count = Number($(this).val());
            shoppingCart.setCountForItem(id, count);
            displayCart();
        });

        displayCart();
    </script>
@endsection
