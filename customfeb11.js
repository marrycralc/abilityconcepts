if ($(window).width() > 576) {
    jQuery(document).ready(function () {

var navMenu = $("header");
var navMenuOffset = 100; 

$(window).scroll(function () {
if ($(window).scrollTop() > navMenuOffset) {
if (!$("body").hasClass("open")) {
navMenu.addClass("sticky");
}
} else {
navMenu.removeClass("sticky");
}
});

});

}

//Menu Icon For Mobile


$('.menu-icon').click(function () {
$('.navbar_menu').toggleClass('display');
$("body").toggleClass("noscroll");

if ($('.navbar_menu').hasClass('display')) {
$(".navbar_menu").slideDown(300);
} else {
$(".navbar_menu").slideUp(300, function () { });
}
});

$('.menu-closebtn').click(function () {
$('.menu-icon').removeClass('active');
$("body").removeClass("noscroll");
$(".navbar_menu").slideUp(300, function () {
$('.navbar_menu').removeClass('display');
});
});

$(document).ready(function () {
$(".arrow-icon").click(function () {
$(this).parent("li").siblings(".hasDropdown").removeClass("active");
$(this).parent("li").siblings().find(".dropDownMenu").slideUp();
$(this).parent("li").find(".dropDownMenu").slideToggle();
$(this).parent("li").toggleClass("active")
});



});

$('.banner_slider').slick({
dots: true,
infinite: false,
slidesToShow: 1,
arrows: true,
autoplay: false,


});




$('.success_story').slick({
dots: false,
infinite: false,
slidesToShow: 1,
arrows: true,
autoplay: false,
loop: true,
prevArrow: $(".pre-success"),
nextArrow: $(".next-success"),

});


$(document).ready(function () {
$(".video-img").click(function () {
$("#popup_default").fadeIn();
});

// Close the popup
$(".close-popup, .popup-overlay").click(function () {
$("#popup_default").fadeOut();
});








});



//-----JS for Price Range slider-----
if ($("#slider-range").length > 0) {

$(function () {

$("#slider-range").slider({
range: true,
min: 0,
max: 500,
values: [0, 70],
slide: function (event, ui) {
$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
}
});
$("#amount").val("$" + $("#slider-range").slider("values", 0) +
" - $" + $("#slider-range").slider("values", 1));
});
}
$(document).ready(function () {
$('.icons_small.pre').click(function () {
$('.tab-content.active .slick1').slick('slickPrev');
});

$('.icons_small.next').click(function () {
$('.tab-content.active .slick1').slick('slickNext');
});


// Initialize Slick slider
$('.slick1').slick({
rows: 2,
dots: false,
arrows: false,
infinite: true,
speed: 300,
slidesToShow: 4,
slidesToScroll: 4,

responsive: [
{
breakpoint: 991,
settings: {
slidesToShow: 3,
slidesToScroll: 3,
}
},
{
breakpoint: 768,
settings: {
slidesToShow: 1,
slidesToScroll: 1,
}
}
]
});

// Reinitialize Slick on window resize

});

$(document).ready(function () {

(function() {
    // Equal Height Title
    let product_info = document.querySelectorAll('.product_info > h2'); 
    let arr = [];
    
    product_info.forEach(function(e) {
        arr.push(e.offsetHeight);
    });
    
    const highest = Math.max(...arr); 
    $(product_info).css("height", highest);
})();


$(".dropdownHolder").click(function () {

$(this).siblings(".dropdownHolder").removeClass("active");
$(this).siblings().find(".dropdownMenu").slideUp(350);
$(this).find(".dropdownMenu").css('display', 'block');
$(this).addClass("active");

});

$('.dropdownMenu ul li .sub-cat').on('click', function () {
// alert('dsds')
var itsval = $(this).text()
// console.log(itsval)

$('span.sub_bread_crumb').html('<span class="brdcumarrw">></span><span class="sub-bdcrumprdctname">' + itsval + '</span>')
})



$(document).on('click', '.tab-link', function (e) {
e.preventDefault();
function sameHeightSlides() {
var items = document.querySelectorAll('.latest_slider .slide-item');

// Find the maximum height
var maxHeight = 0;
items.forEach(function (item) {
maxHeight = Math.max(maxHeight, item.offsetHeight);
});

// Set the same height to all items
items.forEach(function (item) {
item.style.height = maxHeight + 'px';
});
}
sameHeightSlides(); // Run tabchange initially

var linker = $(this).text(); // Get the text of the clicked element
var tabID = $(this).attr('data-tab');

$(this).addClass('active').siblings().removeClass('active');

$('#tab-' + tabID).addClass('active').siblings().removeClass('active');
$('.tab-content.active .latest_slider').slick('setPosition');


});

});


