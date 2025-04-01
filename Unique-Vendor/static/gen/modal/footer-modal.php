	<script type="text/javascript">
		$("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

		$(function(){
			// Calling Login Form
			$("#login_form").click(function(){
				$(".social_login").hide();
				$(".user_login").show();
				return false;
			});

		})
	</script>