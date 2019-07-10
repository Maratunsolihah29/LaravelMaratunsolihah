@extends('admin.main')
@section('title','Tambah Produk')
@section('content')
<h1>Produk <small>Tambah</small></h1>
<br>

<div class="row">
	<div class="col-md-6 mb-3">
		<form method="post" action="{{ route('admin.produk.add')}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="card">
				<div class="card-header">
				<h5>Buat Produk Baru</h5>
			</div><!-- End Produk Baru -->

			<div class="card-body">

				<!-- Input Gambar -->
				<div class="form-group form-label-group">
					<input type="file" name="gambar" class="form-control" accept="image/*" id="iGambar" 
					placeholder="Gambar Produk" required>
					<label for="iGambar">Gambar Produk</label>
				</div>

				<!-- Input kode produk -->
				<div class="form-group form-label-group">
					<input type="text" name="kode"
					class="form-control"
					value="{{ old('kode')}}"
					id="iKode" placeholder="Kode Produk" required>
					<label for="iKode">Kode Produk</label>	
				</div>
				
				<!-- input nama produk -->
				<div class="form-group form-label-group">
					<input type="text" name="nama_produk"
					class="form-control"
					value="{{ old('nama_produk')}}"
					id="iNamaProduk" placeholder="Nama Produk" required>
					<label for="iNamaProduk">Nama Produk</label>	
				</div>

				<!-- input harga -->
				<div class="form-group form-label-group">
					<input type="number" name="harga"
					class="form-control"
					value="{{ old('harga')}}"
					id="iHarga" placeholder="Harga" required>
					<label for="iHarga">Harga</label>	
				</div>

				<!-- input stok -->
				<div class="form-group form-label-group">
					<input type="number" name="stok"
					class="form-control"
					value="{{ old('stok')}}"
					id="iStok" placeholder="Stok" required>
					<label for="iStok">Stok</label>	
				</div>

				<!-- input kategori -->
				<div class="form-group">
					<select name="kategori"
					class="form-control"
					required>
						<option value="">Pilih Kategori :</option>
						@foreach(\App\Kategori::orderBy('nama_kategori', 'asc')->get() as $d)
						<option value="{{ $d->id }}">
							{{ $d->nama_kategori}}
						</option>
						@endforeach
					</select>
				</div>

			</div><!-- End Card Body -->

			<div class="card-footer">
				<button class="btn btn-primary" type="submit">Simpan</button>
			</div><!-- End Card Footer -->

			</div><!-- End Card -->
		</form>
	</div>
</div>
@endsection

@push('js')
<script type="text/javascript">
	/* Fungsi menampilkan gambar yang dipilih*/
	function filePreview(input) {
		if(input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#iGambar + img').remove();
				$('#iGambar').after('<img src="'+e.target.result+'" width="100" class="mt-3" />');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	/* Perintah menjalankan fungsi filePreview*/
	$(function(){
		$('#iGambar').change(function(){
			filePreview(this);
		})
	})
</script>
@endpush