function changeQty(variant_id) {
qty = $('#qty_' + variant_id).val();
editCartQuantity(variant_id, qty, qty);
}

function decrementQty(variant_id) {
qty = $("#qty_" + variant_id).val();
if (qty > 1) {
$("#qty_" + variant_id).attr('value', qty - 1);
editCartQuantity(variant_id, qty - 1, qty);
}
}

function incrementQty(variant_id) {
qty = $("#qty_" + variant_id).val();

$("#qty_" + variant_id).attr('value', parseInt(qty) + 1);
editCartQuantity(variant_id, parseInt(qty) + 1, qty);
}


$(document).ready(function () {
$("#slider-range").slider({
range: true,
min: 10,
max: 200000,
values: [10, 200000],
slide: function (event, ui) {
$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
}
});

$("#amount").val("$" + $("#slider-range").slider("values", 0) +
" - $" + $("#slider-range").slider("values", 1));


});


$('.product-may-like').slick({
slidesToShow: 1,
slidesToScroll: 1,
dots: false,
fade: false,
infinite: true,
speed: 100,
arrows: true,
prevArrow: "<div class='block_arrow prev slick-prev'><img class='a-left control-c ' src='"+my_site_object.site__url+"'/wp-content/uploads/2024/01/long-arrow-left.svg'></div>",
nextArrow: "<div class='block_arrow next slick-next'><img class='a-right control-c ' src='"+my_site_object.site__url+"'/wp-content/uploads/2024/01/long-arrow.svg'></div>",
asNavFor: '.product-slider-thumb',
autoplay: false,

responsive: [{
breakpoint: 1367,
settings: {

slidesToShow: 1,
slidesToScroll: 1,

}
},

{
breakpoint: 992,
settings: {

slidesToShow: 1,
slidesToScroll: 1,

}
}, {
breakpoint: 768,
settings: {

slidesToShow: 1,
slidesToScroll: 1,

}
}, {
breakpoint: 576,
settings: {

slidesToShow: 1,
slidesToScroll: 1,

}
},
]


});
$('.product-slider-thumb').slick({
slidesToShow: 5,
slidesToScroll: 5,
asNavFor: '.product-may-like',
dots: false,
arrows: true,
focusOnSelect: true,

responsive: [{
breakpoint: 576,
settings: {

vertical: false,
slidesToShow: 5,
slidesToScroll: 5,
}
},]
});

$("#single_product_form").on("submit", function (e) {
e.preventDefault();


})


// Function to close the modal
$('#closeModalBtn').on('click', function () {
$('#modalOverlay').fadeOut();
});
// Close the modal when clicking outside of it
$('#modalOverlay').on('click', function (event) {
if ($(event.target).hasClass('modal-overlay')) {
$('#modalOverlay').fadeOut();
}
});


// FAQs
document.querySelectorAll('.accordion-header').forEach(button => {
button.addEventListener('click', (e) => {
const accordionContent = button.nextElementSibling;

button.classList.toggle('active');

if (button.classList.contains('active')) {
accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
} else {
accordionContent.style.maxHeight = 0;
}

setTimeout(() => {
$('body, html').animate({ scrollTop: $(e.target).parents('.accordion-item').offset().top - 98 }, 600);
}, 550);

// Close other open accordion items
document.querySelectorAll('.accordion-header').forEach(otherButton => {
if (otherButton !== button) {
otherButton.classList.remove('active');
otherButton.nextElementSibling.style.maxHeight = 0;
}
});
});
});



//  Product Grid & List 
(function () {
var icon = document.getElementsByClassName('icon');
var products = document.getElementsByClassName('products');

function hasClass(elem, className) {
return elem.classList.contains(className);
}


for (var i = 0, len = icon.length; i < len; i++) {
icon[i].addEventListener('click', function () {
if (hasClass(this, 'active')) {
return;
} else {
for (var j = 0, len = icon.length; j < len; j++) {
icon[j].classList.toggle('active');
}
products[0].classList.toggle('list');
products[0].classList.toggle('grid');

}

});

}
})();



