function totalharga() {
    var jumlah = document.getElementById('jumlah').value;
    var harga= document.getElementById('harga').value;
    var total = parseFloat(jumlah) * 2;
    document.getElementById('total').value = total;
    if (!isNaN(total)) {
        document.getElementById('total').value = total;
    } else {
        document.getElementById('total').value = jumlah;
    }
}