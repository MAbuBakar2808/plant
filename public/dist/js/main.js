//This Code is for Quick Search 

$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

//Calaculate Retail Sale Values  

 // $(".retail-sale").on('keyup','.capacity, .qty, .faulty',function(){
 // 	var capacity = $(this).parent().parent().children().find(".capacity").val();
 // 	var qty = $(this).parent().parent().children().find(".qty").val();
 // 	var faulty = $(this).parent().parent().children().find(".faulty").val();
 	
 // 	if (capacity == '' || qty == '' || faulty == '' ) {
 // 		return;
 // 	}
 	
 // 	var filledValue, totalAmount;
 // 	var rate = $(".rate").val();
 	
 // 	if (capacity == 11.8) {
	//  	filledValue = qty-faulty;
	//  	totalAmount = rate*filledValue;
 // 	} else {
 // 		// capacity / 11.8 * 200
 // 		var rate = ( capacity / 11.8 ) * 200;
	//  	filledValue = qty-faulty;
	//  	totalAmount = rate*filledValue;
 // 	}

	// $(this).parent().parent().children().find(".final-rate").val(rate);
	// $(this).parent().parent().children().find(".filled").val(filledValue);
	// $(this).parent().parent().children().find(".amount").val(totalAmount);
 // });

//This is for date picker I have include 2 files in head and footer to working
//this function

// $( function() {
//     $( "#datepicker" ).datepicker({
//     	"dateFormat": "dd-mm-yy"
//     });
//   } );


}); // end documetn ready.