$('.logo_inner').slick({
infinite: false,
slidesToShow: 8,
slidesToScroll: 1,
dots: false,
prevArrow: "<div class='block_arrow prev slick-prev'><img src="+my_site_object.site__url+"/wp-content/uploads/2024/01/long-arrow-left.svg'></div>",
nextArrow: "<div class='block_arrow next slick-next'><img src="+my_site_object.site__url+"/wp-content/uploads/2024/01/long-arrow.svg'></div>",
responsive: [
{ breakpoint: 1199, settings: { slidesToShow: 5, slidesToScroll: 1, } },
{ breakpoint: 992, settings: { slidesToShow: 3, slidesToScroll: 1, } },
{ breakpoint: 751, settings: { slidesToShow: 2, slidesToScroll: 1, } },
{ breakpoint: 576, settings: { slidesToShow: 1, slidesToScroll: 1 } }
]
});
$("#chart_shopping").click(function () {
$(".siderbar_wrapper").addClass("show-popup");
$(".sidenav").addClass("active");
$("body").addClass("overflow-hidden");

$(document).on('keydown', function (e) {
if (e.key === "Escape") {
closeSidebar();
}
});

$(document).on('click', function (event) {
if (!$(event.target).closest("#chart_shopping, .siderbar_wrapper").length) {
closeSidebar();
}
});
});

$(".close_svg").click(function () {
closeSidebar();
});

function closeSidebar() {
$(".siderbar_wrapper").removeClass("show-popup");
$(".sidenav").removeClass("active");
$("body").removeClass("overflow-hidden");

$(document).off('keydown').off('click');
}

$(document).ready(function () {

$(".search").click(function () {
$("body").toggleClass("open");
});
$(".menu-closebtnsearch").click(function () {
$("body").toggleClass("open");
});
});

// woocommerce

