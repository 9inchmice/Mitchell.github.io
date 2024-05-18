const images = document.querySelectorAll('.large-image');
const infoElements = document.querySelectorAll('.image-info');
images.forEach((image, index) => {
    image.addEventListener('mouseover', () => {
        infoElements[index].style.opacity = '1';
    });
    image.addEventListener('mouseout', () => {
        infoElements[index].style.opacity = '0';
    });
});

// Функция открытия модального окна
function openModal() {
    document.getElementById("myModal").style.display = "block";
}

// Функция закрытия модального окна
function closeModal() {
    document.getElementById("myModal").style.display = "none";
}

// Открыть модальное окно после задержки в 5 секунд
setTimeout(openModal, 5000);

// Закрыть модальное окно при щелчке вне его
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


		
		
		
		
		
		
		
		
	