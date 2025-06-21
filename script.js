document.addEventListener('DOMContentLoaded', () => {
    // 1. Navegación Suave (Smooth Scrolling)
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });

            // Cerrar el menú móvil si está abierto después de hacer clic en un enlace
            const navLinks = document.querySelector('.nav-links');
            const burger = document.querySelector('.burger-menu');
            if (navLinks.classList.contains('nav-active')) {
                navLinks.classList.remove('nav-active');
                burger.classList.remove('toggle');
            }
        });
    });

    // 2. Efecto de la barra de navegación al desplazar
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) { // Si el usuario ha desplazado más de 50px
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 3. Menú de Hamburguesa (Responsive Navigation)
    const burger = document.querySelector('.burger-menu');
    const navLinks = document.querySelector('.nav-links');
    const navItems = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        // Toggle Nav
        navLinks.classList.toggle('nav-active');

        // Animate Links
        navItems.forEach((item, index) => {
            if (item.style.opacity) {
                item.style.opacity = ''; // Restaura la opacidad si ya tiene un valor
            } else {
                item.style.opacity = '1'; // Muestra el elemento
                item.style.transition = `opacity 0.5s ease-in ${index / 7 + 0.3}s`;
            }
        });

        // Burger Animation
        burger.classList.toggle('toggle');
    });

    // 4. Carrusel/Galería Interactiva
    const galleryTrack = document.querySelector('.gallery-track');
    const galleryItems = document.querySelectorAll('.gallery-item');
    const prevBtn = document.querySelector('.gallery-btn.prev');
    const nextBtn = document.querySelector('.gallery-btn.next');
    let currentIndex = 0;
    const itemWidth = galleryItems[0].clientWidth; // Ancho de un ítem
    const totalItems = galleryItems.length;

    function updateGallery() {
        galleryTrack.style.transform = `translateX(${-currentIndex * itemWidth}px)`;
    }

    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % totalItems;
        updateGallery();
    });

    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        updateGallery();
    });

    // Opcional: Carrusel automático
    let autoSlideInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % totalItems;
        updateGallery();
    }, 5000); // Cambia la imagen cada 5 segundos

    // Pausar auto-slide al pasar el mouse por la galería
    galleryTrack.addEventListener('mouseover', () => {
        clearInterval(autoSlideInterval);
    });
    galleryTrack.addEventListener('mouseleave', () => {
        autoSlideInterval = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalItems;
            updateGallery();
        }, 5000);
    });


    // 5. Scroll Reveal (Revelar al Desplazar)
    const revealElements = document.querySelectorAll('.reveal');

    const revealOnScroll = () => {
        revealElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const viewportHeight = window.innerHeight;

            // Si el elemento está en el viewport (o cerca)
            if (elementTop < viewportHeight - 150) { // 150px de offset para que aparezca un poco antes
                element.classList.add('active');
            } else {
                element.classList.remove('active'); // Opcional: para que se oculte al volver a subir
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    window.addEventListener('resize', revealOnScroll); // Por si el tamaño del viewport cambia
    revealOnScroll(); // Llama una vez al cargar la página para elementos ya visibles

});
