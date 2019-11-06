<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
	<!-- button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button -->
	<h3 class="modal-title">Daftar Seminar</h3>
  </div>
  <div class="modal-body form">
	<form method="post" action="<?=base_url('Registration/save')?>" id="form" class="form-horizontal">		  
	  <div class="form-body">		
		<div class="row form-group">
		  <label class="control-label col-md-3">Peserta :</label>
		  <div class="col-md-9 has-feedback">		  
			<select class="form-control input-sm" id="txtJenis" name="txtJenis" required >
				<option value='1'>Umum</option>
				<option value='2'>Profesional Pendidik</option>
				<option value='3'>Orang Tua Siswa Pahoa</option>
			</select>
		  </div>
		</div>

		<div class="row" id='rowNIS' style='display:none;'>
		  <label class="control-label col-md-3">No.Induk Siswa :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtNIS"  id="txtNIS" class="form-control" placeholder="" > 
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		
		<div class="row form-group">
		  <label class="control-label col-md-3">Nama :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtNama"  id="txtNama" class="form-control" placeholder="Nama Lengkap" > 
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		
		<div id="div_instansi" class="row form-group">
		  <label class="control-label col-md-3">Instansi :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtInstansi" id="txtInstansi" class="form-control" placeholder="Instansi">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>

		<div class="row form-group">
		  <label class="control-label col-md-3 ">Waktu :</label>		  
			<div class='col-md-6 col-sm-6'>
				<input type='checkbox' checked="checked" name='cSesi[]' id='cSesi1'  class='col-md-1' onchange="changeJumlah();"
					 value='1' style='cursor:pointer;' title='Jam 08:00-10:00' > 
				<label class='col-md-5' for='cSesi1' style='cursor:pointer;' title='Jam 08:00-10:00' data-html='true' data-toggle='tooltip' data-placement='top' > Sesi 1</label>
		 
				<input type='checkbox' name='cSesi[]' id='cSesi2'  class='col-md-1' onchange="changeJumlah();"
					 value='2' style='cursor:pointer;' title='Jam 10:00-12:00' > 
				<label id="label_sesi2" for='cSesi2' style='cursor:pointer;' title='Jam 10:00-12:00' data-html='true' data-toggle='tooltip' data-placement='top' > Sesi 2</label>				
			</div>			
		</div>

		<div class="row form-group">
		  <label class="control-label col-md-3">Email :</label>
		  <div class="col-md-9 has-feedback">
			<input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		
		<div class="row form-group">
		  <label class="control-label col-md-3">WA :</label>
		  <div class="col-md-9 has-feedback">
			<input type="text" name="txtWA" id="txtWA" class="form-control" placeholder="whatsapp">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		  </div>
		</div>
		 
		
		<div class="row form-group" >
			<label class="control-label col-md-3">Jumlah :</label>
			<div class='col-md-5 col-sm-5'>
				<input type="text"  id="jumlah"  name="jumlah" onkeyup="changeJumlah();" maxlength="1"
					   onkeypress="return isNumber(event)" class="form-control" value=1 required> 
			</div> 
		</div>

		<div class="row form-group" >
			<label class="control-label col-md-3">Total :</label>
			<div class="row form-group" >
				<label class="control-label col-md-1">Rp.</label>
				<div class='col-md-7'>
					<input type="text" id="total" name="total" value=100,000 class="form-control" readonly>
				</div>
			</div>
		</div>
		
	  </div>
	
	<div id="pesan_error"></div> <!--alert pesan jika terjadi eror -->
  </div>
  
  <div class="modal-footer">
	<button type="submit" id="btnSave" class="btn btn-primary">SIMPAN</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">BATAL</button>
  </div>
  </form>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
