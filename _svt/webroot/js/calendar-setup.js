	
	YAHOO.calendarInit = function()
	{
		var choosed_days;
		var txtDates = $('busy_days');
		choosed_days = txtDates.value;
        //window.alert(choosed_days);
		
		var navConfig = {
            strings : {
                month: "Choose Month",
                year: "Enter Year",
                submit: "OK",
                cancel: "Cancel",
                invalidYear: "Please enter a valid year"
            },
            initialFocus: "year"
        };
        
		// Later in your application, when you need the selected date
		function handleSelect() {
            var dates="";
            var arrDates = YAHOO.avacal.getSelectedDates();
			for (var i = 0; i < arrDates.length; ++i) {
				var date = arrDates[i];
				// Work with selected date...
				var displayMonth = date.getMonth() + 1;
				var displayYear = date.getFullYear();
				var displayDate = date.getDate();
				
				// formato: mm/dd/aa
				dates += displayMonth + "/" + displayDate + "/" + displayYear;
				dates += (i < arrDates.length-1) ? ",":"";
			}
            
            //var txtDate = $('busy_days');
            //txtDate.value = choosed_days + ((choosed_days.length >1) ? ",":"")+ dates;
            txtDates.value = dates;
            
        }
		
		var fechAct = new Date();
		var ano = fechAct.getFullYear();
		
		YAHOO.avacal = new YAHOO.widget.CalendarGroup("avacal","calContainer", {MULTI_SELECT: false, pagedate:"1/"+ano, pages:1, navigator:navConfig});
	
		if(choosed_days.length >1)
		{
			YAHOO.avacal.cfg.queueProperty("selected",choosed_days,false); 
			YAHOO.avacal.cfg.fireQueue();
		}
		 
		YAHOO.avacal.selectEvent.subscribe(handleSelect, YAHOO.avacal, true);
		YAHOO.avacal.deselectEvent.subscribe(handleSelect, YAHOO.avacal, true);
		YAHOO.avacal.render();
	}

	YAHOO.util.Event.onDOMReady(YAHOO.calendarInit);
	