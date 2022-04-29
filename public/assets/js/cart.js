 let ary = "";

 function addToCart(num) {
     var ary = JSON.parse(localStorage.getItem("items"));
     if (ary == null) {
         var itemAry = [num];
         localStorage.setItem("items", JSON.stringify(itemAry));
     } else {
         $con = ary.indexOf(num);
         if ($con == -1) {
             ary.push(num);
             localStorage.setItem("items", JSON.stringify(ary));
         }
     }
     alert("Item  Add to Cart")
     getCart();
 }

 function reduceCart(id) {
     var ary = JSON.parse(localStorage.getItem("items"));

     if (ary != null) {
         ary.forEach((item) => {
             if (item == id) {
                 var ind = ary.indexOf(item);
                 ary.splice(ind, 1)
             }
         })
     }
     localStorage.setItem("items", JSON.stringify(ary));
     getCart();

 }

 function getCart() {
     let ary = JSON.parse(localStorage.getItem("items"));
     if (ary != null) {
         $("#cart-count").html(ary.length)
     } else {
         $("#cart-count").html(0);
     }
     return ary;
 }

 function clearCart() {
     localStorage.removeItem("items");
 }

 getCart();