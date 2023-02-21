$(".money").keyup( function(){ 
    valNum = $(this).val().replace(/^(0+(?=[0-9]{1}))([.0-9]*)$/,"$2");
    $(this).val(valNum);
})

$(function(){
	var half = 1/2;
 	var dec = (half.toString().match(/,/)) ? ',' : '.';
 	var alpha = (dec == ',') ? ',' : '.';
 	$('.money').keyup(function(){
		var field = $(this);
		var valNum = field.val();
 		valNum = valNum.replace(new RegExp("["+alpha+"]"), dec);
		valNum = valNum.replace(new RegExp("^["+dec+"]"), '0.');
 		if (valNum != ''){
			valNum = (new RegExp("^[0-9]+("+dec+"[0-9]{,2})?$").test(valNum))
			       ? valNum 
			       : (valNum.match(new RegExp("[^0-9"+dec+"]"))) 
				    ? valNum.replace(new RegExp("[^0-9"+dec+"]","g"),'') 
				    : valNum.match(new RegExp("^[0-9]+(["+dec+"][0-9]{0,2})?"))[0];
		}
 		field.val(valNum);
	});

	$('.money').blur(function(){
		var field = $(this);
		var valNum = (field.val() * 1).toFixed(2);
		field.val(valNum);
	});
});