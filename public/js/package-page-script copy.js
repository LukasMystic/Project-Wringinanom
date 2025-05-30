const items_Picture = document.querySelectorAll('.item_semua #container_Image');
const items_Desc = document.querySelectorAll('.item_semua #container_Info');

let active = 0;
let batas_atas = 5;
let batas_bawah = 0;

// Function LoadShow
function loadShow() {
    items_Picture.forEach(image => image.style.display = 'none');
    items_Desc.forEach(info => info.style.display = 'none');

    items_Picture[active].style.display = 'block';
    items_Desc[active].style.display = 'block';
}
loadShow();

// Button Next-Prev
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

// Event listeners for next and previous buttons
nextBtn.addEventListener('click', () => {
    active = (active === batas_atas) ? batas_bawah : active + 1;
    loadShow();
});

prevBtn.addEventListener('click', () => {
    active = (active === batas_bawah) ? batas_atas : active - 1;
    loadShow();
});

/*
Total slide ada 15;
Paket River Tubing = 6 slide
Paket Adventure    = 5 slide
Paket Edukasi      = 4 slide
*/
const button1 = document.getElementById('category_Button_Tubing');
const button2 = document.getElementById('category_Button_Eksplorasi');
const button3 = document.getElementById('category_Button_Edukasi');
const button4 = document.querySelectorAll('#container_Button button');

//Untuk nentuin batas atas + batas bawah tiap paket
// button1 = Paket River Tubing
button1.onclick = function () {
    active = 0;
    batas_atas = 5;
    batas_bawah = 0;
    loadShow();
};

// button2 = Paket Eksplorasi
button2.onclick = function () {
    active = 6;
    batas_atas = 10;
    batas_bawah = 6;
    loadShow();
};

// button3 = Paket Edukasi
button3.onclick = function () {
    active = 11;
    batas_atas = 14;
    batas_bawah = 11;
    loadShow();
};

// button4 = Purchase
button4.forEach(button => {
    button.addEventListener('click', function() {
        button4.forEach(btn => btn.classList.remove('active'));
        this.classList.add('active');
    });
});
