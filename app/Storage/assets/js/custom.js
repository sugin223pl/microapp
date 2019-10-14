function abort(message)
{
   $('.errorText').html(message).css('display','block');
   throw new Error(message);
}
$('.expandQuote').click(function() {
    $('.expand').toggle();
    $('.hiddenQuote').toggle();
    var classname = $(this).attr('class');
        if(classname == 'expand') {
            $(this).removeClass('expand').addClass('collapse');
        } else if(classname == 'collapse') {
            $(this).removeClass('collapse').addClass('expand');
        }
    
});
$('.whyCurrency').click(function() {
    $('#voucher').toggle('slow');
});
$('#applyVoucher').click(function() {
    $(this).html('').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
    $('#code').attr('disabled', true)
});
$('#countryCodeSelect').change(function() {
    var option = $('option:selected', this);
    var ccode = option.attr('data-country-code');
    $('.selectContent').html(ccode);
});

var lStorage = false;
$(".validateButton").click(function(e) {

function validateName(name) {
    var regName = /^[a-zA-Z-' ]+$/;
    if(!regName.test(name)){
        abort('Please enter your full name (first & last name).')
    }
}
function validateAddress(address) {
    if (address.length < 10) {
        abort('Please enter your address')
    }
}
function validateMessage(message) {
    if (message.length < 10) {
        abort('Please enter a message to your host')
    }
}
function validateNumber(number) {
    if (number.length < 9) {
        abort('Please enter a phone number');
    } else {
        return number = number.replace(/^0+/,'');
    }
}
function validateEmail(email) {
    if (email.length < 6) {
        abort('Please enter your email');
    } else {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var validEmail = emailReg.test(email);
            if (!validEmail) {
                abort('Please enter a valid email');
            }
    }
}
function ajaxGo(phone) {
    $.ajax({
        url: "https://v2.namsor.com/NamSorAPIv2/api2/json/phoneCode/James/Eddison/" + phone,
        data: '',
        type: "GET",
        beforeSend: function(xhr) {
            xhr.setRequestHeader('X-API-KEY', '9f74e628964d4e31167f03d319faebef');
        }, success: function(response, data) {
            if(response.verified === true) {
                lStorage = true
                console.log('Getting response after success done!');
                console.log(lStorage);
            }
        }, complete: function() {
            console.log('Getting response after complete');
            if(lStorage === true) {
                $('.errorText').html('').css('display','none');
                var country_code = $('#countryCodeSelect').val();
                var prefix_sg = $('#countryCodeSelect option:selected').attr('data-country-code');
                $('#prefix_sg').val(prefix_sg);
                var number = $('#renterNumber').val();
                var val_number = validateNumber(number);
                var phone_sg = val_number;
                $('#phone_sg').val(phone_sg);
                var real_phone = country_code + val_number;
                $('#renterNumber').attr('disabled',true);
                $('#countryCodeSelect').attr('disabled',true);
                $('#phone').val(real_phone);
                $(".validateButton").html('').html('<i class="fa fa-circle-o-notch fa-spin"></i>').attr('disabled', true);
                $("#bookingRequestForm").submit();
            } else {
                abort('Please enter a valid phone number');
            }
        },
     });
}
function validatePhone(phone) {
    ajaxGo(phone);
    console.log('Getting response after calling the function')
    console.log(lStorage);
    return lStorage;
}
    var name = $('#renterFullName').val();
    validateName(name);
    $('#renterFullName').attr('readonly',true);
    var ccode = $('#countryCodeSelect option:selected').attr('data-country-code');
    var country_code = $('#countryCodeSelect').val();
    var number = $('#renterNumber').val();
    validateNumber(number);
    var phone = ccode + '' + validateNumber(number);
    var email = $('#renterEmail').val();
    validateEmail(email);
    $('#renterEmail').attr('readonly',true);
    var address = $('#renterAddress').val();
    validateAddress(address);
    $('#renterAddress').attr('readonly',true);
    var message = $('#renterMessage').val();
    validateMessage(message);
    $('#renterMessage').attr('readonly',true);
    validatePhone(phone);
    return false;
});

// $(".submitButton").click(function(e) {
//     var data = JSON.stringify( $(form).serializeArray() );
//     console.log( data );
//     $.post("demo_test_post.asp", {
//         name: "Donald Duck",
//         city: "Duckburg"
//     },
//     function(data, status){
//         alert("Data: " + data + "\nStatus: " + status);
//     });
//     return false;
// });