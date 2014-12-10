
Event.onDOMReady(function()
{
	var tabActual=getUrl();
	
	for (var t=1; t<= 10; t++)
	{
		var nomtab = "tabpro-" + t;
		if(nomtab != tabActual)
			$(nomtab).hide();
		else
			revSelected('op' + t);
	}
	
	Event.observe($('op1'), 'click', function(e)
	{	
		hideOthers('1');
		Effect.SlideDown('tabpro-1');
		Effect.Appear('tabpro-1');
		revSelected('op1');
		return false;		
	}.bindAsEventListener());
	
	Event.observe($('op2'), 'click', function(e)
	{	
		hideOthers('2');
		
		//Effect.Fade('main-pro');
		//Effect.SlideUp('det-pro');
		Effect.SlideDown('tabpro-2');
		Effect.Appear('tabpro-2');
		revSelected('op2');
		return false;		
	}.bindAsEventListener());
	
	Event.observe($('op3'), 'click', function(e)
	{	
		hideOthers('3');
		
		Effect.SlideDown('tabpro-3');
		Effect.Appear('tabpro-3');
		revSelected('op3');
		
		return false;		
	}.bindAsEventListener());
	
	Event.observe($('op4'), 'click', function(e)
	{	
		hideOthers('4');
		
		Effect.SlideDown('tabpro-4');
		Effect.Appear('tabpro-4');
		revSelected('op4');
		return false;
				
	}.bindAsEventListener());
	
	Event.observe($('op5'), 'click', function(e)
	{	
		hideOthers('5');
		
		Effect.SlideDown('tabpro-5');
		Effect.Appear('tabpro-5');
		revSelected('op5');
		return false;
			
	}.bindAsEventListener());
	
	Event.observe($('op6'), 'click', function(e)
	{	
		hideOthers('6');
		
		Effect.SlideDown('tabpro-6');
		Effect.Appear('tabpro-6');
		revSelected('op6');
		return false;		
	}.bindAsEventListener());
	
	Event.observe($('op7'), 'click', function(e)
	{	
		hideOthers('7');
		
		Effect.SlideDown('tabpro-7');
		Effect.Appear('tabpro-7');
		revSelected('op7');
		return false;		
	}.bindAsEventListener());
	
	Event.observe($('op8'), 'click', function(e)
	{	
		hideOthers('8');
		Effect.SlideDown('tabpro-8');
		Effect.Appear('tabpro-8');
		revSelected('op8');
		return false;
	}.bindAsEventListener());
	
	Event.observe($('op9'), 'click', function(e)
	{	
		hideOthers('9');
		Effect.SlideDown('tabpro-9');
		Effect.Appear('tabpro-9');
		revSelected('op9');
		return false;
	}.bindAsEventListener());
	
	Event.observe($('op10'), 'click', function(e)
	{	
		hideOthers('10');
		
		Effect.SlideDown('tabpro-10');
		Effect.Appear('tabpro-10');
		revSelected('op10');
		return false;
	}.bindAsEventListener());
	
	ActivateLinkMap();
});

function revSelected(idname)
{
	//obtengo todos los <li> en el <ul> de tabs
	$$('#pro_tabs li').each(function(node){
		
		if(node.hasClassName('tabs-selected'))
	        node.removeClassName('tabs-selected');//le quito la clase para que no sea el actual
	});
	
	$(idname).up('li').addClassName("tabs-selected");
}

function getUrl()
{
	url = document.location.href ; 
	partes = url.split('/');
	part = partes[partes.length-1].split('#');//hay una pulga cuando no hay #tad-n
	return part[part.length-1];	
}

function hideOthers(ntab)
{
	for (var tb=1; tb<= 10; tb++)
	{
		if(ntab != tb)
			$("tabpro-" + tb).hide();
	}
}


function ActivateLinkMap()
{
	Event.observe($('map1'), 'click', function(e)
	{	
		$("map1").addClassName("activo");
		$("map2").removeClassName('activo');
		$("map2").addClassName('inactivo');
		$("map3").removeClassName('activo');
		$("map3").addClassName('inactivo');
		return false;
	});
	
	Event.observe($('map2'), 'click', function(e)
	{	
		$("map2").addClassName("activo");
		$("map1").removeClassName('activo');
		$("map1").addClassName('inactivo');
		$("map3").removeClassName('activo');
		$("map3").addClassName('inactivo');
		return false;
	});
	Event.observe($('map3'), 'click', function(e)
	{	
		$("map3").addClassName("activo");
		$("map1").removeClassName('activo');
		$("map1").addClassName('inactivo');
		$("map2").removeClassName('activo');
		$("map2").addClassName('inactivo');
		return false;
	});
}

/*jQuery.noConflict()(function(){
    //code using jQuery
	//$("det-pro").hide();
	//$('aco-pro').hide();
	//$('loc-pro').hide();
	$('#pro_tabs').tabs({fxSlide: true, fxFade: true, fxSpeed: 'normal' });
});*/


