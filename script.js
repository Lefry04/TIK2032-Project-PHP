window.addEventListener('load', () => {

    alert("Selamat datang di portofolio")

    const text1 = "Haiiii, Saya";
    const text2 = "Lefry Ariyo Mandang";
    const text3 = "FRONT END DEVELOPER";
  
    const target1 = document.getElementById('typing-1');
    const target2 = document.getElementById('typing-2');
    const target3 = document.getElementById('typing-3');
    const myImage = document.getElementById('me');  // Gambar yang akan muncul
  
    let index1 = 0, index2 = 0, index3 = 0;
  
    function startTypingAll() {
      typeText(text1, target1, 100, () => {
        typeText(text2, target2, 100, () => {
          typeText(text3, target3, 100, () => {
            // Gambar muncul setelah semua teks selesai diketik
            setTimeout(() => {
              myImage.style.display = 'block';
            }, 300); // Tambahkan jeda jika perlu
          });
        });
      });
    }
  
    function typeText(text, target, speed, callback) {
      let i = 0;
      const type = () => {
        if (i < text.length) {
          target.textContent += text.charAt(i);
          i++;
          setTimeout(type, speed);
        } else if (callback) {
          setTimeout(callback, 300); // jeda sebelum lanjut teks berikutnya
        }
      };
      type();
    }
  
    // Mulai ketik setelah halaman dimuat
    startTypingAll();
  });
  