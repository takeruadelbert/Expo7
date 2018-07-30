$(function(){
	
	var note = $('#note'),
		ts1 = new Date(2016, 2, 6),
                ts2 = new Date(2012, 0, 1),
                ts3 = new Date(2015, 11, 27),
                ts4 = new Date(2020, 3, 27),
                ts5 = new Date(2015, 11, 27),
                ts6 = new Date(2015, 11, 27),
                ts7 = new Date(2015, 11, 27),
                ts8 = new Date(2015, 11, 27),
                
		newYear = true;
	
	if((new Date()) > ts1){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts1 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
		
	$('#countdown1').countdown({
		timestamp	: ts1,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        
        if((new Date()) > ts2){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts2 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
        
        $('#countdown2').countdown({
		timestamp	: ts2,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        
        
        if((new Date()) > ts3){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts3 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
        
        $('#countdown3').countdown({
		timestamp	: ts3,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        
        if((new Date()) > ts4){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts4 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
        
        $('#countdown4').countdown({
		timestamp	: ts4,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        
        if((new Date()) > ts5){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts5 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
        
        $('#countdown5').countdown({
		timestamp	: ts5,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        
        if((new Date()) > ts6){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts6 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
        
        $('#countdown6').countdown({
		timestamp	: ts6,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        
        if((new Date()) > ts7){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts7 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
        
        $('#countdown7').countdown({
		timestamp	: ts7,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        if((new Date()) > ts8){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts8 = (new Date()).getTime() + 10*24*60*60*1000;
		newYear = false;
	}
        
        $('#countdown8').countdown({
		timestamp	: ts8,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "left until the new year!";
			}
			else {
				message += "left to 10 days from now!";
			}
			
			note.html(message);
		}
	});
        
        
	
});