jQuery(document).ready(function ($) {


// Get the variation labels
// var head = $('.variations .label label').map(function() {
//     return $(this).text();	
// }).get();

//     var head = $('.variations th.label label').text();
//     $('.variations select option').attr('data-head', head)


$('.variations th.label label').each(function() {
var head = $(this).attr('for');
if (head) {
// Find the corresponding select element using the 'for' attribute
$('#' + head + ' option').attr('data-head', head);
} else {
console.log('No "for" attribute found for label:', this);
}
});


// 	console.log(head)


$('#single_mail').on('click', function (e) {
e.preventDefault();

myFunction();
});

function isValidEmail(email) {
var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
return emailPattern.test(email);
}
function myFunction() {

var selctobjj = {};
$('.slider_decription select').each(function () {
var head = $('option:selected', this).data('head');
var value = $('option:selected', this).text();
if (head in selctobjj) {
selctobjj[head] += ', ' + value;
} else {
selctobjj[head] = value;
}
// selctobjj[head] = value;
});

var checkboxValueObj = {};
$('.Componenets [type="checkbox"]:checked').each(function () {
var checkboxhead = $(this).first().data('head');
var checkboxValue = $(this).next('label').text();

if (checkboxhead in checkboxValueObj) {

checkboxValueObj[checkboxhead] += '<br> ' + checkboxValue;
} else {
checkboxValueObj[checkboxhead] = checkboxValue;
}
});
console.log(checkboxValueObj);
var radioValueObj = {};
$('.Componenets [type="radio"]:checked').each(function () {
var radioHead = $(this).data('head');
var radioValue = $(this).next('label').text();

if (radioHead in radioValueObj) {

radioValueObj[radioHead] += ', ' + radioValue;
} else {
radioValueObj[radioHead] = radioValue;
}
});

console.log(radioValueObj);


var select_data = [];
$.each(selctobjj, function (key, value) {
if (key !== 'undefined' && value !== 'undefined' && value !== 'Choose an option') {
select_data.push({ key: key, value: value });
}
});

var check_data = [];
$.each(checkboxValueObj, function (key, value) {
check_data.push({ key: key, value: value });
});


var radio_data = [];
$.each(radioValueObj, function (key, value) {
radio_data.push({ key: key, value: value });
});



var firstName = $('#first_name').val();
var lastName = $('#last_name').val();
var phoneNumber = $('#phone_number').val();
var email = $('#email_id').val();
var message = $('#message').val();
var productName = $('.slider_decription h2.headings-desc').text();
console.log(productName);

const first_nameObj = document.getElementById("first_name");
console.log(first_nameObj)
const last_nameObj = document.getElementById("last_name");
const phone_numberObj = document.getElementById("phone_number");
const emailObj = document.getElementById("email_id");
const messageObj = document.getElementById("message");

var errorElements = document.querySelectorAll('.errors');
errorElements.forEach(function (element) {
element.remove();
});

if (!first_nameObj.checkValidity() || !last_nameObj.checkValidity() || !phone_numberObj.checkValidity() || !emailObj.checkValidity() || !messageObj.checkValidity()) {
var allFieldsValid = true;
var fieldIds = ["first_name", "last_name", "phone_number", "email_id", "message"];

fieldIds.forEach(function (fieldId) {
var fieldElement = document.getElementById(fieldId);
if (!fieldElement.checkValidity()) {
allFieldsValid = false;
if (!document.getElementById(fieldId + "_error")) {
var errorSpan = document.createElement("span");
errorSpan.className = 'errors';
errorSpan.id = fieldId + "_error";
errorSpan.textContent = fieldElement.validationMessage;
fieldElement.parentNode.insertBefore(errorSpan, fieldElement.nextSibling);
}
} else if (fieldId === "email_id" && !isValidEmail(email)) {
allFieldsValid = false;
if (!document.getElementById(fieldId + "_error_pattern")) {
var errorSpanPattern = document.createElement("span");
errorSpanPattern.className = 'errors';
errorSpanPattern.id = fieldId + "_error_pattern";
errorSpanPattern.textContent = "Please enter a valid email address with .com";
fieldElement.parentNode.insertBefore(errorSpanPattern, fieldElement.nextSibling);
}
}
});

if (!allFieldsValid) {
console.log("One or more fields are invalid");
return;
}
}

var t_price = $('.regular-price span.woocommerce-Price-amount.amount bdi').text()

$.ajax({
type: 'POST',
url: my_ajax_object.ajax_url,
dataType: 'json', 
data: {
'action': 'send_inquiry_email',
'product_name': productName,
'first_name': firstName,
'last_name': lastName,
'phone_number': phoneNumber,
'email': email,
'message': message,
'select_data': select_data,
'check_data': check_data,
'radio_data': radio_data,
'total_amount': t_price
},
beforeSend: function () {
$('.loader').show();
$('#single_mail').css('pointer-events', 'none');

},
success: function (response) {
$('.loader').hide();
console.log(response);
$("#model_form")[0].reset();
$('#single_mail').after('<p id="thanks_msg" class="thanks_msg">Thank you for your inquiry. We will get back to you soon.</p>');

setTimeout(function () {
$('#thanks_msg').fadeOut('slow');
}, 5000);
$('.errors').remove(); 
},
error: function (xhr, status, error) {
console.error(error);
}
});
}

jQuery(document).ready(function ($) {

function updateRegularPrice() {
$('.regular-price span.woocommerce-Price-amount.amount bdi').text('$' + totalPrice.toLocaleString('en-US', { minimumFractionDigits: 2 }));
}

function extractNumericValue(str) {
var priceMatch = str.match(/\$([\d,]+(\.\d+)?)/);
return priceMatch ? parseFloat(priceMatch[1].replace(/,/g, '')) : 0.0;
}

var totalPriceText = $('.regular-price bdi').text().replace('$', '');
var totalPrice = parseFloat(totalPriceText.replace(/,/g, '')) || 0;

// Handle dropdown menu changes
$('select').each(function () {
var initialSelectPrice = $(this).val();
var initialPriceToAdd = extractNumericValue(initialSelectPrice);
$(this).data('previous-value', initialPriceToAdd);
if (!isNaN(initialPriceToAdd)) {
totalPrice += initialPriceToAdd;
}
});

$('select').on('change', function () {
var selectPrice = $(this).val();
var priceToAdd = extractNumericValue(selectPrice);
var previousValue = $(this).data('previous-value');

if (!isNaN(previousValue)) {
totalPrice -= previousValue;
}
if (!isNaN(priceToAdd)) {
totalPrice += priceToAdd;
$(this).data('previous-value', priceToAdd);
} else {
$(this).data('previous-value', null);
}
updateRegularPrice();
});

$('.radio_check').on('change', function () {
    var selectPrice = $(this).val();
    var priceToAdd = extractNumericValue(selectPrice);
    
    var previousValue = $(this).closest('.Componenets').attr('previous-value') || 0;
//     console.log('Previous Value:', previousValue);

    if (!isNaN(previousValue)) {
        totalPrice -= previousValue;
    }
    if (!isNaN(priceToAdd)) {
        totalPrice += priceToAdd;
        
        $(this).closest('.Componenets').attr('previous-value', priceToAdd);
    } else {
        $(this).closest('.Componenets').attr('previous-value', 0);
    }
    
    updateRegularPrice();
})

// Checkbox functionality
$('.checkbox').on('change', function () {
var value = $(this).data("val").toString().replace(/,/g, ''); // Ensure it's a string and remove commas
var parsedValue = parseFloat(value);
            var componentPrice = parsedValue; 
if (!isNaN(componentPrice)) {
$(this).prop('checked') ? totalPrice += componentPrice : totalPrice -= componentPrice;
updateRegularPrice();
}
});


updateRegularPrice();
});



var checkbox = $('#one');
var hiddenInput = $('<input>').attr({
type: 'hidden',
name: 'radio_group',
value: '0'  
});
$('.checkoutpage').addClass('hide_tab');
checkbox.change(function () {
hiddenInput.val(checkbox.prop('checked') ? '$432.00' : '0');
});

$('.cart').append(hiddenInput);
})




