$(document).ready(function (){
    $(document).on('click', '.increment-btn', function(e){
        e.preventDefault();
       var qty=$(this).closest('.product_data').find('.input-qty').val();
      // var qty = $('.input-qty').val();
      // alert('yhvkhvh');
       var value= parseInt(qty,10);
        value=isNaN(value)? 0 :value;
        if(value < 10)
        {
            value++
            $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);

        }
    });
   // $('.increment-btn').click(function (e){
      
   // });

   $(document).on('click', '.decrement-btn', function(e){
    e.preventDefault();
        var qty=$(this).closest('.product_data').find('.input-qty').val();
        //alert(qty);
        var value= parseInt(qty,10);
        value=isNaN(value)? 0 :value;
        if(value > 1)
        {
            value--
            $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);

        }
      
        
    });
   
    //$('.decrement-btn').click(function (e){
        

        
   // $('.addToCartBtn').click(function (e){
    $(document).on('click', '.addToCartBtn', function(e){
        e.preventDefault();
        var qty=$(this).closest('.product_data').find('.input-qty').val();
        var prod_id= $(this).val();
        
       // alert(prod_id);
        $.ajax({
            method:"POST",
            url: "functions/handlecart.php",
            data:{
                "prod_id":prod_id,
                "prod_qty":qty,
                
                "scope": "add"


            },
            cache: false,
            dataType: "dataType",
            success: function(response){
                if(response == 201)
                {
                    alert("product added");
                }
                else if(response == 'Existing'){
                    alert('Product alreafy added');
                }
                else if(response == 401){
                    alert('LOgin to continue');
                }
                else if(response == 500)
                {
                    alert('wrong');
                }

            }

        });
    });

$(document).on('click', '.updateQty' ,function () {
   // alert('hello');
    var qty=$(this).closest('.product_data').find('.input-qty').val();
    var prod_id= $(this).closest('.product_data').find('.prodId').val();

    $.ajax({
        type: "POST",
        url: "functions/handlecart.php",
        data: {
            "product_id": prod_id,
            "prod_qty": qty,
            "scope":"update"
        },
        
        success: function (response) {
            
        }
    });
    
});
$(document).on('click', '.deleteItem', function () {
    var cart_id = $(this).val();
    //alert(cart_id);
    $.ajax({
        type: "POST",
        url: "functions/handlecart.php",
        data: {
            "cart_id": cart_id,
            
            "scope":"delete"
        },
        
        success: function (response) {
            if(response == 200)
                {
                    alert("product deleted");
                    $('#mycart').load(location.href + " #mycart");
                }
            
        }
    });
    
});
 
});

