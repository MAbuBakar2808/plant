<!-- jQuery -->
<script src="{{ URL('vendor/jquery/jquery.min.js') }}"></script>
    


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>

<script src="{{ URL('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->

<script src="{{ URL('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->

<script src="{{ URL('vendor/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ URL('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ URL('vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ URL('dist/js/sb-admin-2.js') }}"></script>
<script src="{{ URL('dist/js/main.js') }}"></script>


<script type="text/javascript">
		$('.addRow').on('click',function(){
			addRow();
		});
		function addRow() {
			var tr = '<tr>'+	            	
	            		'<td><input type="number" id="vehicle_no" name="trp_vehicle_no[]" class="form-control vno" required>'+
	            		'</td>'+
	            		'<td>'+
                        '<input type="text" id="driver_name" name="trp_driver_name[]" class="form-control dr" required>'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" id="cnic" name="trp_cnic[]" class="form-control cnic"required>'+
                        '</td>'+
                        '<td>'+
                        '<input type="tel" id="cell" name="trp_cell[]" class="form-control cell" required>'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" id="bs_capacity" name="trp_bs_capacity[]" class="form-control bs">'+
                        '</td>'+
                        '<td><a href="#" class="remove"><i style="color: #E47280;" class="glyphicon glyphicon-trash"></i></a>'+
                        '</td>'+
	
            	'</tr>';
            	$('tbody').append(tr);

		};
		$(document).on("click", ".remove", function() {
            var l = $('tbody tr').length;
            if(l==1) {
                alert('You Cannot Remove Last One.');
            } else {
                $(this).parent().parent().remove();
            }
        });


//         $('.saleadd').on('click',function(e){
//             e.preventDefault();
//             saleAdd();
//         });
//         function saleAdd() {
//             var tr = '<tr>'+                    
//                         '<td><input type="number" name="cyl_capacity[]" class="form-control capacity">'+
//                         '</td>'+
//                         '<td>'+
//                         '<input type="text" name="cyl_qty[]" class="form-control qty">'+
//                         '</td>'+
//                         '<td>'+
//                         '<input type="text" name="faulty[]" class="form-control faulty">'+
//                         '</td>'+
//                         '<td>'+
//                         '<input type="tel" name="filled[]" class="form-control filled">'+
//                         '</td>'+
//                         '<td>'+
//                         '<input type="text" name="final_rate[]" class="form-control final-rate">'+
//                         '</td>'+
//                         '<td>'+
//                         '<input type="text" name="amount[]" class="form-control amount">'+
//                         '</td>'+
//                         '<td><a href="#" class="remove"><i style="color: #E47280;" class="glyphicon glyphicon-trash"></i></a>'+
//                         '</td>'+
    
//                 '</tr>';
//                 $('tbody').append(tr);

//         };
//         $(document).on("click", ".remove", function() {
//             var l = $('tbody tr').length;
//             if(l==1) {
//                 alert('You Cannot Remove Last One.');
//             } else {
//                 $(this).parent().parent().remove();
//             }
//         });
// function show(){
//   document.getElementById('panels').style.display = 'block';
//  }



$('.salead').on('click',function(){
            saleAd();
        });
        function saleAd() {
            var tr = '<tr>'+                    
                        '<td><input type="number" id="qty" name="cyl_qty[]" class="form-control">'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" id="capacity" name="cyl_capacity[]" class="form-control">'+
                        '</td>'+
                        '<td>'+
                        '<input type="text" id="remarks" name="remarks[]" class="form-control">'+
                        '</td>'+
                        '<td><a href="#" class="remove"><i style="color: #E47280;" class="glyphicon glyphicon-trash"></i></a>'+
                        '</td>'+
    
                '</tr>';
                $('tbody').append(tr);

        };
        $(document).on("click", ".remove", function() {
            var l = $('tbody tr').length;
            if(l==1) {
                alert('You Cannot Remove Last One.');
            } else {
                $(this).parent().parent().remove();
            }
        });
//This Code Belongs to Enter Cursor position to next field on every form field

