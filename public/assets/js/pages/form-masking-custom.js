'use strict';
$(document).ready(function () {
    $('.date').mask('00/00/0000');
    $('.date2').mask('00-00-0000');
    $('.hour').mask('00:00:00');
    $('.dateHour').mask('00/00/0000 00:00:00');
    $('.mob_no').mask('0000-000-000');
    $('.phone').mask('0000-0000');
    $('.telphone_with_code').mask('(00) 0000-0000');
    $('.us_telephone').mask('(000) 000-0000');
    $('.ip').mask('000.000.000.000');
    $('.ipv4').mask('000.000.000.0000');
    $('.ipv6').mask('0000:0000:0000:0:000:0000:0000:0000');
});
