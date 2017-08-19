$(document).ready( function() {

	refreshPosts();
});


function refreshPosts() {
	$("#posts").html("<li>Loading</li>");
	$.ajax({
		url: "facebook.php",
		dataType: "json",
		success: function(feed) {
			$("#posts li").remove();
			$.each(feed.data, function(index,post) {
				$("#posts").append("<li><p class=\"name\">"+post.from.name+" <em>" + post.updated_time  + "</em></p><p>"+post.message+"</p></li>");
			})
		}
	});
}