$(document).ready( function() {
	var firebaseElements = $("span.firebase");
	if (firebaseElements.length > 0) {
		$.getScript("http://static.firebase.com/v0/firebase.js", function() {
			firebaseElements.each(function(idx) {
				var self = this;
				new Firebase($(this).attr("id")).on("value", function(snapshot) {
					$(self).text(snapshot.val());
				});
			});
		});
	}
});