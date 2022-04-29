<?php
use App\Classes\CSRFToken;

require_once APPROOT . '/resource/layout/header.php'?>
<?php require_once APPROOT . '/resource/layout/nav.php'?>
<!-- {{ content }} -->
  <div class="container mt-3">
      <!-- {{ table }} -->
      <table class="table" >
        <thead style="background-color:#2a5d84;color:#fff;">
            <tr>
            <th scope="col" class="english">NO</th>
            <th scope="col" class="english">Name</th>
            <th scope="col" class="english">Image</th>
            <th scope="col" class="english">Price</th>
            <th scope="col" class="english">Quantity</th>
            <th scope="col" class="english">Total</th>
            </tr>
        </thead>
        <tbody id="table-body">
          <!-- {{ coming from javascript}} -->
        </tbody>
    </table><!-- {{ table  }} -->
  </div>
  
<!-- {{ content }} -->
<script src="<?php assets('js/cart.js')?>"></script>
<script>
   function loadProduct(){
    $.ajax({
        type:"POST",
        url: "http://localhost:8080/MYSHOP/public/product/cart",
        data: {
            "cart": getCart()
        },
        success: function(results) {
          saveProduct(results);
        },
        errors: function(response) {
            console.log(response.responseText);
        }
    })
}
   loadProduct();

   function  saveProduct(res)
   {
     localStorage.setItem('products',res);
     let results = JSON.parse(localStorage.getItem('products'));
      showProduct(results);
   }

   function showProduct(results)
   {
    var str='';
    var total=0;
    let i=0;
      while(i<results.length){
      results.forEach((result)=>{
        total += result.qty * result.price;
         str += '<tr>';
          str +=`
          <th scope="row" class="align-middle">${++i}</th>
           <td class="english align-middle">${result.name}</td>
           <td class="english align-middle">
             <a href="<?php echo URLROOT .'product/detail/'?>${result.id}">
              <img src="http://localhost:8080/MYSHOP/public/assets/uploads/${result.image}" alt="" width="100px" height="100px" style="box-shadow: 0px 2px 5px #3e3e3e;border-radius:2px;"></a>
            </td>

            <td class="english text-primary align-middle">Ks ${result.price}</td>
            <td class="english align-middle">
               <button class="btn  btn-sm" onclick="minus(${result.id})">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                  <path d="M0 8a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2H1a1 1 0 0 1-1-1z"/>
                </svg>
               </button>
                <span class="english ms-1 me-1">${result.qty}</span>
               <button class="btn  btn-sm" onclick="plus(${result.id})">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z"/>
              </svg>
               </button>
               <button class="btn btn-danger btn-sm english" onclick="del(${result.id})">Delete</button>
            </td>
            <td class="english align-middle">Ks ${result.price * result.qty} </td>
           `;
         str += '</tr>';
       
      })
      str +=`
            <tr>
            <td colspan="5" class="english text-success text-end"> - Grand Total -
            </td>
            <td class="english text-info">Ks ${total}</td>
            </tr>
            <tr>
              <td colspan="7" class="text-end">
              <button class="btn btn-sm btn-primary english" 
              onclick="payOut()"> Check-Out</button>
               </td>
            </tr>
           `;
    }
    
      $('#table-body').html(str);
   }

   function del(id)
   {
    var results = JSON.parse(localStorage.getItem('products'));
         let indx = results.findIndex(x => x.id == id);
          if(indx != -1){
             results.splice(indx,1);
          }
          reduceCart(id)
          saveProduct(JSON.stringify(results));
          showProduct(results)
          
   }

   function plus(id)
   {
    var results = JSON.parse(localStorage.getItem('products'));
    results.forEach((result)=>{
         if(result.id == id){
           result.qty = result.qty +1;
         }
     })
     saveProduct(JSON.stringify(results));
   }
   function minus(id)
   {
    var results = JSON.parse(localStorage.getItem('products'));
    results.forEach((result)=>{
      if(result.id == id){
           if(result.qty > 1){
            result.qty = result.qty  - 1;
           }
         }
     })
     saveProduct(JSON.stringify(results));
   }

   function payOut()
   {
    var results = JSON.parse(localStorage.getItem('products'));
    $.ajax({
        type:"POST",
        url: "http://localhost:8080/MYSHOP/public/product/payout",
        data: {
            "items": results
        },
        success: function(results) {
          clearCart();
          getCart(); 
          showProduct([]);
          window.location.href = 'http://localhost:8080/MYSHOP/public'
        },
        errors: function(response) {
            console.log(response.responseText);
        }
    })
   }
</script>

<?php require_once APPROOT . '/resource/layout/footer.php'?>