$('body').on('keydown', 'input, select, textarea', function(e) {
    var self = $(this)
      , form = self.parents('form:eq(0)')
      , focusable
      , next
      ;
    if (e.keyCode == 13) {
        focusable = form.find('input,a,select,button,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
            next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});

var country = ["Select City","Ahmadpur East"," Ahmed Nager Chatha"," Ali Khan Abad"," Alipur"," Arifwala"," Attock"," Bhera"," Bhalwal"," Bahawalnagar"," Bahawalpur"," Bhakkar"," Burewala"," Chillianwala"," Choa Saidanshah"," Chakwal"," Chak Jhumra"," Chichawatni"," Chiniot"," Chishtian"," Chunian"," Dajkot"," Daska"," Davispur"," Darya Khan"," Dera Ghazi Khan"," Dhaular"," Dina"," Dinga"," Dhudial Chakwal"," Dipalpur"," Faisalabad"," Fateh Jang"," Ghakhar Mandi"," Gojra"," Gujranwala"," Gujrat"," Gujar Khan"," Harappa"," Hafizabad"," Haroonabad"," Hasilpur"," Haveli Lakha"," Jalalpur Jattan"," Jampur"," Jaranwala"," Jhang"," Jhelum"," Kallar Syedan"," Kalabagh"," Karor Lal Esan"," Kasur"," Karachi"," Kamalia"," Kāmoke"," Khanewal"," Khanpur"," Khanqah Sharif"," Kharian"," Khushab"," Kot Adu"," Jauharabad"," Lahore"," Islamabad"," Lalamusa"," Layyah"," Lawa Chakwal"," Liaquat Pur"," Lodhran"," Malakwal"," Mamoori"," Mailsi"," Mandi Bahauddin"," Mian Channu"," Mianwali"," Miani"," Multan"," Murree"," Muridke"," Mianwali Bangla"," Muzaffargarh"," Narowal"," Nankana Sahib"," Okara"," Renala Khurd"," Pakpattan"," Pattoki"," Pindi Bhattian"," Pind Dadan Khan"," Pir Mahal"," Qaimpur"," Qila Didar Singh"," Rabwah"," Raiwind"," Rajanpur"," Rahim Yar Khan"," Rawalpindi"," Sadiqabad"," Sagri"," Sahiwal"," Sambrial"," Samundri"," Sangla Hill"," Sarai Alamgir"," Sargodha"," Shakargarh"," Sheikhupura"," Shujaabad"," Sialkot"," Sohawa"," Soianwala"," Siranwali"," Tandlianwala"," Talagang"," Taxila"," Toba Tek Singh"," Vehari"," Wah Cantonment"," Wazirabad"," Yazman"," Zafarwal"];
$("#country").select2({
  data: country
});

//This Code is for Quick Search 
$("#myInput").on("keyup", function() {
var value = $(this).val().toLowerCase();
$("#myTable tr").filter(function() {
  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
});
});

//Calaculate Retail Sale Values
 $(".retail-sale").on('keyup','.capacity, .qty, .faulty',function(){
    var capacity = $(this).parent().parent().children().find(".capacity").val();
    var qty = $(this).parent().parent().children().find(".qty").val();
    var faulty = $(this).parent().parent().children().find(".faulty").val();
    
    if (capacity == '' || qty == '' || faulty == '' ) {
        return;
    }
    
    var filledValue, totalAmount;
    var rate = $(".rate").val();
    
    if (capacity == 11.8) {
        filledValue = qty-faulty;
        totalAmount = rate*filledValue;
    } else {
        // capacity / 11.8 * 200
        var rate = (( capacity / 11.8 ) * rate).toFixed(4);
        filledValue = qty-faulty;
        totalAmount = (rate*filledValue).toFixed(4);
    }

    $(this).parent().parent().children().find(".final-rate").val(rate);
    $(this).parent().parent().children().find(".filled").val(filledValue);
    $(this).parent().parent().children().find(".amount").val(totalAmount);
 });

// $( function() {
//     $( "#datepicker" ).datepicker({
//         "dateFormat": "dd-mm-yy"
//     });
//   } );

function myFunction() {
    var x = document.getElementById("mySelect").value;
    
    var url = "{{ url('igp-cylfill/get-Token') }}";

    $.ajax({
        type:'GET',
        url:url,
        data:{
            "plant_id": x
        },
        success:function(data){
            console.log();
            $('#token_no').append().val(data);
        }

    });
}

function getPlantRecords() 
{
    var id = $("#plant_id").val();
    {{-- window.location = "{{ url('retail-sale/getPlant/') }}"+id; --}}
    
    var url = "{{ route('retail-sale.getPlant') }}";

    $.ajax({
        type:'GET',
        url:url,
        data:{
            "plant_id": id
        },
        success:function(data){
            $('#myModal').modal('toggle')
            $('#modal-data-div').html(data.html);

            //console.log(data);
            // $('#token_no').append().val(data);
        }

    });
}

// retail-sale.getPlant


</script>
</body>

</html>