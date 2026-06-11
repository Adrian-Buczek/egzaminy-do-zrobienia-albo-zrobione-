const obraz = document.querySelector('#Wobraz')
const numerkopi = document.querySelector('#Lkopi')
const Pblyszcz = document.querySelector('#Pbl')
const Pmat = document.querySelector('#Pmat')
const diwek = document.querySelector('div')
const przycisk = document.querySelector('button')

function koszyk (){
    if (Pblyszcz.checked){
        diwek.innerHTML += `<img src="${obraz}}">` + '<p>Liczba kopii:'+ numerkopi.value +  'Cena:' + ((numerkopi.value) * 1,5) + 'zł</p>'
    } else if(Pmat.checked){
         diwek.innerHTML += '<p>Liczba kopii:'+ numerkopi.value +  'Cena:' + ((numerkopi.value) * 2) + 'zł</p>'
    }
    

}
przycisk.addEventListener('click', koszyk)
