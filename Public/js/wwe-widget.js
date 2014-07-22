$(document).ready(function(){

	$("superstar").on(
	{
		mouseenter: function(){
			$.fn.lookup($(this).text(),"superstar",this);
		},
		mouseleave: function(){
			$("superstar").popover("hide");
		}
	});

	$("diva").on(
	{
		mouseenter: function(){
			$.fn.lookup($(this).text(),"diva",this);
		},
		mouseleave: function(){
			console.log("leaving diva");
		}
	});

	$.fn.lookup = function(searchFor,type,scope)
	{
		$.ajax({
			url: '../lookup.php?athlete=' + searchFor + "&type=" + type,
			async:false,
			cache: false,
			dataType: 'json',
			statusCode: {
				404: function() {
					console.log("page not found");
				}
			},
			success: function(data,status,jqXHR) {
				$.fn.loadContent(data.Response,scope);
				console.log(data.Response);
			}
		});
	}

	$.fn.loadContent = function(response, scope)
	{
		var attributesIndex = ["data-toggle","title","data-content"];

		var attributes = 
		{	
			"data-toggle" : "popover",
			"title": response._name,
			"data-content": $.fn.getContent(response)
		}

		for (var i = attributesIndex.length - 1; i >= 0; i--) {
			var key = attributesIndex[i];
			$(scope).attr(key,attributes[key]);
		};

		$(scope).popover({"html":true,"placement":"bottom"});
		$(scope).popover("show");		
	}

	$.fn.getContent = function(response)
	{
		var html = "";

		html += "<table>";
		html += "<tbody>";
		html += "<tr>";
		html += "<td><b><i>Height</b></i></td>";
		html += "<td>" + response._height + "</td>";
		html += "</tr>";
		html += "<tr>";
		html += "<td><b><i>Weight</b></i></td>";
		html += "<td>"+ response._weight + "</td>";
		html += "</tr>";
		html += "<tr>"
		html += "<td><b><i>From</b></i></td>";
		html += "<td>"+ response._from + "</td>";
		html += "</tr>";
		html += "<tr>"
		html += "<td><b><i>Signature Moves</b></i></td>";
		html += "<td>"+ response._signatureMoves + "</td>";
		html += "</tr>";
		html += "<tr>";
		html += "<td><b><i>Highlights</b></i></td>";
		html += "<td>"+ response._highlights + "</td>";
		html += "</tr>";
		html += "<tr>"
		html += "<td colspan=2><img src='" + response._image + "'/></td>";
		html += "</tr>";
		html += "</tbody>";
		html += "</table>";

		return html;
	}
});