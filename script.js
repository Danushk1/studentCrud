
		$(document).ready(function(){
			
			//Clear all the Fields
			$("#clear").click(function(){
				$("#name").val("");
				$("#email").val("");
				$("#mobile").val("");
				$("#uid").val("0");
				$("#but").text("Add User");
			});
			
			//Insert and update using jQuery ajax
			$("#but").click(function(e){
				e.preventDefault();
				var btn=$(this);
				var uid=$("#uid").val();
				
				//Check All Fields are filled
				var required=true;
				$("#frm").find("[required]").each(function(){
					if($(this).val()==""){
						alert($(this).attr("placeholder"));
						$(this).focus();
						required=false;
						return false;
					}
				});
				if(required){
					$.ajax({
						type:'POST',
						url:'action.php',
						data:$("#frm").serialize(),
						beforeSend:function(){
							$(btn).text("Wait...");
						},
						success:function(res){
							
							var uid=$("#uid").val();
							if(uid=="0"){
								$("#table").find("tbody").append(res);
							}else{
								$("#table").find("."+uid).html(res);
							}
							
							$("#clear").click();
							$("#but").text("Add User");
						}
					});
				}
			});
			
			//Delete row using jQuery ajax
			$("body").on("click",".del",function(e){
				e.preventDefault();
				var uid=$(this).attr("uid");
				var btn=$(this);
				if(confirm("Are You Sure ? ")){
					$.ajax({
						type:'POST',
						url:'delete.php',
						data:{id:uid},
						beforeSend:function(){
							$(btn).text("Deleting...");
						},
						success:function(res){
							if(res){
								btn.closest("tr").remove();
							}
						}
					});
				}
			});
			
			//fill all fields from table values
			$("body").on("click",".edit",function(e){
				e.preventDefault();
				var uid=$(this).attr("uid");
				$("#uid").val(uid);
				var row=$(this);
				var name=row.closest("tr").find("td:eq(0)").text();
				$("#name").val(name);
				var email=row.closest("tr").find("td:eq(1)").text();
				$("#email").val(email);
				var mobile=row.closest("tr").find("td:eq(2)").text();
				$("#mobile").val(mobile);
				$("#but").text("Update User");
			});
		});
	