// Filterslinker
$('.filter_mocicn').on('click', function (e) {
$('.productslanding__hldr').toggleClass("pressed"); 
$('body').toggleClass("pressed-overlay"); 

});
$('.filter_mocicnclose, .productslanding__listing .dropdownHolder .dropdownMenu li a').on('click', function (e) {
$('.productslanding__hldr').removeClass("pressed"); 
$('body').removeClass("pressed-overlay"); 
});


$(document).ready(function () {

$('.add_arrow li a').append('<svg xmlns="http://www.w3.org/2000/svg" width="18.496" height="12.275" viewBox="0 0 18.496 12.275"><g id="noun-arrow-109399" transform="translate(-10)"><path id="Path_616" data-name="Path 616" d="M29.442,43.364H44.93l-4.314,4.284a.684.684,0,1,0,.964.97l5.473-5.433a.684.684,0,0,0,0-.967l-5.432-5.473a.684.684,0,1,0-.971.964L44.908,42H29.442a.684.684,0,0,0,0,1.369Z" transform="translate(-18.758 -36.541)"></path> </g></svg>');

$(' .addlabell + span').replaceWith(function () {
return $("<label for='for-class-contact'><label />").append($(this).contents());
});

$('.font22 + span').replaceWith(function () {
return $("<label for='for-class'><label />").append($(this).contents());
});
})
$(document).ready(function () {
function addFullWidthToNext() {
$('.add_class').addClass('full-width-grid');
}

$('.productshowtype').on('click', function () {
addFullWidthToNext();
});


$('.siderbar_wrapper  .close_svg').on('click', function () {
$('.siderbar_wrapper').removeClass('show-popup');
$('#mySidenav').removeClass('active');
$('body').trigger('click');
});



});

$("#phone_number, #contact_num").keypress(function (event) {
var ew = event.which;
if (ew < 48 || ew > 57) {
return false;
}
return true;
});

