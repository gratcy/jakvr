
function get_city(){
  var province_id = $('#Province').val();
  var city = "<option value='0'>Select City</option>";
  $.post( SITE_URL + "/ajax/get_city", { province_id: province_id}).done(function( data, textStatus, xhr ) {
    $.each(data, function(i, item) {
      city += "<option value='"+item.cid+"'>"+item.cname+"</option>";
    });
    $('#City').html(city);
    $("#City").trigger("chosen:updated");
  });
}

function get_province(){
  var country_id = $('#Country').val();
  var province = "<option value='0'>Select Province</option>";
  $.post( SITE_URL + "/ajax/get_province", { country_id: country_id}).done(function( data, textStatus, xhr ) {
    $.each(data, function(i, item) {
      province += "<option value='"+item.pid+"'>"+item.pname+"</option>";
    });
    $('#Province').html(province);
    $("#Province").trigger("chosen:updated");
  });
}

function print_data(url, title) {
	var left = (screen.width/2)-(860/2);
	var top = (screen.height/2)-(400/2);
	window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, copyhistory=no, width=860, height=400, top='+top+', left='+left);
}

function hood_price(num, short) {
	if (num == undefined) return '';
	if (num) {
		if (!short) {
			return "IDR " + number_format(num, 0, '.', '.')
		}
		num = parseInt(num);
		return (num > 0 ? "IDR " + hood_count(num) : "");
	}
}

function hood_count(number) {
	return number_format(number, 0, '', '.');
}

function number_format (number, decimals, decPoint, thousandsSep) {
  number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
  var n = !isFinite(+number) ? 0 : +number
  var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
  var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
  var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
  var s = ''

  var toFixedFix = function (n, prec) {
  var k = Math.pow(10, prec)
  return '' + (Math.round(n * k) / k)
    .toFixed(prec)
  }

  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || ''
    s[1] += new Array(prec - s[1].length + 1).join('0')
  }

  return s.join(dec)
}

function formatharga(num,element) {
	num = num.toString().replace(/\$|\,/g,'');
	if(isNaN(num))
		num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10)
		cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
		num = num.substring(0,num.length-(4*i+3))+','+
		num.substring(num.length-(4*i+3));
	element.value = num;
}
