function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
	if(file){
            var reader = new FileReader();
            reader.onload = function(){
		$("#PictSrc").attr({width : 150, height : 200});
                $("#PictSrc").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
}