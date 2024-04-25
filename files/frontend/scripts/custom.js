// Breaking news js
	$(window).load(function() {
		$("#bn7").breakingNews({
			effect		:"slide-v",
			autoplay	:true,
			timer		:3000,
			color		:'darkred'
		});
	});
	
	
	
	/// Tabs for latest n popular news start
	
	function openCity(evt, cityName) {
		var i, tabcontent, tablinks;
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
	}


	

	// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
	
	$(document).ready(function() {
		
		var modal = $('#myModal');
		var img = $('.myImg');
		
		var modalImg = $("#img01");

		var modalImgName = $("#name");
		
		img.click(function(){
			modalImg.attr("src", this.src);
			var img_title = $(this).attr('data-img-name');
			modalImgName.html(img_title);
			modal.show();
		});

		$(".close").click(function(){
			modal.hide();
		});

		
		
		
     
	});
	
	
	
	
	
	
	
	
	
	
	
	