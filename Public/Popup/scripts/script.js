/*export default class Popup{
constructor(isbn,title){
this.isbn=isbn;
this.commentaires=[]; //appel de la bdd
this.title=title;
}

}
*/

let closeBtn = document.getElementsByClassName('close')[0]
closeBtn.addEventListener('click',(e)=>{
  let popup=document.getElementsByClassName('overlay')[0]
  popup.style.visibility='hidden';

  popup.style.opacity='0';
})
