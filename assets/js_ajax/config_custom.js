// (function (frontendHeader) {
//     let observer = new IntersectionObserver(entries => {
//         if (entries[0].isIntersecting) {
//             frontendHeader.classList.add('is-floating');
//         } else {
//             frontendHeader.classList.remove('is-floating');
//         }
//     }, {
//         threshold: .25
//     });

//     observer.observe(document.querySelector('section'));
// })(document.querySelector('#frontend-header'));