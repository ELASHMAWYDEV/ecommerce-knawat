<template>
    <div class="container pt-4 pb-4 wishlist">
    
            
        <!-- page wapper-->
        <div class="columns-container p-3 bg-white" style="box-shadow: 0px 0px 8px 0 #c1b3b3;">
                <table class="table table-striped ">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col" colspan="2">Stock status</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">
                                <img src="img/2.jpg" style="height: 60px;width:60px" alt="">
                            </th>
                            <td>
                                <h6>new product name here</h6>
                                <div class="p-rate mt-1">
                                        <i class="fa fa-star main-b-color"></i>
                                        <i class="fa fa-star main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                </div>
                            </td>
                            <td><span class="main-b-bg btn p-1 text-white">In stock</span></td>
                            <td>
                                <span class="main-b-bg  text-white btn p-1">Add to cart</span>
                                <span class="main-r-bg  text-white btn p-1">Remove</span>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">
                                <img src="img/3.jpg" style="height: 60px;width:60px" alt="">
                            </th>
                            <td>
                                <h6>new product name here</h6>
                                <div class="p-rate mt-1">
                                        <i class="fa fa-star main-b-color"></i>
                                        <i class="fa fa-star main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                        <i class="fa fa-star-o main-b-color"></i>
                                </div>
                            </td>
                            <td><span class="main-b-bg btn p-1 text-white">Out stock</span></td>
                            <td>
                                <span class="main-b-bg  text-white btn p-1">Add to cart</span>
                                <span class="main-r-bg  text-white btn p-1">Remove</span>
                            </td>
                          </tr>
                         
                        </tbody>
                </table>
        </div>
            <!-- ./page wapper-->
</div>
</template>
<script>
export default {
    data(){
        return {
            favoritelist:[],
            
        }
    }
}
</script>