jQuery(document).ready(function ($) {
    $('.filter-paginate .page-numbers').removeClass('page-numbers').addClass('new-pagination');
    var currentUrl = window.location.href;
    var urlParts = currentUrl.split('/');
    var categorySlug = urlParts[urlParts.length - 2];

    setTimeout(function () {
        if ($('[data-slec-cat="' + categorySlug + '"].sub-cat')) {
            $('[data-slec-cat="' + categorySlug + '"]').addClass('sub-active').find('.dropdownMenu').css('display', 'block');
            $('[data-slec-cat="' + categorySlug + '"]').closest('.dropdownHolder').addClass('active').find('.dropdownMenu').css('display', 'block');
        } else if ($('[data-slec-cat="' + categorySlug + '"]')) {
            $('[data-slec-cat="' + categorySlug + '"]').closest('.dropdownHolder').addClass('active').find('.dropdownMenu').css('display', 'block');
        }
    }, 0);

    var currentPage = 1; 
    var value1, value2;

    $('#product-count').change(function () {
        var subcat = $("a.sub-cat.sub-active").data('cat-tag'); 
        var parcattag = $('.dropdownHolder.active').find('.parent_cat').data('pcat-tag'); 
        var orderby = $('select.orderby').val();
        var sdata = $('.input_search').val();

        loadProducts(parcattag, currentPage, value1, value2, subcat, orderby, sdata);
    });

    $(document).on('click', 'a.new-pagination', function (e) {
        e.preventDefault();
        var clickedPage = parseInt($(this).text().replace(/,/g, ''));
        if (!isNaN(clickedPage)) {
            currentPage = clickedPage;
        } else if ($(this).hasClass('prev')) {
            currentPage--;
        } else if ($(this).hasClass('next')) {
            currentPage++;
        }

        var subcat = $("a.sub-cat.sub-active").data('cat-tag'); 
        var parcattag = $('.dropdownHolder.active').find('.parent_cat').data('pcat-tag'); 
        var orderby = $('select.orderby').val();
        var sdata = $('.input_search').val();

        loadProducts(parcattag, currentPage, value1, value2, subcat, orderby, sdata);

        if ($('.product').length < 4) {
            window.scroll({
                top: $('.productslanding').offset().top,
                behavior: 'smooth'
            });
        }
    });

    $('.parent_cat').on('click', function () {
    $('#header-search0')[0].reset();
        $('.input_search').val(''); 
        $("a.sub-cat").removeClass('sub-active');
        var parcattag = $(this).data('pcat-tag');
        var orderby = $('select.orderby').val();
        currentPage = 1;
        $('a.page-numbers').attr('data-pcat-tag', parcattag);
        loadProducts(parcattag, currentPage, value1, value2, null, orderby, ''); 
    });

    $("a.sub-cat").click(function () {
        var orderby = $('select.orderby').val();
        $("a.sub-cat").removeClass('sub-active');
        currentPage = 1; 
        var subcat = $(this).data('cat-tag');
        $(this).addClass('sub-active'); 
        loadProducts(null, currentPage, value1, value2, subcat, orderby, ''); 
    });

    $('.chh').on('change', function () {
        currentPage = 1; 
        var subcat = $("a.sub-cat.sub-active").data('cat-tag'); 
        var parentcat = $('.dropdownHolder.active').find('.parent_cat').data('pcat-tag'); 
        loadProducts(parentcat, currentPage, value1, value2, subcat, null, ''); 
    });

    $('#ordForm').submit(function (event) {
        event.preventDefault();
        var orderby = $('select.orderby').val(); 
        var subcat = $("a.sub-cat.sub-active").data('cat-tag');
        var parentcat = $('.dropdownHolder.active').find('.parent_cat').data('pcat-tag');
        var sdata = $('.input_search').val();
        currentPage = 1; 
        loadProducts(parentcat, currentPage, value1, value2, subcat, orderby, sdata);
    });

    function getUrlParameter(name) {
        name = name.replace(/[[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    $("#slider-range").on("slidechange", function (event, ui) {
        $('.filter_mocicnclose').trigger('click');
        var array = [];
        $('.chh:checked').each(function () {
            array.push($(this).next('label').text());
        });

        var sdata = $('.input_search').val(); 

        var subcat = $("a.sub-cat.sub-active").data('cat-tag');
        var parentcat = $('.dropdownHolder.active').find('.parent_cat').data('pcat-tag');
        var orderby = $('select.orderby').val();

        var inputString = $("#amount").val();
        var cleanedString = inputString.replace(/[$,]/g, '');
        var values = cleanedString.split(' - ');
        value1 = values[0];
        value2 = values[1];

        loadProducts(parentcat, currentPage, value1, value2, subcat, orderby, sdata); 
    });

    $('.hidden-input-click').on('click', function () {
        console.log("test one");
        $('.hidden-input').val("hello");
    });

    function loadProducts(parcattag, currentPage, value1, value2, subcat, orderby, sdata) {
        setTimeout(function(){
            let product_info = document.querySelectorAll('.product_info > h2'); 
            let arr = [];
            product_info.forEach(function(e) {
                arr.push(e.offsetHeight);
            });
            const highest = Math.max(...arr); 
            $(product_info).css("height", highest);
        }, 2000);

        var array = [];
        $('.chh:checked').each(function () {
            array.push($(this).next('label').text());
        });
        var count = $('#product-count').val();
        let serachquery = $('.input_search').val()
        var requestData = {
            action: 'filtertermproduct',
			s:serachquery,
            count: count,
            sprice: value1,
            eprice: value2,
            pcat_nmae: parcattag,
            choice: array,
            page: currentPage,
            orderby: orderby,
           
        };

        if (subcat) requestData.cat_name = subcat;
        if (sdata) requestData.s = sdata;

        jQuery.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: requestData,
            success: function (response) {
                $('.filter-content').html(response).hide().fadeIn(400);
                $('.add_class').addClass('full-width-grid');
                $('.filter-paginate .page-numbers').removeClass('page-numbers').addClass('new-pagination');
                $('.productslanding__paginationinnr.hide-paginate').hide();
                var numItems = $('.result_cnt').length;
                $('.resultlisting').text('Showing All ' + numItems + ' Results');
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

});



jQuery(document).ready(function ($) {

var numItems = $('.result_cnt').length;
$('.resultlisting').text('Showing All ' + numItems + ' Results')
$(document).on('click', 'a.page-numbers', function (e) {
e.preventDefault();
var page = $(this).attr('href'); 

$.ajax({
url: page,
type: 'GET',
success: function (data) {
var productContent = $(data).find('.products').html();
var paginationContent = $(data).find('.productslanding__paginationinnr').html();

$('.products').fadeOut(400, function () {
$(this).html(productContent).fadeIn(400);
});
$('.productslanding__paginationinnr').fadeOut(400, function () {
$(this).html(paginationContent).fadeIn(400);
});


if ($(data).find('.product').length < 4) {
window.scroll({
top: $('.productslanding').offset().top,
behavior: 'smooth'
});
}


$('.pagination_link').removeClass('active');
$(this).closest('.pagination_link').addClass('active');
}
});
});



// function sanitizeSearchInput(input) {

// return input.replace(/[^\w\s]/g, '').toLowerCase();
// }

// function truncateSearchInput(input, maxLength) {

// return input.length > maxLength ? input.substring(0, maxLength) : input;
// }

// function sanitizeSearchQuery(query) {

// query = query.replace(/[^a-zA-Z0-9\s]/g, ' ');

// query = query.replace(/\s+/g, ' ').trim();
// return query;
// }


let debounceTimeout;

function input_sech(searchQuery, searchCat) {
    clearTimeout(debounceTimeout);

    debounceTimeout = setTimeout(function () {
      
        var searchQueryTrimmed = searchQuery.trim().toLowerCase();

        $.ajax({
            type: "GET",
            url: 'https://abilityconcepts.ca/wp-json/custom/v1/products-by-sku',
            dataType: "json",
            data: {
                sku: searchQueryTrimmed,
                category_id: searchCat, // Only using category ID
             
                per_page: 10
            },
            success: function (result) {
                console.log("API Response:", result);

                if (result && result.status === 200 && Array.isArray(result.data) && result.data.length > 0) {
                    let relevantProducts = filterRelevantResults(result.data, searchQueryTrimmed);
                    if (relevantProducts.length > 0) {
                        renderProducts(relevantProducts);
                    } else {
                        searchByTitle(searchQueryTrimmed, searchCat);
                    }
                } else {
                    console.log("No exact SKU-category match, searching by title...");
                    searchByTitle(searchQueryTrimmed, searchCat);
                }
            },
            error: function (err) {
                console.log("Error:", err);
                $('#keypro').html('Product Not Found').show();
            }
        });
    }, 500);
}


function searchByTitle(searchQuery, searchCat) {
    var consumerKey = 'ck_7a1e975e36b136e5428e9c3707046c3c5807c0ac';
    var consumerSecret = 'cs_06cd582168914c5f073e38364e3518cfe41eac24';

    $.ajax({
        type: "GET",
        url: 'https://abilityconcepts.ca/wp-json/wc/v3/products',
        dataType: "json",
        data: {
            search: searchQuery,
            category: searchCat,
            consumer_key: consumerKey,
            consumer_secret: consumerSecret,
            per_page: 100
        },
        success: function (result) {
            console.log("Title Search Result:", result);

            let relevantResults = filterRelevantResults(result, searchQuery);
console.log(relevantResults)
            if (relevantResults.length > 0) {
                renderProductssearch(relevantResults);
            } else {
                $('#keypro').html('No products found.').show();
            }
        },
        error: function (err) {
            console.log("Error:", err);
        }
    });
}


function filterRelevantResults(products, searchQuery) {
    return products.filter(product => {
        let productTitle = (product.name || product.post_title || "").toLowerCase();
        let productSku = (product.sku || "").toLowerCase();
        return productTitle.includes(searchQuery) || productSku.includes(searchQuery);
    });
}


function renderProducts(products) {
    if (typeof products === 'object') {
        console.log('Rendering Products:', products);
        var html = '<ul>';
        products.forEach(p => {
            html += `<li><a href="${p.link || '#'}">${p.name || 'Unnamed Product'}</a></li>`;
        });
        html += '</ul>';
        $('#keypro').html(html).show();
    }
}


function renderProductssearch(products) {
    if (typeof products === 'object') {
        console.log('Rendering Search Results:', products);
        var html = '<ul>';
        products.forEach(p => {
            html += `<li><a href="${p.permalink || '#'}">${p.name || 'Unnamed Product'}</a></li>`;
        });
        html += '</ul>';
        $('#keypro').html(html).show();
    }
}


let pasteTimer;

$('.input_search').on('input', function () {
    var search_posts = $(this).val().trim();
    if (search_posts.length === 0) {
        $('#keypro').hide();
    } else {
        var cat_posts = $('#product_cat option:selected').attr('data-cat-id') || $('#product_cat').val() || ''; 
        console.log("Category ID:", cat_posts);
        input_sech(search_posts, cat_posts);
    }
});

$(".input_search").bind("paste", function () {
    $(this).val('');
    var search_posts = $(this).val().trim();
    if (search_posts.length === 0) {
        $('#keypro').hide();
    } else {
        if (pasteTimer) {
            clearTimeout(pasteTimer);
        }

        pasteTimer = setTimeout(function () {
            var cat_posts = $('#product_cat option:selected').attr('data-cat-id') || $('#product_cat').val() || ''; 
            console.log("Pasted Category ID:", cat_posts);
            input_sech(search_posts, cat_posts);
        }, 500);
    }
});

$("#product_cat").on("change", function () {
var cat_posts = $(this).val();
    var search_posts = $('.input_search').val().trim();
    if (search_posts.length === 0) {
        $('#keypro').hide();
    } else {
        if (pasteTimer) {
            clearTimeout(pasteTimer);
        }

        pasteTimer = setTimeout(function () {
            var cat_posts = $('#product_cat option:selected').attr('data-cat-id') || $('#product_cat').val() || ''; 
            console.log("Pasted Category ID:", cat_posts);
            input_sech(search_posts, cat_posts);
        }, 500);
    }


})


})

// count_result();


// jQuery(document).ready(function ($) {
//     $('.minisearch').submit(function (e) {
//         e.preventDefault();
//         var skuToCheck = $('.input_search', this).val();
//         var form = this;
//         var url = 'https://abilityconcepts.ca/wp-json/wc/v3/products';
//         var consumerKey = 'ck_7a1e975e36b136e5428e9c3707046c3c5807c0ac'; 
//         var consumerSecret = 'cs_06cd582168914c5f073e38364e3518cfe41eac24'; 

//         $.ajax({
//             url: url,
//             method: 'GET',
//             data: {
//                 sku: skuToCheck,
//                 consumer_key: consumerKey,
//                 consumer_secret: consumerSecret
//             },
// // 			   beforeSend: function() {
				     
// //        $('.icons_search').css('box-shadow', 'rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset');
// //     },
//             success: function (response) {
//                 let searchQuery = $('.input_search', form).val();

//                 if (response.length > 0) {
//                     form.submit();
//                 } else {
//                     searchQuery = sanitizeSearchQuery(searchQuery);
//                     $('.input_search', form).val(searchQuery);
//                     form.submit();
//                 }
//             },
//             error: function (xhr, status, error) {
//                 console.error('Error:', error);
//             }
//         });

//         return false;
//     });

//     function sanitizeSearchQuery(query) {
//         query = query.replace(/[^a-zA-Z0-9\s]/g, ' ');
//         query = query.replace(/\s+/g, ' ').trim();
//         return query;
//     }
// });




$(document).ready(function () {
//Equal Height Title
       

$('#review_link').click(function (e) {
e.preventDefault();
$('.slider_decription_details ul.tabs li.tab-link.active').removeClass('active');
$('.slider_decription_details .tab-content.active').removeClass('active');
var tabLinkElement = $('.slider_decription_details ul.tabs li#tab-title-reviews');

tabLinkElement.addClass('active');

var tabContentElement = $('#tab-' + tabLinkElement.data('tab'));
tabContentElement.addClass('active');

$('html, body').animate({
scrollTop: tabLinkElement.last().offset().top
}, 500);
});
});
