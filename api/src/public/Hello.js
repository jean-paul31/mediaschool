function showImage() {
    let show = document.getElementById('myImg');
    let input = document.querySelector('input')
    show.style.visibility = show.style.visibility === 'hidden' ? 'visible' : 'hidden';
    input.value = input.value === 'cacher' ? 'montrer' : 'cacher';
}