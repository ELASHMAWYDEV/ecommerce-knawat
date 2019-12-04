<style scoped>
#bigcatalogue a{cursor:pointer}
</style>
<template>
    <div class="categories-box sidebar-categores-box">
                         <div class="section-title">
                           <h5 class="font-weight-bold">{{!lang ? 'CATALOGUES' : 'الاقسام'}}</h5>
                         </div>
                          <div class="sidebar-categores-inner">
                           <div class="filter-group" id="bigcatalogue">
                             
                             
                             <a class="active"  @click="filterproducts('Fashion',$event)"><i class="fa fa-check oldmain-b-color "></i><span class="ml-1"> {{lang ? 'موضة' : 'Fashion'}}</span></a>
                             
                             <a class=""  @click="filterproducts('Sports',$event)"><i class="fa fa-check oldmain-b-color "></i> <span class="ml-1"> {{lang ? 'رياضة' : 'Sports'}} </span></a>
                             
                             <a class=""  @click="filterproducts('Electronic',$event)"><i class="fa fa-check oldmain-b-color "></i>   <span class="ml-1">{{lang ? 'إلكترونيك' : 'Electronic'}}</span></a>
                             
                             <a class="" @click="filterproducts('Furniture',$event)" ><i class="fa fa-check oldmain-b-color "></i> <span class="ml-1">{{lang ? 'أثاث' : 'Furniture'}}  </span></a>
                             
                             <a class="" @click="filterproducts('Accessories',$event)" ><i class="fa fa-check oldmain-b-color "></i> <span class="ml-1"> {{lang ? 'اكسسوارات' : 'Accessories'}}</span></a>
                             
                     
                           </div>
                          </div>
    </div>

</template>
<script>

export default {
    data(){
        return {
            Sport:['Sporting Goods','Sports Mem, Cards & Fan Shop','Toys & Hobbies','Clothing, Shoes & Accessories'],
            Fashion:['Clothing, Shoes & Accessories','Athletic Shoes','Clothing, Shoes & Accessories',
            'Men\'s Clothing','Coats & Jackets','Men','Panths','Girls','Kids','Health & Beauty','Baby'],
            Electronic:['Cell Phones & Accessories','Cameras & Photo','Musical Instruments & Gear',
            'Computers/Tablets & Networking'],
            Furniture:['Antiques','Home & Garden','Dolls & Bears','Pet Supplies','Collectibles'],
            Accessories:['Business & Industrial','Cell Phones & Accessories','Hair Accessories',
            'Clothing, Shoes & Accessories','Jewelry & Accessories','Kids\' Accessories',
            'Jewelry & Watches'],
        }
    },
    methods:{
        filterproducts(type,e){
          let arr = [];
          switch(type){
              case 'Sport':arr = this.Sport;break;
              case 'Accessories':arr = this.Accessories;break;
              case 'Fashion':arr = this.Fashion;break;
              case 'Electonic':arr = this.Electronic;break;
              case 'Furniture':arr = this.Furniture;break;
          }
          document.querySelectorAll('#bigcatalogue a').forEach(item=>{
             item.classList.remove('active') 
          })
          
          e.target.classList.add('active');
          e.target.parentNode.classList.add('active');
          let products = this.$store.state.products;
           console.log(arr)
          let fil = products
          .filter((element) => 
            
              element.categories.some((c) => arr.indexOf(c.name.en) > -1))
          .map(element => {
              return Object.assign({}, element, {categories : element.categories.filter(subElement => subElement.name.en == type)});

          }); 
          this.$store.state.currentProducts = fil;
          localStorage.clear('activeCategory')
        
      },
      
    },
    computed:{
          lang(){
          return this.$store.state.lang;
         }
      }
}
</script>