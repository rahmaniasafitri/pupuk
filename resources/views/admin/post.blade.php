@extends('layouts.admin')

@section('content')
	<h1>List Post</h1>

	<div class="toolbar">
		<button type="button" class="button button-primary" data-bs-toggle="modal" data-bs-target="#tambah">+ Tambah Post</button>
	</div>

  <div style="max-height: 500px; overflow: auto">
    <table class="table">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Tipe</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kandungan as $kd)
          <tr>
            <td id="k{{ $kd->id }}">{{ $kd->value }}</td>
            <td>Kandungan</td>
            <td>
              <div class="action">
                <a href="#" class="button button-small" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $kd->id }},'k')">Edit</a>
                <a href="#" class="button button-small button-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $kd->id }},'k')">Delete</a>
              </div>
            </td>
          </tr>
        @endforeach
        @foreach ($kegunaan as $mf)
          <tr>
            <td id="m{{ $mf->id }}">{{ $mf->value }}</td>
            <td>Kegunaan</td>
            <td>
              <div class="action">
                <a href="#" class="button button-small" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $mf->id }},'m')">Edit</a>
                <a href="#" class="button button-small button-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $mf->id }},'m')">Delete</a>
              </div>
            </td>
          </tr>
        @endforeach
        @foreach ($petunjuk as $pt)
          <tr>
            <td id="p{{ $pt->id }}">{{ $pt->value }}</td>
            <td>Petunjuk</td>
            <td>
              <div class="action">
                <a href="#" class="button button-small" data-bs-toggle="modal" data-bs-target="#edit" onclick="edit({{ $pt->id }},'p')">Edit</a>
                <a href="#" class="button button-small button-danger" data-bs-toggle="modal" data-bs-target="#hapus" onclick="hapus({{ $pt->id }},'p')">Delete</a>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Post</h5>
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
                  <input type="text" class="form-control form-control-solid" name="value" required>
                </div>
              </div>
              <div class="row g-9 mb-8">
                <div class="col-12">
                  <label class="required fw-bold mb-2">Tipe</label>
                  <select class="form-control form-control-solid" name="tipe" id="tipe" required>
                    <option value="k">Kandungan</option>
                    <option value="m">Kegunaan</option>
                    <option value="p">Petunjuk</option>
                  </select>
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
          <h5 class="modal-title">Edit Post</h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" method="post" action="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="ei" name="id">
            <input type="hidden" id="et" name="tipe">
            <div class="modal-body">
              <div class="row g-9 mb-8">
                <div class="col-12">
                  <label class="required fw-bold mb-2">Nama</label>
                  <input type="text" class="form-control form-control-solid" id="ev" name="value" required>
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
            <input type="hidden" id="ht" name="tipe">
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
    function edit(id,t){
      $("#ei").val(id);
      $("#et").val(t);
      $("#ev").val($("#"+t+id).text());
    }
    function hapus(id,t){
      $("#hi").val(id);
      $("#ht").val(t);
      $("#hd").html("Apakah anda yakin ingin menghapus <b>"+$("#"+t+id).text()+"</b>?");
    }
  </script>

@endsection
