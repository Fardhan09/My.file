//Time Out Remove Alert
function hideMessage(value){
     $(value)
       .fadeTo(500, 0)
       .slideUp(500, function () {
         $(this).remove();
       });
   }
   window.setTimeout(function () {
     hideMessage('.pesan-singkat');
   }, 4000);

$(document).on('click', '#to-edit', function(){
  let id = $(this).data('id');
  let nama_paket = $(this).data('nama'); 
  let alamat = $(this).data('alamat');
  document.getElementById('edit-id-paket').value = id;
  document.getElementById('edit-nama-paket').value = nama_paket; 
  document.getElementById('edit-alamat').value = alamat;
});

//Preview saat upload file gambar
function previewFotoUploaded(foto, name, toView){
  const fileGambar = document.querySelector(foto);
  const fotoName = document.querySelector(name);
  const previewGmb = document.querySelector(toView); 
    fotoName.textContent = fileGambar.files[0].name;
  const uploadedFile = new FileReader();
    uploadedFile.readAsDataURL(fileGambar.files[0]);
    uploadedFile.onload = function (e) {
      previewGmb.src = e.target.result;
    };
}

$(document).on('click', '#to-delete', function(){
  let id = $(this).data('id'); 
  document.getElementById('delete-id-paket').value = id; 
});

$(document).on('click', '#to-edit-atribut', function(){
  let id_atribut = $(this).data('id-atribut');
  let id_atribut_harga = $(this).data('id-atribut-harga');
  let id = $(this).data('id');
  let nama_paket = $(this).data('paket'); 
  let kategori = $(this).data('kategori'); 
  let deskripsi = $(this).data('deskripsi');
  let undangan = $(this).data('undangan');
  let lokasi = $(this).data('lokasi');
  let mc = $(this).data('mc');
  let rias = $(this).data('rias');
  let paket_rias = $(this).data('paket-rias');
  let catering = $(this).data('catering');
  let dekorasi = $(this).data('dekorasi');
  let paket_dekorasi = $(this).data('paket-dekorasi');
  let paket_catering = $(this).data('paket-catering');
  let paket_dokumentasi = $(this).data('paket-dokumentasi');
  let dokumentasi = $(this).data('dokumentasi');
  let orgen = $(this).data('orgen');
  let harga = $(this).data('harga');
  let foto = $(this).data('foto'); 
  document.getElementById('nama-paket').innerHTML = nama_paket;
  document.getElementById('id-atribut').value = id_atribut;
  document.getElementById('id-atribut-harga').value = id_atribut_harga;
  document.getElementById('id-paket').value = id;
  document.getElementById('kategori').value = kategori;
  document.getElementById('deskripsi').innerHTML = deskripsi;
  document.getElementById('undangan').value = undangan;
  document.getElementById('lokasi').value = lokasi;
  document.getElementById('mc-resepsi').value = (mc == '' ? 'Tidak' : 'Ya');
  document.getElementById('rias-busana').value = (rias == '' ? 'Tidak' : 'Ya');
  document.getElementById('paket-rias-busana').innerHTML = paket_rias;
  document.getElementById('paket-dekorasi').innerHTML = paket_dekorasi;
  document.getElementById('paket-catering').innerHTML = paket_catering;
  document.getElementById('paket-dokumentasi').innerHTML = paket_dokumentasi;
  document.getElementById('catering').value = (catering == '' ? 'Tidak' : 'Ya');
  document.getElementById('dekorasi').value = (dekorasi == '' ? 'Tidak' : 'Ya');
  document.getElementById('dokumentasi').value = (dokumentasi == '' ? 'Tidak' : 'Ya');
  document.getElementById('orgen').value = (orgen == '' ? 'Tidak' : 'Ya');
  document.getElementById('harga').value = harga;
  document.getElementById('foto-lama').value = foto;
  document.getElementById('view-foto').src = '/gmb/paket/' + foto; 
});

function paketRiasBusana(){
  rias_busana = document.getElementById('rias-busana').value;
  document.getElementById('paket-rias-busana').style.display = (rias_busana == 'Ya' ? 'block' : 'none');
};

function paketCatering(){
  catering = document.getElementById('catering').value;
  document.getElementById('paket-catering').style.display = (catering == 'Ya' ? 'block' : 'none');
};

function paketDekorasi(){
  dekorasi = document.getElementById('dekorasi').value;
  document.getElementById('paket-dekorasi').style.display = (dekorasi == 'Ya' ? 'block' : 'none');
};

function paketDokumentasi(){
  dokumentasi = document.getElementById('dokumentasi').value;
  document.getElementById('paket-dokumentasi').style.display = (dokumentasi == 'Ya' ? 'block' : 'none');
};