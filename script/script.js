const hargaPaket = new URLSearchParams(window.location.search).get('hargaPaket');

if (hargaPaket) {
    const hargaPaketInt = parseInt(hargaPaket);
    document.getElementById('paket').value = `Rp ${hargaPaketInt.toLocaleString('id-ID')}`;
}

function hitungBiaya() {
    const Pilihan = document.querySelectorAll('input[name="Pilihan[]"]:checked');
    let pilihanNilai = 0;
    Pilihan.forEach((pilihan) => {
        pilihanNilai += parseInt(pilihan.value);
    });
    document.getElementById('Pelayanan').value = `Rp ${pilihanNilai.toLocaleString('id-ID')}`;
    const peserta = document.getElementById('peserta').value;
    const paket = new URLSearchParams(window.location.search).get('hargaPaket');
    const biaya = (pilihanNilai + parseInt(paket)) * peserta;
    document.getElementById('biaya').value = `Rp ${biaya.toLocaleString('id-ID')}`;
}

document.addEventListener('DOMContentLoaded', function() {
    const Pilihan = document.querySelectorAll('input[name="Pilihan[]"]');
    Pilihan.forEach((pilihan) => {
        pilihan.addEventListener('change', hitungBiaya);
    });
    document.getElementById('peserta').addEventListener('input', hitungBiaya);
    document.getElementById('paket').addEventListener('input', hitungBiaya);
});

const kembaliButton = document.getElementById('kembali');
const hapusButton = document.getElementById('hapus');

kembali.addEventListener('click', () => {
    window.location.href = 'pilihan.html';
});

hapusButton.addEventListener('click', () => {
    const inputs = document.querySelectorAll('input:not(#paket)');
    inputs.forEach((input) => {
        input.type === 'checkbox' ? input.checked = false : input.value = '';
    });
});