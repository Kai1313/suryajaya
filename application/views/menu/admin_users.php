<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $page_header ;?>
        <small><?php if(isset($page_desc)){echo $page_desc;}?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
        <div class="col-md-4 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Administrator Users</h3>
            </div>
            <form role="form" id="form-user">
              <input type="hidden" name="tipe_form" value="">
              <input type="hidden" name="id" value="">
              <div class="box-body">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <label>Level</label><br>
                  <label>
                    <input type="radio" name="level" value="0" checked> Administrator
                  </label>
                  <label>
                    <input type="radio" name="level" value="1"> Regular
                  </label>
                  <label>
                    <input type="radio" name="level" value="2"> Supervisor
                  </label>
                </div>
                <div class="form-group">
                  <button type="button" class="btn btn-sm btn-primary" onclick="add()">Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-8 col-xs-12">
          <div class="box">
            <div class="box-body">
              <table id="mUsers" class="table table-bordered table-striped" cellpadding="0" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Username</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Akses</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>        
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'application/views/layout/footer.php' ;?>
  <?php include 'application/views/layout/controlsidebar.php' ;?>
  <?php include 'application/views/layout/jspack.php' ;?>

  <script>
    $(function ()
    {
      tbUsers();
    })
    function tbUsers()
    {
      table = $('#mUsers').DataTable({
        "info": false,
        "responsive": true,
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
          "url": "<?php echo site_url('Datatables/adminUsers')?>",
          "type": "POST",
          },
        "columnDefs": [
          { 
            "targets": [ 0 ],
            "orderable": false,
          },
          {
            "className": "text-center", "targets": ['_all']
          }
        ],
        "dom": 'Bfrtip',
          "buttons": 
          {
            "dom": 
            {
              "button": 
              {
                "tag": 'button',
                "className": 'btn btn-sm btn-info'
              }
            },
            "buttons": ['excelHtml5','print']
          }
      });
    }
    function reloadTb()
    {
      table.ajax.reload(null,false);
    }
    function add()
    {
      var urls = ($('[name="tipe_form"]').val()!='1')?'<?= site_url('Crud/addUser')?>':'<?= site_url('Crud/updUser')?>';
      $.ajax({
        type: 'POST',
        url: urls,
        data: $('#form-user').serialize(),
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menambah User');
            $('#form-user')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menambah User');
          }
        }
      });
    }
    function edit(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/getUser/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          $('[name="id"]').val(data.id);
          $('[name="username"]').val(data.username);
          $('[name="password"]').val(data.password);
          $('[name="level"][value="'+data.level+'"]').prop('checked',true);
          $('[name="tipe_form"]').val('1');
        }
      });
    }
    function del(id)
    {
      $.ajax({
        type: 'GET',
        url: '<?= site_url('Crud/delUser/')?>'+id,
        dataType: 'JSON',
        success: function(data)
        {
          if(data.status)
          {
            alert('Sukses Menghapus User');
            $('#form-user')[0].reset();
            $('[name="tipe_form"]').val('');
            reloadTb();
          }
          else
          {
            alert('Gagal Menghapus User');
          }
        }
      });
    }
  </script>