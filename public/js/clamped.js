document.addEventListener('DOMContentLoaded', function () {
  const clampedText = document.querySelector('.clamped-text');
  const readMoreBtn = document.getElementById('readMoreBtn');
  const readLessBtn = document.getElementById('readLessBtn');

  readMoreBtn.addEventListener('click', function () {
    clampedText.style.webkitLineClamp = 'unset'; // Bỏ giới hạn dòng
    readMoreBtn.style.display = 'none'; // Ẩn nút "Xem thêm"
    readLessBtn.style.display = 'block'; // Hiển thị nút "Rút gọn"
  });

  readLessBtn.addEventListener('click', function () {
    clampedText.style.webkitLineClamp = '3'; // Đặt lại giới hạn dòng
    readMoreBtn.style.display = 'block'; // Hiển thị nút "Xem thêm"
    readLessBtn.style.display = 'none'; // Ẩn nút "Rút gọn"
  });

  // Kiểm tra xem đoạn văn bản có bị cắt ngắn hay không
  if (clampedText.scrollHeight > clampedText.clientHeight) {
    readMoreBtn.style.display = 'block'; // Hiển thị nút "Xem thêm" nếu cần
  }
});