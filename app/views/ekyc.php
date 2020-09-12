<!DOCTYPE html>
<html lang="en">
<head>
<title>Members</title>

<?php
require_once('includes/headHandler.php');
?>


</head>
<body>

<!--------- Index Main Content ------------>

<div class="main_wrapper_parent" id="wrapper">

	<!-- Sidebar Wrapper-->

	<?php include "includes/leftMenu.php"; ?>

	<!-- /#sidebar-wrapper -->


	<!-- Page Content -->
	<div id="page-content-wrapper">
		<!-- Top Header-->

		<?php include "includes/header.php"; ?>

		<!-- Top Header -->	


		<div class="dashboard_main_content">
			<div class="container-fluid">
				<div class="row">
                    <div class="col-12">
                        <div class="support_head d-flex align-items-center justify-content-between">
							<div class="support_head_title">
								<h6>eKYCs</h6> 
							</div>

							<div class="support_head_selectbox">
								<select id="status-filter" >
                                    <option value="0">Pending</option>                                        
                                    <option value="1">Rejected</option> 
                                    <option value="2">Approved</option> 
								</select>	
							</div>                              
						</div>    
					</div>

					<div class="col-12">
						<div class="recent_ticket_table">
							<table id="example" class="display recent_ticket_data responsive nowrap" style="width:100%">
								<thead>
									<tr>
										<th>#</th>
										<th>USERNAME</th>
										<th>NAME</th>
										<th>eKYC STATUS</th>
										<th>SUBMITTED AT</th>
										<th>ACTIONS</th>
									</tr>
								</thead>
							</table>
						</div>  					
					</div>			
				</div>				
			</div>
		</div> 

        <!------ Footer Section Is Here ------->   

        <?php include "includes/footer.php"; ?>

		<!------ Footer Section Is Here ------->  
	</div>
	<!-- /#page-content-wrapper -->
</div>

<!--------------------->


<?php
require_once ('includes/footerHandler.php');
?>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script>
	var ajaxUrl = "<?php echo GL_SITE_URL;?>/ekyc/xhr/";

	var table = $('#example');

	var initTable1 = function() {
        var statusFilter = $("#status-filter").val();
	
		// begin first table
		table.DataTable({
			responsive: true,
			searchDelay: 500,
			"language": {"emptyTable": "<br/><br/><b class='no_result'>No eKYC yet.</b><br/><br/><span style='padding-top:10px;font-style: italic;'>The richest people in the world build networks; everyone else looks for work. - Robert Kiyosaki</span><br/><br/><br/>"},
			processing: true,
			bSort:false,
			searching : true,
			serverSide: true,
			exportOptions: {
				modifer: {
					page: 'all',
					search: 'none'    
				}
			}, 
			ajax: {
				url: ajaxUrl,
				type: "POST",
				beforeSend: function(){
					$('#example tr td').attr('colspan',1);
				},
                data: {action:"filter",statusFilter:statusFilter}
			},
			columns: [
				{data: 'checkbox'},
				{data: 'username'},
				{data: 'name'},
				{data: 'kycstatus'},
				{data: 'submitted_at'},
				{data: 'actions'}
			],
			"fnDrawCallback": function() {
				var oSettings = this.fnSettings();
				var iTotalRecords = oSettings.fnRecordsTotal();
				var displayLength = oSettings._iDisplayLength;
				if(iTotalRecords == '0'){
					$("#example thead").hide();
					$("button.dropdown-toggle").prop("disabled", true);
					$(".paging_simple_numbers").hide();
					$(".dataTables_length").hide();
					$(".dataTables_info").hide();
					//$(".dataTables_empty span").hide();
					//$(".dataTables_empty b").html('No matching records found');
					/* $("#print_button").prop("disabled", true);		
					$("#print_button").hide();	 */
				//$("#downlineFilters").hide();	
				}else if(iTotalRecords < displayLength){
					$(".dataTables_info").hide();
					$(".paging_simple_numbers").hide();
					$(".dataTables_length").show();
					$("#example thead").show();
				}else{
					//$("button.dropdown-toggle").prop("disabled", false);
					
					$("#example thead").show();
					$(".dataTables_info").show();
					$(".paging_simple_numbers").show();
					$(".dataTables_length").show();
				}
			},
			columnDefs: [
				{
					orderable: false,
					className: 'select-checkbox',
					targets:   0
				},
				{
					targets: 1,
					render: function(data, type, full, meta) {
						var output;
						var res 		= 	data.split("_");
						var uname 		= 	res[0];
						var name		= 	res[1];
						var user_img	=	res[2];		
						if(user_img == '0'){
							var name_sizeof = name.substring(0,1);
							var user_img = '<span>'+name_sizeof+'</span>';						  
						}else if(user_img != '0' && user_img.length == 1){
							var user_img = '<span>'+user_img+'</span>';
						}else {
							var user_img = '<img class="rounded-circle" src="'+user_img+'" alt="photo">';
						}
						output = '<span class="member-img">'+user_img+' <span class="name">'+ uname +'</span>';
						return output;
					},
				},
				
				{
					targets: 3,
					render: function(data, type, full, meta) {
						var status = {
							'Pending': {'title': 'Pending', 'class': 'badge-warning'},
							'Approved': {'title': 'Approved', 'class': 'badge-success'},
							'Rejected': {'title': 'Rejected', 'class': 'badge-danger'},
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="badge badge-pill ' + status[data].class + '">' + status[data].title + '</span>';
					},
				},
			],select: {
				style:    'os',
				selector: 'td:first-child'
			},
		});
	};
	jQuery(document).ready(function() {
		initTable1();
	});	

    /*****Filter Start  *********/
    function applyFilter(reset = 0,obj)
	{
		if(reset == 1){
			$("#status-filter").val('0');
		}else{
    		var statusFilter = obj.val();
		}
			
		var table = $('#example').DataTable();
		table.destroy();
		initTable1();
	}
    $("#status-filter").change(function(){
		applyFilter(0,$(this));
	});
</script>

</body>
</html>