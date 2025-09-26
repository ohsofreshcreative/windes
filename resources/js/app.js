import.meta.glob(['../images/**', '../fonts/**']);

import './menubar.js';
import './footer-accordion.js';
import './swiper.js';

/*--- BLOCKS ---*/

Object.values(import.meta.glob('./blocks/*.js', { eager: true }));

/*--- GSAP ---*/

import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);


/*--- ALPINE ---*/

import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

/*--- GSAP ---*/

/*--- GSAP - Kompletny skrypt animacji ---*/

document.addEventListener('DOMContentLoaded', function () {
  // Rejestrujemy wtyczkę ScrollTrigger
  gsap.registerPlugin(ScrollTrigger);

  // Przechodzimy przez każdą sekcję z atrybutem animacji
  gsap.utils.toArray("[data-gsap-anim='section']").forEach((section) => {

    // --------------------------------------------------------------------
    // 2. STANDARDOWA ANIMACJA OBRAZKÓW (FADE IN UP)
    //    Obsługuje: data-gsap-element="img"
    // --------------------------------------------------------------------
    const standardImages = section.querySelectorAll("[data-gsap-element='img']");
    standardImages.forEach((img) => {
      gsap.from(img, {
        opacity: 0,
        y: 50,
        filter: 'blur(15px)',
        duration: 1,
        ease: 'power2.out',
        scrollTrigger: {
          trigger: img,
          start: 'top 90%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    });


    // --------------------------------------------------------------------
    // 3. ANIMACJA DLA POZOSTAŁYCH ELEMENTÓW
    // --------------------------------------------------------------------
    const otherElements = section.querySelectorAll(
      "[data-gsap-element]:not([data-gsap-element*='img']):not([data-gsap-element='stagger'])"
    );
    otherElements.forEach((element, index) => {
      gsap.from(element, {
        opacity: 0,
        y: 50,
        filter: 'blur(15px)',
        duration: 1,
        ease: 'power2.out',
        delay: index * 0.1,
        scrollTrigger: {
          trigger: element,
          start: 'top 90%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    });


    // --------------------------------------------------------------------
    // 4. ANIMACJA Z OPÓŹNIENIEM (STAGGER)
    // --------------------------------------------------------------------
    const staggerElements = section.querySelectorAll("[data-gsap-element='stagger']");
    if (staggerElements.length > 0) {
      const sorted = [...staggerElements].sort((a, b) => {
        const getDelay = (el) => {
          const attr = el.getAttribute('data-gsap-edit');
          return (attr && attr.startsWith('delay-')) ? parseFloat(attr.replace('delay-', '')) || 0 : 0;
        };
        return getDelay(a) - getDelay(b);
      });

      gsap.set(sorted, { opacity: 0, y: 50 });

      gsap.to(sorted, {
        opacity: 1,
        y: 0,
        filter: 'blur(0px)',
        duration: 1,
        ease: 'power2.out',
        stagger: { amount: 1.5, each: 0.1 },
        scrollTrigger: {
          trigger: section,
          start: 'top 80%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    }

  });
});

document.addEventListener('DOMContentLoaded', function() {
    // Znajdź wszystkie linki ze strzałkami do przewijania
    const scrollArrows = document.querySelectorAll('.js-scroll-to-next');

    scrollArrows.forEach(arrow => {
        arrow.addEventListener('click', function(event) {
            // Zatrzymaj domyślną akcję linku
            event.preventDefault();

            // Znajdź najbliższą nadrzędną sekcję
            const currentSection = this.closest('section');

            if (currentSection) {
                const nextSection = currentSection.nextElementSibling;

                if (nextSection) {
                    // Wysokość Twojego menu (offset)
                    const offset = 104;

                    // Oblicz pozycję następnej sekcji względem góry strony
                    const sectionTopPosition = nextSection.getBoundingClientRect().top + window.scrollY;

                    // Odejmij wysokość menu od pozycji docelowej
                    const targetPosition = sectionTopPosition - offset;

                    // Użyj window.scrollTo, aby precyzyjnie ustawić pozycję z płynnym efektem
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
});


