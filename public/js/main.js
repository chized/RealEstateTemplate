//alert('gooooo!');

$(document).ready(function(){
    $(".close").click(function(){
        $('#mytoast').toast('hide')
    })
});

/* $(':radio').change(function (event) {
    var id = $(this).data('id');
    $('#' + id).addClass('none').siblings().removeClass('none');
}); */
var elems = $(':radio.minimal');
var continer = $('.radio-content');

elems.change(function() {                 
    //Hide all
    continer.hide();

    //Get Selected value
    var v = $(elems).filter(':checked').val();

    //Show the container
    continer.filter('[data-radio=' + v + ']').show();
}).change();

/* function validateImage() {
	var img = $("#imgFile").val();
 
	var exts = ['jpg','jpeg','png','gif', 'bmp', 'webp', 'jfif'];
	// split file name at dot
	var get_ext = img.split('.');
	// reverse name to check extension
	get_ext = get_ext.reverse();
 
	if (img.length > 0 ) {
		if ( $.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
		  return true;
		} else {
			 alert("Upload only jpg, jpeg, png, gif, bmp, jfif, webp iamge");
			return false;
		}			
	} else {
		alert("please upload an image");
		return false;
	}
	return false;
} */
//This function updates textarear for amenities in the the add new property page
function updateTextArea() {
	var allVals = $('input.amenities:checked').map( 
	function() {return this.value;}).get().join();
	$('#txtValue').val(allVals)
}

$(function () {
	$('#amenities input').click(updateTextArea);
	updateTextArea();
});

//function to show or hide password while user is typing
$(document).ready(function() {
    $("#showHidePassword a").on('click', function(event) {
        event.preventDefault();
        if($('#showHidePassword input').attr("type") == "text"){
            $('#showHidePassword input').attr('type', 'password');
            $('#showHidePassword i').addClass( "fa-eye-slash" );
            $('#showHidePassword i').removeClass( "fa-eye" );
        }else if($('#showHidePassword input').attr("type") == "password"){
            $('#showHidePassword input').attr('type', 'text');
            $('#showHidePassword i').removeClass( "fa-eye-slash" );
            $('#showHidePassword i').addClass( "fa-eye" );
        }
    });
});

$(document).ready(function() {
    $("#showHideConfirmPassword a").on('click', function(event) {
        event.preventDefault();
        if($('#showHideConfirmPassword input').attr("type") == "text"){
            $('#showHideConfirmPassword input').attr('type', 'password');
            $('#showHideConfirmPassword i').addClass( "fa-eye-slash" );
            $('#showHideConfirmPassword i').removeClass( "fa-eye" );
        }else if($('#showHideConfirmPassword input').attr("type") == "password"){
            $('#showHideConfirmPassword input').attr('type', 'text');
            $('#showHideConfirmPassword i').removeClass( "fa-eye-slash" );
            $('#showHideConfirmPassword i').addClass( "fa-eye" );
        }
    });
});


$(document).ready(function() {
    $("#showHideLoginPassword a").on('click', function(event) {
        event.preventDefault();
        if($('#showHideLoginPassword input').attr("type") == "text"){
            $('#showHideLoginPassword input').attr('type', 'password');
            $('#showHideLoginPassword i').addClass( "fa-eye-slash" );
            $('#showHideLoginPassword i').removeClass( "fa-eye" );
        }else if($('#showHideLoginPassword input').attr("type") == "password"){
            $('#showHideLoginPassword input').attr('type', 'text');
            $('#showHideLoginPassword i').removeClass( "fa-eye-slash" );
            $('#showHideLoginPassword i').addClass( "fa-eye" );
        }
    });
});

//Funtion to enable admin user toggle property category when adding new properties
$(function() {    // Makes sure the code contained doesn't run until
                  //     all the DOM elements have loaded

    $('#propertyCategory').change(function(){
        $('.categories').hide();
        $('#' + $(this).val()).show();
    });

});


// $(document).ready(function(){

//     load_data();
    
//     function load_data(query='')
//     {
//      $.ajax({
//       url:"cushy/Admins/filCheck",
//       method:"POST",
//       data:{query:query},
//       success:function(data)
//       {
//        $('tbody').html(data);
//       }
//      })
//     }
   
//     $('#multi_search_filter').change(function(){
//      $('#hidden_country').val($('#multi_search_filter').val());
//      var query = $('#hidden_country').val();
//      load_data(query);
//     });
    
//    });

    $(document).ready(() => {

        $('#pword_err').hide();
        $('[data-toggle="tooltip"]').tooltip();   
        
        $('#pword').on('input',() =>{
            const pword = $('#pword').val();
            const msg = validate_string(pword);

            if (msg) {
                $('#pword_err').html(msg);
                $('#pword_err').show().addClass('text-danger');
            }else{
                $('#pword_err').hide().removeClass('text-danger');
            }

        });

        const validate_string = (str) => {
            var msg = '';
          
            if(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/.test(str) ) {
                //alert('Input: has symbol');
            }else{
                msg += 'has no symbol ';
            }

            if(/\d/.test(str) ) {
                //alert('Input: has number');
            }else{
               msg += 'has no number ';
            }

            if(/[a-zA-Z]/.test(str) ) {
                //alert('Input: has alphabet');
            }else{
                msg += 'has no alphabet ';
            }

            return msg;     
        }

    });