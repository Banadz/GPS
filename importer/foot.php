        
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url()?>/bootstrap/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url()?>/bootstrap/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- Datatables -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url()?>/bootstrap/assets/js/setting-demo.js"></script>
	<script src="<?php echo base_url()?>/bootstrap/assets/js/demo.js"></script>

	<!-- DATATABLE -->
    <script>
        $(document).ready(function () {
			
			$('#add-row2').DataTable({
                "pageLength": 5,
            });
			$('#add-User').DataTable();

            $('#add-row3').DataTable({
                "pageLength": 5,
            });

            $('#add-row4').DataTable({
                "pageLength": 5,
            });

            $('#add-row5').DataTable({
                "pageLength": 5,
            });
            $('#add-rowcompte').DataTable({
                "pageLength": 5,
            });
            
            $('#add-rowCategories').DataTable({
                "pageLength": 5,
            });



			// anah
            
			$('#tableservice').DataTable({
				"pageLength": 5,
			});
			
			$('#tableaucompte').DataTable({
				"pageLength": 4,
			});
			$('#tablenomenclature').DataTable({
				"pageLength": 5,
			});
			$('#tablecompte').DataTable({
				"pageLength": 5,
			});
			
			$('#tabledivision').DataTable({
				"pageLength": 5,
			});
			
			$('#tablecategorie').DataTable({
				"pageLength": 5,
			});

			$('#matentertable').DataTable({
				"pageLength": 5,
			});
			$('#tableau_utilise').DataTable({
				"pageLength": 5,
			});
			$('#tableau_sortis').DataTable({
				"pageLength": 5,
			});
			$('#tableinfo').DataTable({
				"pageLength": 5,
			});
			$('#tablecat').DataTable({
				"pageLength": 5,
			});
			$('#tablenom').DataTable({
				"pageLength": 5,
			});
			$('#tablecmpt').DataTable({
				"pageLength": 5,
			});
        })
	</script>
	<!-- PLACE OF FONDAMENTAL SCRIPT :: folder == base_url('bootstrap/myapps/')-->

    <!-- Navigation -->
    <script src="<?php echo base_url('bootstrap/myapps/navigation/navigation.js');?>"></script>
    <!-- insert a new Article -->
    <script src="<?php echo base_url('bootstrap/myapps/jquery/insertion_art.js');?>"></script>
    <!-- delete an Article -->
    <script src="<?php echo base_url('bootstrap/myapps/jquery/delete_art.js');?>"></script>
    <!-- upadete an Article -->
    <script src="<?php echo base_url('bootstrap/myapps/jquery/update_art.js');?>"></script>
    <!-- add a new Article -->
    <script src="<?php echo base_url('bootstrap/myapps/jquery/add_art.js');?>"></script>
	




	<!-- Service script -->
	
	<script type="text/javascript">
		$(document).ready(function () {
			$('.supprimerser').click(function (e) {
				e.preventDefault();
				let el = this.parentElement.parentElement.parentElement;
				$(el).addClass("animate__animated animate__backOutDown");
				swal({
					icon:'warning',
                    title: 'Attention',
					text: 'Voulez vous vraiment supprimer?',
					type: 'warning',
					buttons:{
						confirm: {
							text : 'Supprimer',
							className : 'btn btn-warning'
						},
						cancel: {
							text:'Annuler',
							visible: true,
							className: 'btn'
						}
					}
				}).then((Delete) => {
					if (Delete) {
						var id = $(this).val();
						$.ajax({
							type:"DELETE",
							url:'supprimerser/'+id,
							success:function (reponse) {
								swal({
									title: 'Supprimé!',
									text: 'Service'+id+' supprimé',
									type: 'success',
									buttons : false
								});
								setTimeout(function(){
									swal.close();
									window.location.reload();
								}, 3000);
							}
						});
					} else {
						swal.close();
					}
				});
			});
		});
		<?php if ($this->session->flashdata("service")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("service"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
				$('#formser').trigger("reset");
			}, 3000);
		<?php } ?>
		<?php if ($this->session->flashdata("servmod")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("servmod"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
				$('#formser').trigger("reset");
			}, 3000);
		<?php } ?>
	</script>

	<!-- Division script -->
	<script type="text/javascript">
		$(document).ready(function () {
			var form = $('#formdiv'), supprimer = $('.supprimerdiv');
			$(form).on('submit',function (e) {
				e.preventDefault();
				var data = $(this).serialize();
				url = $(this).attr('action');
				$.ajax({
					type:'POST',
					url: url,
					data: data,
					dataType:'json',
					success:function (reponse) {
						console.log(reponse);
						if (reponse.success) {
							$('tbody').prepend('<tr id="'+reponse.codediv+'"><td class="service">'+reponse.codeser+'</td><td class ="codedivision">'+reponse.codediv+'</td><td class="labeldivision">'+reponse.labeldiv+'</td><td><a href="<?php echo base_url().'affichdiv?division=';?>'+reponse.codediv+'" class="edit"><button id="" class="btn btn-link btn-success btn-lg" title="Modifier"><i class="fas fa-edit"></i></button></a></td><td><button type="button" value="'+reponse.codediv+'" class="btn btn-link btn-danger btn-lg supprimerdiv" title="Supprimer"><i class="fas fa-prescription-bottle"></i></button></td></tr>');
							swal({
								title: "Succès!",
								text: "Division bien enregistrée",
								buttons:false,
								icon: "success",
							});
							setTimeout(function(){
								swal.close();
								$('#codediv').val('');
								$('#labeldiv').val('');
								window.location.reload();
							}, 3000);
						}
					}
				});  
			}); 
			$(supprimer).click(function (e) {
				e.preventDefault();
				let el = this.parentElement.parentElement.parentElement;
				$(el).addClass("animate__animated animate__backOutDown");
				swal({
					icon:'warning',
                    title: 'Attention',
					text: 'Voulez vous vraiment supprimer?',
					type: 'warning',
					buttons:{
						confirm: {
							text : 'Supprimer',
							className : 'btn btn-warning'
						},
						cancel: {
							text:'Annuler',
							visible: true,
							className: 'btn'
						}
					}
				}).then((Delete) => {
					if (Delete) {
						var id = $(this).val();
						$.ajax({
							type:"DELETE",
							url:'supprimerdiv/'+id, 
							success:function (reponse) {
								swal({
									title: 'Supprimée!',
									text: 'Division '+id+' supprimée',
									type: 'success',
									buttons : false
								});
								setTimeout(function(){
									swal.close();
									window.location.reload();
								}, 3000);
							}
						});
					} else {
						swal.close();
					}
				});
			});
		});
		
		<?php if ($this->session->flashdata("divisionmod")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("divisionmod"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
				$('#formser').trigger("reset");
			}, 3000);
		<?php } ?>
    </script>
	

	<!-- Nomenclature script -->
	
	<script type="text/javascript">
		<?php if ($this->session->flashdata("nomenclature")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("nomenclature"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
				$('#formnomencl').trigger("reset");
			}, 3000);
		<?php } ?>
		<?php if ($this->session->flashdata("nomenclmod")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("nomenclmod"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
			}, 3000);
		<?php } ?>
	</script>

	<!-- Compte script -->
	
	<script type="text/javascript">
		<?php if ($this->session->flashdata("compte")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("compte"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
				$('#formcmpt').trigger("reset");
			}, 3000);
		<?php } ?>
		<?php if ($this->session->flashdata("comptemod")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("comptemod"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
			}, 3000);
		<?php } ?>
	</script>


	<!-- Categorie script -->
	<script type="text/javascript">
		$(document).ready(function () {
			var categorie = $('.categorie'), form = $('#formcat'), designation = $('.designation'), supprimer = $('.supprimercat');
			$(form).on('submit',function (e) {
				e.preventDefault();
				var data = $(this).serialize();
				url = $(this).attr('action');
				$.ajax({
					type:'POST',
					url: url,
					data: data,
					dataType:'json',
					success:function (reponse) {
						console.log(reponse);
						if (reponse.success) {
							$('tbody').prepend('<tr id="'+reponse.idcat+'"><td class ="designation">'+reponse.designation+'</td><td class="categorie">'+reponse.label+'</td><td><a href="<?php echo base_url().'affichcat?categorie=';?>'+reponse.idcat+'" class="edit"><button id="" class="btn btn-link btn-success btn-lg" title="Modifier"><i class="fas fa-edit"></i></button></a></td><td><button type="button" value="'+reponse.idcat+'" class="btn btn-link btn-danger btn-lg supprimercat" title="Supprimer"><i class="fas fa-prescription-bottle"></i></button></td></tr>');
							swal({
								title: "Succès!",
								text: "Categorie bien enregistrée",
								buttons:false,
								icon: "success",
							});
							setTimeout(function(){
								swal.close();
								$('#label_cat').val('');
							}, 3000);
						}
					}
				});  
			}); 
			$(supprimer).click(function (e) {
				e.preventDefault();
				swal({
					icon:'warning',
                    title: 'Attention',
					text: 'Voulez vous vraiment supprimer?',
					type: 'warning',
					buttons:{
						confirm: {
							text : 'Supprimer',
							className : 'btn btn-warning'
						},
						cancel: {
							text:'Annuler',
							visible: true,
							className: 'btn'
						}
					}
				}).then((Delete) => {
					if (Delete) {
						var id = $(this).val();
						$.ajax({
							type:"DELETE",
							url:'supprimercat/'+id,
							success:function (reponse) {
								swal({
									title: 'Supprimée!',
									text: 'Catégorie '+id+' supprimée',
									type: 'success',
									buttons : false
								});
								setTimeout(function(){
									swal.close();
									window.location.reload();
								}, 3000);
							}
						});
					} else {
						swal.close();
					}
				});
			});
			<?php if ($this->session->flashdata("catmod")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("catmod"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
			}, 3000);
		<?php } ?>
		
		<?php if ($this->session->flashdata("assets")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("assets"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
			}, 3000);
		<?php } ?>
		<?php if ($this->session->flashdata("materiel")) { ?>
			swal({
				title: "Succès!",
				text: "<?php echo ($this->session->flashdata("materiel"));?>",
				buttons:false,
				icon: "success",
			});
			setTimeout(function(){
				swal.close();
			}, 3000);
		<?php } ?>
		});
    </script>
<!-- END PLACE OF FONDAMENTAL SCRIPT -->
</body>
</html>