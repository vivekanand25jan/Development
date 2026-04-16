// JavaScript Document
function big_img(id_val1, obj,e)
{
	var id_val="#hotel_all_img_"+id_val1;
	
	var src_val=$(id_val).attr('src');

	
	$("#big_img_"+id_val1).html('<img src="'+src_val+'" border="0" />').show().offset({left:(e.pageX)+20,top:(e.pageY)+20});
	$(id_val).live("mousemove",function(e){$("#big_img_"+id_val1).html('<img src="'+src_val+'" border="0" />').offset({left:(e.pageX)+20,top:(e.pageY)+20});});
}
function small_img(id_val, obj)
{
	$("#big_img_"+id_val).html('').hide();
}