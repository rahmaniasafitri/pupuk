@extends('layouts.admin')

@section('content')
	<h1>List Produk</h1>

	<div class="toolbar">
		<button type="button" class="button button-primary" data-bs-toggle="modal" data-bs-target="#tambah">+ Tambah Produk</button>
	</div>

	<table class="table">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Foto</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
      @foreach ($produk as $pr)
        <tr>
          <td id="n{{ $pr->id }}">{{ $pr->nama }}</td>
          <td>
            <img src="/assets/img/portfolio/{{ $pr->foto }}" alt="" style="height: 40px">
          </td>
          <td>
            <div class="action">
              <a href="#" class="button button-small" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $pr->id }})">Edit</a>
              <a href="#" class="button button-small button-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $pr->id }})">Delete</a>
            </div>
          </td>
        </tr>
      @endforeach
		</tbody>
	</table>

  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Produk</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
              <div class="row g-9 mb-8">
                <div class="col-12">
                  <label class="required fw-bold mb-2">Nama</label>
                  <input type="text" class="form-control form-control-solid" name="nama" required>
                </div>
                <div class="col-12">
                  <label class="required fw-bold mb-2">Upload Foto :</label>
                  <input type="file" class="form-control form-control-solid" name="foto" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit" value="store">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Produk</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="ei" name="id">
            <div class="modal-body">
              <div class="row g-9 mb-8">
                <div class="col-12">
                  <label class="required fw-bold mb-2">Nama</label>
                  <input type="text" class="form-control form-control-solid" id="en" name="nama" required>
                </div>
                <div class="col-12">
                  <label class="required fw-bold mb-2">Upload Foto :</label>
                  <input type="file" class="form-control form-control-solid" name="foto" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit" value="update">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Produk</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="">
            @csrf
            <input type="hidden" id="hi" name="id">
            <div class="modal-body">
              <p id="hd">Apakah anda yakin ingin menghapus produk ini?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-danger" name="submit" value="destroy">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function edit(id){
      $("#ei").val(id);
      $("#en").val($("#n"+id).text());
    }
    function hapus(id){
      $("#hi").val(id);
      $("#hd").text("Apakah anda yakin ingin menghapus "+$("#n"+id).text()+"?");
    }
  </script>

@endsection
