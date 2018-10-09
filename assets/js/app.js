var main = function(){
	//Show info in click
	$('a.info-btn').on('click', function(event){
		showInfo(event);
	});

	//Dismiss Info on click
	$('.card.inf-extra').on('click', function(event){
		var info = $(event.target).closest('div.mbr-cards-col').find('div.inf-extra')
		if(info.hasClass('visible-info')){
			showInfo(event);
		}
		
	});

	//Toggles visible class in info div
	function showInfo(event){
		var info = $(event.target).closest('div.mbr-cards-col').find('div.inf-extra');
		event.stopPropagation();
		event.preventDefault();
		$(info).toggleClass('visible-info');
	}

	$('#contact-form').on('submit', function(){
		var name = $("#contact-name").val();
		var email = $("#contact-email").val();
		var message = $("#contact-msg").val();
		var tel = $("#contact-phone").val();

		//$("#returnmessage").empty(); //To empty previous error/success message.
		
		//checking for blank fields	
		if(name==''||email=='')
		{
		   alert("Por favor llena los campos obligatorios"); 
		}
		else{
			// Returns successful data submission message when the entered information is stored in database.
			$.post("assets/php/contact_form.php",{ name1: name, email1: email, message1:message, contact1: tel});
		}
	 
	});
	
}




$(document).ready(main);