


//------------------------------
//Animations
//------------------------------
jQuery(document).ready(function() {
	jQuery('.dashboard-right').css({'margin-right':-100+'px'});
	jQuery('.dashboard-right').animate({'margin-right':0+'px'}, 1500);

	jQuery('.dashboard-left').css({'top':-100+'px'});
	jQuery('.dashboard-left').animate({'top':0+'px'}, 1500);
});


function updateDropsize(){
	jQuery(document).ready(function() {
		dashleft = jQuery('.dashboard-left').innerWidth();
		jQuery('.lftwidth').css({'width': dashleft +'px','margin-top':-65+'px'});
	});
}

updateDropsize();


//------------------------------
//ON RESIZE
//------------------------------
$(window).resize(function() {
	updateDropsize();
});

setTimeout(function (){
	jQuery(document).ready(function() {
		jQuery(".stats2container").niceScroll({horizrailenabled:true,cursorwidth:"3px",cursorcolor:"#ccc",});
		jQuery(".fixedtopic").niceScroll({horizrailenabled:false,cursorwidth:"3px",cursorcolor:"#ccc",});
		jQuery(".dashboard-left").niceScroll({horizrailenabled:false,cursorwidth:"3px",cursorcolor:"#ccc",});
	});
}, 1500);	

//------------------------------
//POPOVER
//------------------------------
jQuery(function (){
	jQuery("#messages").popover({placement:'bottom', trigger:'click',html : true});
	//$("#messages").popover('show');
	jQuery("#notifications").popover({placement:'bottom', trigger:'click',html : true});
	jQuery("#tasks").popover({placement:'bottom', trigger:'click',html : true});
});