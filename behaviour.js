$(function(){

	$("#topBar").css({background:'linear-gradient(#2f4f4f,#708090)',border:'transparent'});

	// $(".cat").css({background:'linear-gradient(white,white,white,black,white,white,white)',border:'transparent'});
	// $(".subcat").css({background:'linear-gradient(#)',border:'transparent'});
	//Position the components
	var paddingOthers=$("#topBar").height();
	$("img").css("padding-top",paddingOthers);
	$("#body").css("padding-top",paddingOthers);
	$("#offset").css("padding-top",paddingOthers*1.5);

	// Close all the drop down lists when user clicks outside
	$(document).click(function(){
  		$("#catList").fadeOut();
  		$("#subCatList").fadeOut();
	});
	//Select Category
	$("#selectCat").val("ALL");
	$("#catSelect").click(function(e){
		//Do not bubble to the parent tags
		e.stopPropagation();
		//Animated display of the category list
		$("#catList").animate({
	        height: 'toggle',
	        width: 'toggle'
    	});
	});
	//Handling the event to select category from the drop down list
	$(".cat").click(function(e){
		//do not bubble to the parent tags
		e.stopPropagation();
		var category=this.innerText;
		updateList(category);

		//if the user reselects category check if its the same as previous and hold if same, else reset the sub category
		if(category!=$("#selectCat").val())
			$("#subCatSelect").text("--Sub-Category--");

		if(category=="--ALL--"){
			//If specific category is deselected 
			$("#catSelect").text("--Category--");
			// Reset category, subcategory and hide the subcategory select button
			$("#selectCat").val("ALL");
			$("#subCatSelect").fadeOut();
			$("#selectSubCat").val("ALL");
		}
		else{
			//If a specific category is chosen, unhide the subcategory select button, and update the Category select button text and the value in the drop down list
			$("#catSelect").text(category);
			$("#selectCat").val(category);
			$("#subCatSelect").fadeIn();
		}

		//Animated display of the category list
		$("#catList").animate({
	       height: 'toggle',
	       width: 'toggle'
    	});
	});
	//Select SubCategory
	$("#selectSubCat").val("ALL");
	$("#subCatSelect").click(function(e){
		//do not bubble to the parent tags
		e.stopPropagation();
		//animated display of the sub category list
		$("#subCatList").animate({
	        height: 'toggle',
	        width: 'toggle'
   		});
	});
		//Handling the event to select sub category from the drop down list
	$(".subcat").click(function(e){
		//do not bubble to the parent tags
		e.stopPropagation();
		var subcategory=this.innerText;
		if(subcategory=="--ALL--"){
			//Reset the subcategory, the text in the button and the value in the drop down list
			$("#subCatSelect").text("--Sub-Category--");
			$("#selectSubCat").val("ALL");
		}
		else{
			//Set the subcategory and update the text in the button and value in the drop down list
			$("#subCatSelect").text(subcategory);
			$("#selectSubCat").val(subcategory);
		}
		//animated display of the subcategory select drop down list
		$("#subCatList").animate({
	        height: 'toggle',
	       	width: 'toggle'
		});
	});
});