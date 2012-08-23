$(document).ready( function() {
	$.getScript("http://static.firebase.com/v0/firebase.js", function() {
		$("span.firebase").each(function(idx) {
			var self = this;
			new Firebase($(this).attr("id")).on("value", function(snapshot) {
				$(self).text(snapshot.val());
			});
		});
	});
});