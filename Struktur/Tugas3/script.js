function cekNilai() {
    // Mengambil nilai dari input
    const nim = document.getElementById('nim').value;
    const nilai = parseInt(document.getElementById('nilai').value);
    const hasilContainer = document.getElementById('hasil-container');

    let hurufMutu = "";
    let warnaPesan = "black";

    // Kondisi if-else untuk menentukan huruf mutu
    if (isNaN(nilai) || nilai < 0 || nilai > 100) {
        hurufMutu = "Nilai tidak valid!";
        warnaPesan = "red";
    } else if (nilai >= 80) {
        hurufMutu = "A";
        warnaPesan = "green";
    } else if (nilai >= 70) {
        hurufMutu = "B";
        warnaPesan = "blue";
    } else if (nilai >= 60) {
        hurufMutu = "C";
        warnaPesan = "orange";
    } else if (nilai >= 50) {
        hurufMutu = "D";
        warnaPesan = "brown";
    } else {
        hurufMutu = "E";
        warnaPesan = "red";
    }

    // Menampilkan hasil di bawah form
    if (hurufMutu === "Nilai tidak valid!") {
        hasilContainer.innerHTML = `<span style="color: ${warnaPesan}">${hurufMutu}</span>`;
    } else {
        hasilContainer.innerHTML = `Mahasiswa dengan NIM ${nim} 
        mendapatkan Huruf Mutu: <span style="color: ${warnaPesan}">${hurufMutu}</span>`;
    }
}