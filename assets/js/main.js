// ********************   sidebar
const sidebarAnchors = document.querySelectorAll('#sidebar ul.nav li a'),
    sections = document.querySelectorAll('section'),
    mainContent = document.querySelector('body');




// Change active nav-item   on click event
sidebarAnchors.forEach(sidebarAnchor => {
    sidebarAnchor.lastElementChild.style.left = sidebarAnchor.offsetWidth - 2; // Add left property to CSS code of .extend div according to a width
    sidebarAnchor.addEventListener('click', function(){
        sidebarAnchors.forEach(sidebarAnchor => {
            sidebarAnchor.classList.remove('active');
        });
        this.classList.add('active');
        let sectionID = this.getAttribute('href');
        let sectionOffest = document.querySelector(sectionID).offsetTop;
        mainContent.scrollTo({
            top: sectionOffest,
            left: 0,
            behavior: "smooth",
        });
    })
})

// Change active nav-item according to position on scroll event

mainContent.addEventListener('scroll', () => {
    let scrollPosition = mainContent.scrollTop + 120;
    sections.forEach(section => {
        if (scrollPosition >= section.offsetTop) {
            sidebarAnchors.forEach(sidebarAnchor => {
                sidebarAnchor.classList.remove('active');
                if (section.getAttribute('id') === sidebarAnchor.getAttribute('href').substring(1)) {
                    sidebarAnchor.classList.add('active');
                }
            });
        }
    });
})

// function onScroll(event){
//     var scrollPos = $(document).scrollTop();
//     $('header .nav-item a').each(function () {
//         var currLink = $(this);
//         var refElement = $(currLink.attr("href"));
//         if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
//             $('header .nav-item a.active').removeClass("active");
//             currLink.addClass("active");
//         }
//         else{
//             currLink.removeClass("active");
//         }
//     });
// }
// $(document).ready(function () {
//     $(document).on("scroll", onScroll);
// });










// ********************   Section projects 
// - Show selected cards and hide other



let projects_title = document.querySelectorAll('#projects .projects-filter input');
let cards = document.querySelectorAll('#projects .card-box');
for (let i = 0; i < projects_title.length; i++) {
    projects_title[i].addEventListener("click", function(){

        const value = this.getAttribute('id');
        if(value == 'all'){
            cards.forEach(function(card){
                card.classList.remove('hide');
                card.classList.remove('order-last');
            })
        } else {
            cards.forEach(function(card){
                if(card.classList.contains(value)){
                    card.classList.remove('hide');
                    card.classList.remove('order-last');
                } else {
                    card.classList.add('hide');
                    card.classList.add('order-last');
                }
            })
        }
    })
}

        // *********** same code but with  JQuery *********** //


// $(document).on('click', '.projects-filter li', function(){
//     $(this).addClass('active').siblings().removeClass('active');
// })

// $(document).ready(function () {
//     $('.projects-filter li').click(function () { 
//         const value = $(this).attr('data-filter');
//         if(value == 'all'){
//             $('.card-box').show('1000');
//         } else {
//             $('.card-box').not('.'+value).hide('1000');
//             $('.card-box').filter('.'+value).show('1000');
//         }
//     });
// });
