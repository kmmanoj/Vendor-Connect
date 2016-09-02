function updateList(category){
	var httprequest=new XMLHttpRequest();
	httprequest.onreadystatechange=function(){
		if(this.readyState==4 && this.status==200){
			//update the drop down list and the coooool looking drop down list
			$('#selectSubCat').html("");
			$('#selectSubCat').append("<option>ALL</option>");
			$('#selectSubCat').append(httprequest.responseText);
			
				
			$("#subCatList").html("<div class='btn btn-group-vertical btn-block'><button id='all' class='subcat btn btn-primary'>--ALL--</button></div>");
			$("#selectSubCat").children().each(function(){
				if($(this).text()=="ALL");
				else $("#all").parent().append("<button class='subcat btn btn-primary'>"+$(this).text()+"</button>");
			});
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
		}
	};
	httprequest.open("GET","updateList.php?maincategory="+category,true);
	httprequest.send();
}

